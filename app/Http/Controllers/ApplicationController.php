<?php

namespace App\Http\Controllers;

use App\Models\Application;
use App\Models\Scholarship;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

class ApplicationController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $query = Application::query()
            ->with(['user', 'scholarship']);

        // Handle search
        if ($request->has('search')) {
            $searchTerm = $request->search;
            $query->where(function($q) use ($searchTerm) {
                $q->whereHas('user', function($query) use ($searchTerm) {
                    $query->where('name', 'like', '%' . $searchTerm . '%');
                })->orWhereHas('scholarship', function($query) use ($searchTerm) {
                    $query->where('name', 'like', '%' . $searchTerm . '%');
                });
            });
        }

        // Handle status filter
        if ($request->has('status') && $request->status != '') {
            $query->where('status', $request->status);
        }

        $applications = $query->where('user_id', auth()->id())
            ->latest('submission_date')
            ->paginate(10)
            ->withQueryString();

        return view('applications.index', compact('applications'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $scholarships = Scholarship::where('status', 'active')
            ->where('start_date', '<=', now())
            ->where('end_date', '>=', now())
            ->get();

        return view('applications.create', compact('scholarships'));
    }

    /**
     * Store a newly created resource in storage.
     */
    // public function store(Request $request)
    // {
    //     // Validate the basic required fields
    //     $request->validate([
    //         'scholarship_id' => 'required|exists:scholarships,id',
    //     ]);

    //     // Get the scholarship details to validate against requirements
    //     $scholarship = Scholarship::with('applications')->findOrFail($request->scholarship_id);

    //     // Initialize submission data array
    //     $submissionData = [];

    //     // Process each requirement field
    //     foreach ($scholarship->requirements as $requirement) {
    //         $fieldName = $requirement->label;

    //         // Handle file uploads
    //         if (in_array($requirement->input_type, ['file', 'image'])) {
    //             if ($request->hasFile($fieldName)) {
    //                 $file = $request->file($fieldName);

    //                 // Generate a unique filename
    //                 $filename = Str::uuid() . '.' . $file->getClientOriginalExtension();

    //                 // Store the file in the appropriate directory
    //                 $path = $file->storeAs(
    //                     'scholarship-submissions/' . $request->scholarship_id,
    //                     $filename,
    //                     'public'
    //                 );

    //                 $submissionData[$fieldName] = [
    //                     'path' => $path,
    //                     'original_name' => $file->getClientOriginalName(),
    //                     'mime_type' => $file->getMimeType(),
    //                 ];
    //             }
    //         } else {
    //             // Handle other input types
    //             $submissionData[$fieldName] = $request->input($fieldName);
    //         }
    //     }

    //     // Create the application
    //     $application = Application::create([
    //         'user_id' => auth()->id(),
    //         'scholarship_id' => $request->scholarship_id,
    //         'submission_date' => now(),
    //         'submission_data' => $submissionData,
    //         'status' => 'pending' // Default status for new applications
    //     ]);

    //     return redirect()->route('applications.index')
    //         ->with('success', 'Pengajuan beasiswa berhasil dikirim!');
    // }
    public function store(Request $request)
    {
        // Validate the basic required fields
        $request->validate([
            'scholarship_id' => 'required|exists:scholarships,id',
        ]);

        // Get the scholarship details to validate against requirements
        $scholarship = Scholarship::findOrFail($request->scholarship_id);

        // Initialize submission data array
        $submissionData = [];

        // Get all form inputs
        $inputs = $request->except(['_token', 'scholarship_id']);

        // Process each input
        foreach ($inputs as $fieldName => $value) {
            // Handle file uploads
            if ($request->hasFile($fieldName)) {
                $file = $request->file($fieldName);

                // Generate a unique filename
                $filename = Str::uuid() . '.' . $file->getClientOriginalExtension();

                // Store the file in the appropriate directory
                $path = $file->storeAs(
                    'scholarship-submissions/' . $request->scholarship_id,
                    $filename,
                    'public'
                );

                $submissionData[$fieldName] = [
                    'path' => $path,
                    'original_name' => $file->getClientOriginalName(),
                    'mime_type' => $file->getMimeType(),
                ];
            } else {
                // Handle other input types
                $submissionData[$fieldName] = $value;
            }
        }

        // Create the application
        $application = Application::create([
            'user_id' => auth()->id(),
            'scholarship_id' => $request->scholarship_id,
            'submission_date' => now(),
            'submission_data' => $submissionData,
            'status' => 'pending' // Default status for new applications
        ]);

        return redirect()->route('applications.index')
            ->with('success', 'Pengajuan beasiswa berhasil dikirim!');
    }
    /**
     * Display the specified resource.
     */
    public function show(Application $application)
    {
        return view('applications.show', compact('application'));
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
    public function destroy(string $id)
    {
        //
    }
}
