<?php

namespace App\Http\Controllers;

use App\Models\Family;
use Illuminate\Http\Request;

class FamilyController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
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

    public function updateFather(Request $request)
    {
        // dd($request->all());

        $validatedData = $request->validate([
            'nik' => 'required|string|max:16|exists:families,nik',
            'type' => 'required|in:father|exists:families,type',
            'status' => 'required|string',
            'full_name' => 'required|string|max:255',
            'last_education' => 'required|string|max:100',
            'job' => 'required|string|max:100',
            'position' => 'required|string|max:100',
            'income' => 'required|numeric',
            'phone' => 'required|string|max:15',
            'address' => 'required|string'
        ]);

        try {
            // Find family member by NIK and type
            $family = Family::where('nik', $validatedData['nik'])
                ->where('type', 'father')
                ->firstOrFail();

            // Check if user owns this family record
            if ($family->identity->user_id !== auth()->id()) {
                return redirect()->back()
                    ->with('error', 'Anda tidak memiliki izin untuk mengubah data ini.');
            }

            // Update family member data
            $family->update([
                'status' => $validatedData['status'],
                'full_name' => $validatedData['full_name'],
                'last_education' => $validatedData['last_education'],
                'job' => $validatedData['job'],
                'position' => $validatedData['position'],
                'income' => $validatedData['income'],
                'phone' => $validatedData['phone'],
                'address' => $validatedData['address']
            ]);

            return redirect()->route('family.show')
                ->with('success', 'Data ayah berhasil diperbarui.');

        } catch (\Exception $e) {
            return redirect()->back()
                ->with('error', 'Gagal memperbarui data: ' . $e->getMessage())
                ->withInput();
        }
    }

    public function updateMother(Request $request)
    {
        $validatedData = $request->validate([
            'nik' => 'required|string|max:16|exists:families,nik',
            'type' => 'required|in:mother|exists:families,type',
            'status' => 'required|string',
            'full_name' => 'required|string|max:255',
            'last_education' => 'required|string|max:100',
            'job' => 'required|string|max:100',
            'position' => 'required|string|max:100',
            'income' => 'required|numeric',
            'phone' => 'required|string|max:15',
            'address' => 'required|string'
        ]);

        try {
            // Find family member by NIK and type
            $family = Family::where('nik', $validatedData['nik'])
                ->where('type', 'mother')
                ->firstOrFail();

            // Check if user owns this family record
            if ($family->identity->user_id !== auth()->id()) {
                return redirect()->back()
                    ->with('error', 'Anda tidak memiliki izin untuk mengubah data ini.');
            }

            // Update family member data
            $family->update([
                'status' => $validatedData['status'],
                'full_name' => $validatedData['full_name'],
                'last_education' => $validatedData['last_education'],
                'job' => $validatedData['job'],
                'position' => $validatedData['position'],
                'income' => $validatedData['income'],
                'phone' => $validatedData['phone'],
                'address' => $validatedData['address']
            ]);

            return redirect()->route('family.show')
                ->with('success', 'Data ibu berhasil diperbarui.');

        } catch (\Exception $e) {
            return redirect()->back()
                ->with('error', 'Gagal memperbarui data: ' . $e->getMessage())
                ->withInput();
        }
    }

    public function updateGuardian(Request $request)
    {
        $validatedData = $request->validate([
            'nik' => 'required|string|max:16|exists:families,nik',
            'type' => 'required|in:guardian|exists:families,type',
            'status' => 'required|string',
            'full_name' => 'required|string|max:255',
            'last_education' => 'required|string|max:100',
            'job' => 'required|string|max:100',
            'position' => 'required|string|max:100',
            'income' => 'required|numeric',
            'phone' => 'required|string|max:15',
            'address' => 'required|string'
        ]);

        try {
            // Find family member by NIK and type
            $family = Family::where('nik', $validatedData['nik'])
                ->where('type', 'guardian')
                ->firstOrFail();

            // Check if user owns this family record
            if ($family->identity->user_id !== auth()->id()) {
                return redirect()->back()
                    ->with('error', 'Anda tidak memiliki izin untuk mengubah data ini.');
            }

            // Update family member data
            $family->update([
                'status' => $validatedData['status'],
                'full_name' => $validatedData['full_name'],
                'last_education' => $validatedData['last_education'],
                'job' => $validatedData['job'],
                'position' => $validatedData['position'],
                'income' => $validatedData['income'],
                'phone' => $validatedData['phone'],
                'address' => $validatedData['address']
            ]);

            return redirect()->route('family.show')
                ->with('success', 'Data wali berhasil diperbarui.');

        } catch (\Exception $e) {
            return redirect()->back()
                ->with('error', 'Gagal memperbarui data: ' . $e->getMessage())
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
