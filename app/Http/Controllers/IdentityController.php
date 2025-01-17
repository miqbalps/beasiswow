<?php

namespace App\Http\Controllers;

use App\Models\Family;
use App\Models\Address;
use App\Models\Identity;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class IdentityController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $identity = Identity::with('user')->where('user_id', Auth::user()->id)->first();
        $ktp_domicile = Address::with('identity')->where('nik', $identity->nik)->where('type', 'ktp_domicile')->first();
        $current_domicile = Address::with('identity')->where(['nik' => $identity->nik, 'type' => 'current_domicile'])->first();
        $father = Family::with('identity')->where(['nik' => $identity->nik, 'type' => 'father'])->first();
        $mother = Family::with('identity')->where(['nik' => $identity->nik, 'type' => 'mother'])->first();
        $guardian = Family::with('identity')->where(['nik' => $identity->nik, 'type' => 'guardian'])->first();
        return view('identity.index', compact('identity', 'ktp_domicile', 'current_domicile', 'father', 'mother', 'guardian'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request)
    {
        // Validate the incoming request data
        $validatedData = $request->validate([
            'nik' => 'required|string|max:16|exists:identities,nik',
            'name' => 'required|string|max:255',
            'nkk' => 'required|string|max:16',
            'birth_place' => 'required|string|max:100',
            'birth_date' => 'required|date',
            'gender' => 'required|in:male,female',
            'married' => 'required|in:yes,no',
            'religion' => 'required|string|max:50',
            'phone' => 'required|string|max:15',
            'child_number' => 'required|integer|min:1',
            'origin' => 'required|string|max:100',
            'income' => 'required|numeric|min:0',
        ]);

        try {
            // Find the identity by NIK
            $identity = Identity::where('nik', $validatedData['nik'])->firstOrFail();

            // Ensure the user is updating their own identity
            if ($identity->user_id !== auth()->id()) {
                return redirect()->back()
                    ->with('error', 'Anda tidak memiliki izin untuk mengubah identitas ini.');
            }

            // Update the identity with validated data
            $identity->update([
                'nkk' => $validatedData['nkk'],
                'birth_place' => $validatedData['birth_place'],
                'birth_date' => $validatedData['birth_date'],
                'gender' => $validatedData['gender'],
                'married' => $validatedData['married'],
                'religion' => $validatedData['religion'],
                'phone' => $validatedData['phone'],
                'child_number' => $validatedData['child_number'],
                'origin' => $validatedData['origin'],
                'income' => $validatedData['income'],
            ]);

            // Update the user's name
            $identity->user->update([
                'name' => $validatedData['name'],
            ]);

            // Redirect back with success message
            return redirect()->route('identity.show')
                ->with('success', 'Identitas berhasil diperbarui.');
        } catch (\Exception $e) {
            // Handle any errors
            return redirect()->back()
                ->with('error', 'Gagal memperbarui identitas: ' . $e->getMessage())
                ->withInput();
        }
    }

    public function updateIdentityDoc(Request $request)
    {
        // Konfigurasi file
        $fileConfigs = [
            'kk_file' => [
                'directory' => 'dokumen/kartu_keluarga',
                'type' => 'pdf',
                'rules' => ['nullable', 'file', 'mimes:pdf', 'max:2048'],
                'error_messages' => [
                    'mimes' => 'Kartu Keluarga harus berupa file PDF.',
                    'max' => 'Ukuran Kartu Keluarga maksimal 2MB.'
                ]
            ],
            'ktp_photo' => [
                'directory' => 'dokumen/ktp',
                'type' => 'image',
                'rules' => ['nullable', 'file', 'mimes:png,jpg,jpeg,webp', 'max:2048'],
                'error_messages' => [
                    'mimes' => 'KTP harus berupa gambar (PNG, JPG, WEBP).',
                    'max' => 'Ukuran KTP maksimal 2MB.'
                ]
            ],
            'pass_photo' => [
                'directory' => 'dokumen/pas_foto',
                'type' => 'pdf',
                'rules' => ['nullable', 'file', 'mimes:pdf', 'max:2048'],
                'error_messages' => [
                    'mimes' => 'Pas Foto harus berupa file PDF.',
                    'max' => 'Ukuran Pas Foto maksimal 2MB.'
                ]
            ]
        ];

        // Validasi file
        $fileValidationRules = [];
        $fileValidationMessages = [];

        foreach ($fileConfigs as $key => $config) {
            $fileValidationRules[$key] = $config['rules'];
            $fileValidationMessages = array_merge(
                $fileValidationMessages,
                array_combine(
                    array_map(fn($rule) => "$key.$rule", array_keys($config['error_messages'])),
                    $config['error_messages']
                )
            );
        }

        // Validasi file
        $validator = Validator::make($request->all(), $fileValidationRules, $fileValidationMessages);

        // Jika validasi gagal, kembalikan dengan pesan kesalahan
        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }

        DB::beginTransaction();

        try {
            // Temukan identitas berdasarkan NIK
            $identity = Identity::where('nik', $request->input('nik'))->firstOrFail();

            // Pastikan pengguna hanya dapat memperbarui identitasnya sendiri
            if ($identity->user_id !== auth()->id()) {
                throw new \Exception('Anda tidak memiliki izin untuk mengubah dokumen identitas ini.');
            }

            // Proses unggah file
            $uploadedFiles = [];

            foreach ($fileConfigs as $fileKey => $config) {
                if ($request->hasFile($fileKey)) {
                    // Hapus file lama jika ada
                    if ($identity->{$fileKey}) {
                        Storage::disk('public')->delete($identity->{$fileKey});
                    }

                    // Unggah file baru
                    $file = $request->file($fileKey);
                    $filePath = $this->uploadFile($file, $config['directory'], $config['type']);

                    if ($filePath) {
                        $uploadedFiles[$fileKey] = $filePath;
                    }
                }
            }

            // Perbarui identitas dengan path file baru
            if (!empty($uploadedFiles)) {
                $identity->update($uploadedFiles);
            }

            DB::commit();

            // Redirect dengan pesan sukses
            return redirect()->route('identity.show')
                ->with('success', 'Dokumen identitas berhasil diperbarui.');

        } catch (\Exception $e) {
            DB::rollBack();

            // Tangani kesalahan
            return redirect()->back()
                ->with('error', 'Terjadi kesalahan: ' . $e->getMessage())
                ->withInput();
        }
    }

    /**
     * Metode untuk mengunggah file dengan validasi tipe
     */
    protected function uploadFile($file, $directory, $type = 'any')
    {
        // Validasi file
        if (!$file) {
            return null;
        }

        // Validasi tipe file
        $extension = strtolower($file->getClientOriginalExtension());

        // Cek tipe file
        if ($type === 'pdf' && $extension !== 'pdf') {
            throw new \Exception('File harus berupa PDF.');
        }

        if ($type === 'image' && !in_array($extension, ['png', 'jpg', 'jpeg', 'webp'])) {
            throw new \Exception('File harus berupa gambar (PNG, JPG, WEBP).');
        }

        // Generate nama file unik
        $prefix = $type === 'pdf' ? 'doc_' : 'img_';
        $filename = $prefix . uniqid() . '.' . $extension;

        // Simpan file
        return $file->storeAs($directory, $filename, 'public');
    }
    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
