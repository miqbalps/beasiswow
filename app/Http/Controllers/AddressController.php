<?php

namespace App\Http\Controllers;

use App\Models\Address;
use App\Models\Identity;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;

class AddressController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // $address = Address::with('identity')->where('user_id', auth()->user()->id)->first();
        // return view('identity.index', compact('address'));
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
    public function update(Request $request, string $id)
    {
        //
    }

    public function updateKtpDomicile(Request $request)
    {
        // dd($request->all());
        // Validasi data alamat
        $validatedData = $request->validate([
            'nik' => 'required|string|max:16|exists:addresses,nik',
            'type' => 'required|in:ktp_domicile|exists:addresses,type',
            'street' => 'required|string|max:255',
            'rt' => 'required|integer|min:1|max:999',
            'rw' => 'required|integer|min:1|max:999',
            'postal_code' => 'required|string|size:5',
            'village' => 'required|string|max:100',
            'district' => 'required|string|max:100',
            'regency' => 'required|string|max:100',
            'province' => 'required|string|max:100',
        ], [
            'postal_code.size' => 'Kode pos harus terdiri dari 5 digit.',
            'rt.integer' => 'RT harus berupa angka.',
            'rw.integer' => 'RW harus berupa angka.',
            'rt.min' => 'RT minimal 1.',
            'rw.min' => 'RW minimal 1.',
        ]);

        // dd($validatedData);

        try {
            // Temukan identitas berdasarkan NIK
            $address = Address::where('nik', $validatedData['nik'])
                            ->where('type', 'ktp_domicile')
                            ->firstOrFail();

           // Ensure the user is updating their own identity
            if ($address->identity->user_id !== auth()->id()) {
                return redirect()->back()
                    ->with('error', 'Anda tidak memiliki izin untuk mengubah identitas ini.');
            }

            // Cari atau buat entri alamat
            $address->update([
                'street' => $validatedData['street'],
                'rt' => $validatedData['rt'],
                'rw' => $validatedData['rw'],
                'postal_code' => $validatedData['postal_code'],
                'village' => $validatedData['village'],
                'district' => $validatedData['district'],
                'regency' => $validatedData['regency'],
                'province' => $validatedData['province'],
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

    public function updateCurrentDomicile(Request $request)
    {
        // dd($request->all());
        // Validasi data alamat
        $validatedData = $request->validate([
            'nik' => 'required|string|max:16|exists:addresses,nik',
            'type' => 'required|in:current_domicile|exists:addresses,type',
            'street' => 'required|string|max:255',
            'rt' => 'required|integer|min:1|max:999',
            'rw' => 'required|integer|min:1|max:999',
            'postal_code' => 'required|string|size:5',
            'village' => 'required|string|max:100',
            'district' => 'required|string|max:100',
            'regency' => 'required|string|max:100',
            'province' => 'required|string|max:100',
        ], [
            'postal_code.size' => 'Kode pos harus terdiri dari 5 digit.',
            'rt.integer' => 'RT harus berupa angka.',
            'rw.integer' => 'RW harus berupa angka.',
            'rt.min' => 'RT minimal 1.',
            'rw.min' => 'RW minimal 1.',
        ]);

        // dd($validatedData);

        try {
            // Temukan identitas berdasarkan NIK
            $address = Address::where('nik', $validatedData['nik'])
                            ->where('type', 'current_domicile')
                            ->firstOrFail();

           // Ensure the user is updating their own identity
            if ($address->identity->user_id !== auth()->id()) {
                return redirect()->back()
                    ->with('error', 'Anda tidak memiliki izin untuk mengubah identitas ini.');
            }

            // Cari atau buat entri alamat
            $address->update([
                'street' => $validatedData['street'],
                'rt' => $validatedData['rt'],
                'rw' => $validatedData['rw'],
                'postal_code' => $validatedData['postal_code'],
                'village' => $validatedData['village'],
                'district' => $validatedData['district'],
                'regency' => $validatedData['regency'],
                'province' => $validatedData['province'],
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

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
