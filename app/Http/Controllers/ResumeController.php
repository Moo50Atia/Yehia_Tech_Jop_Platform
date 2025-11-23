<?php

namespace App\Http\Controllers;

use App\Models\Resume;
use App\Models\User;
use Illuminate\Http\Request;

class ResumeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $resumes = Resume::with('user')->latest()->paginate(15);
        return view('resumes.index', compact('resumes'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $users = User::where('role', 'job_seeker')->get();
        return view('resumes.create', compact('users'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'user_id' => 'required|exists:users,id',
            'resume_content' => 'required|string',
            'skills' => 'nullable|string',
            'experience' => 'nullable|string',
        ]);

        Resume::create($validated);

        return redirect()->route('resume.index')
            ->with('success', 'Resume created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $resume = Resume::with(['user', 'applications'])->findOrFail($id);
        return view('resumes.show', compact('resume'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $resume = Resume::findOrFail($id);
        $users = User::where('role', 'job_seeker')->get();
        return view('resumes.edit', compact('resume', 'users'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $resume = Resume::findOrFail($id);

        $validated = $request->validate([
            'user_id' => 'required|exists:users,id',
            'resume_content' => 'required|string',
            'skills' => 'nullable|string',
            'experience' => 'nullable|string',
        ]);

        $resume->update($validated);

        return redirect()->route('resume.index')
            ->with('success', 'Resume updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $resume = Resume::findOrFail($id);
        $resume->delete();

        return redirect()->route('resume.index')
            ->with('success', 'Resume deleted successfully.');
    }
}
