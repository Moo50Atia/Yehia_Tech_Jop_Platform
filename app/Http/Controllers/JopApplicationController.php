<?php

namespace App\Http\Controllers;

use App\Models\JopApplication;
use App\Models\JobVacansy;
use App\Models\User;
use App\Models\Resume;
use Illuminate\Http\Request;

class JopApplicationController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $applications = JopApplication::with(['jobVacansy', 'user', 'resume'])->latest()->paginate(15);
        return view('applications.index', compact('applications'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $jobVacancies = JobVacansy::all();
        $users = User::where('role', 'job_seeker')->get();
        $resumes = Resume::all();
        return view('applications.create', compact('jobVacancies', 'users', 'resumes'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'job_vacansy_id' => 'required|exists:job_vacansies,id',
            'user_id' => 'required|exists:users,id',
            'resume_id' => 'required|exists:resumes,id',
            'status' => 'required|in:pending,reviewed,accepted,rejected',
        ]);

        JopApplication::create($validated);

        return redirect()->route('application.index')
            ->with('success', 'Application created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $application = JopApplication::with(['jobVacansy', 'user', 'resume'])->findOrFail($id);
        return view('applications.show', compact('application'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $application = JopApplication::findOrFail($id);
        $jobVacancies = JobVacansy::all();
        $users = User::where('role', 'job_seeker')->get();
        $resumes = Resume::all();
        return view('applications.edit', compact('application', 'jobVacancies', 'users', 'resumes'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $application = JopApplication::findOrFail($id);

        $validated = $request->validate([
            'job_vacansy_id' => 'required|exists:job_vacansies,id',
            'user_id' => 'required|exists:users,id',
            'resume_id' => 'required|exists:resumes,id',
            'status' => 'required|in:pending,reviewed,accepted,rejected',
        ]);

        $application->update($validated);

        return redirect()->route('application.index')
            ->with('success', 'Application updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $application = JopApplication::findOrFail($id);
        $application->delete();

        return redirect()->route('application.index')
            ->with('success', 'Application deleted successfully.');
    }
}
