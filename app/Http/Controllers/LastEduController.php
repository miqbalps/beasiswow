<?php

namespace App\Http\Controllers;

use App\Models\LastEdu;
use App\Models\Identity;

use function Ramsey\Uuid\v1;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class LastEduController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $identity = Identity::with('user')->where('user_id', Auth::user()->id)->first();
        $lastedu = LastEdu::with('identity')->where(['nik' => $identity->nik])->first();

        return view('lastedu.index', compact('lastedu'));
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
        $validatedData = $request->validate([
            'nik' => 'required|string|max:16|exists:identities,nik',
            'semester' => 'required|integer',
            'gpa' => 'required|numeric|between:0,4.00',
        ]);

        try {
            $lastEdu = LastEdu::where('nik', $validatedData['nik'])->firstOrFail();

            if ($lastEdu->identity->user_id !== auth()->id()) {
                return redirect()->back()
                    ->with('error', 'Anda tidak memiliki izin untuk mengubah data ini.');
            }

            $lastEdu->update($validatedData);

            return redirect()->route('lastedu.index')
                ->with('success', 'Data pendidikan terakhir berhasil diperbarui.');

        } catch (\Exception $e) {
            return redirect()->back()
                ->with('error', 'Gagal memperbarui data: ' . $e->getMessage())
                ->withInput();
        }
    }

    public function updateTranscript(Request $request)
    {
        // Konfigurasi file
        $fileConfigs = [
            'transcript_file' => [
                'directory' => 'dokumen/transkrip',
                'type' => 'pdf',
                'rules' => ['required', 'file', 'mimes:pdf', 'max:2048'],
                'error_messages' => [
                    'mimes' => 'Transkrip harus berupa file PDF.',
                    'max' => 'Ukuran transkrip maksimal 2MB.'
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

        $validator = Validator::make($request->all(), $fileValidationRules, $fileValidationMessages);

        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }

        DB::beginTransaction();

        try {
            $identity = Identity::where('user_id', auth()->id())->firstOrFail();
            $lastEdu = LastEdu::where('nik', $identity->nik)->firstOrFail();

            if ($request->hasFile('transcript_file')) {
                if ($lastEdu->transcript_file) {
                    Storage::disk('public')->delete($lastEdu->transcript_file);
                }

                $file = $request->file('transcript_file');
                $filePath = $this->uploadFile($file, $fileConfigs['transcript_file']['directory'], 'pdf');

                if ($filePath) {
                    $lastEdu->transcript_file = $filePath;
                    $lastEdu->save();
                }
            }

            DB::commit();
            return redirect()->route('lastedu.index')
                ->with('success', 'Transkrip berhasil diperbarui.');

        } catch (\Exception $e) {
            DB::rollBack();
            return redirect()->back()
                ->with('error', 'Gagal mengunggah transkrip: ' . $e->getMessage());
        }
    }

    protected function uploadFile($file, $directory, $type = 'any')
    {
        if (!$file) {
            return null;
        }

        $extension = strtolower($file->getClientOriginalExtension());

        if ($type === 'pdf' && $extension !== 'pdf') {
            throw new \Exception('File harus berupa PDF.');
        }

        $prefix = $type === 'pdf' ? 'doc_' : 'img_';
        $filename = $prefix . uniqid() . '.' . $extension;

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
