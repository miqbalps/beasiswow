<?php

namespace App\Http\Controllers;

use App\Models\Identity;
use App\Models\Achievement;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class AchievementController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $query = Achievement::query()
            ->whereHas('identity', function($query) {
                $query->where('user_id', Auth::user()->id);
            });

        // Handle search
        if ($request->has('search')) {
            $searchTerm = $request->search;
            $query->where(function($q) use ($searchTerm) {
                $q->where('name', 'like', '%' . $searchTerm . '%')
                    ->orWhere('type', 'like', '%' . $searchTerm . '%')
                    ->orWhere('year', 'like', '%' . $searchTerm . '%');
            });
        }

        // Handle level filter
        if ($request->has('level') && $request->level != '') {
            $query->where('level', $request->level);
        }

        $achievements = $query->latest()
            ->paginate(10)
            ->withQueryString();

        return view('achievements.index', compact('achievements'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $achieve = new Achievement();
        return view('achievements.create', compact('achieve'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // dd($request->all());

        // File configuration
        $fileConfigs = [
            'proof_file' => [
                'directory' => 'dokumen/prestasi',
                'type' => 'pdf',
                'rules' => ['required', 'file', 'mimes:pdf', 'max:2048'],
                'error_messages' => [
                    'mimes' => 'Bukti prestasi harus berupa file PDF.',
                    'max' => 'Ukuran file maksimal 2MB.'
                ]
            ]
        ];

        // Validate other fields
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'type' => 'required|string',
            'level' => 'required|string',
            'rank' => 'required|string',
            'year' => 'required|numeric',
            'proof_file' => $fileConfigs['proof_file']['rules']
        ], [
            'proof_file.mimes' => $fileConfigs['proof_file']['error_messages']['mimes'],
            'proof_file.max' => $fileConfigs['proof_file']['error_messages']['max']
        ]);

        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }

        // dd($request->all());

        DB::beginTransaction();

        try {
            $identity = Identity::where('user_id', Auth::id())->firstOrFail();

            // dd($identity);
            $file = $request->file('proof_file');
            $filePath = $this->uploadFile($file, $fileConfigs['proof_file']['directory'], 'pdf');

            Achievement::create([
                'nik' => $identity->nik,
                'name' => $request->name,
                'type' => $request->type,
                'level' => $request->level,
                'rank' => $request->rank,
                'year' => $request->year,
                'proof_file' => $filePath,
            ]);

            // dd($request->all());

            DB::commit();
            // dd($request->all());
            return redirect()->route('achievements.index')
                ->with('success', 'Data prestasi berhasil disimpan.');

        } catch (\Exception $e) {
            DB::rollBack();
            return redirect()->back()
                ->with('error', 'Gagal menyimpan data: ' . $e->getMessage());
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
     * Display the specified resource.
     */
    public function show(Achievement $achievement)
    {
        return view('achievements.show', compact('achievement'));
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

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Achievement $achievement)
    {
        try {
            $achievement->delete();
            return redirect()->back()->with('success', "Data prestasi {$achievement->name} berhasil dihapus.");
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Gagal menghapus prestasi: ' . $e->getMessage());
        }
    }
}
