<?php

namespace App\Http\Controllers;

use App\Models\Submission;
use Illuminate\Http\Request;

class SubmissionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $submissions = Submission::all();

        return view('submission.index', compact('submissions'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('submission.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'student_name' => 'required|string',
            'assignment_title' => 'required|string',
            'submission_status' => 'required|in:pending,submitted',
        ]);

        Submission::create($validated);

        return redirect()->route('submission.index')->with('success', 'Submission created');
    }

    /**
     * Display the specified resource.
     */
    public function show(Submission $submission)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Submission $submission)
    {
        return view('submission.edit', compact('submission'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Submission $submission)
    {
        $validated = $request->validate([
            'student_name' => 'required|string',
            'assignment_title' => 'required|string',
            'submission_status' => 'required|in:pending,submitted',
        ]);

        $submission->update($validated);

        return redirect()->route('submission.index')->with('success', 'Submission updated');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Submission $submission)
    {
        $submission->delete();

        return redirect()->route('submission.index')->with('success', 'Submission deleted');
    }
}
