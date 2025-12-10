<?php

namespace App\Http\Controllers\JopSeeker;

use App\Http\Controllers\Controller;
use App\Models\JobVacansy;
use App\Models\JobApplication;
use App\Models\Resume;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth as AuthFacade;

class SeekerApplicationController extends Controller
{
    /**
     * Show the apply form for a specific vacancy.
     */
    public function show(JobVacansy $vacancy)
    {
        // Check if vacancy is active
        if ($vacancy->status !== 'active') {
            return redirect()->route('seeker.dashboard')
                ->with('error', 'This vacancy is no longer available.');
        }

        // Check if user already applied
        $existingApplication = JobApplication::where('user_id', AuthFacade::id())
            ->where('job_vacansy_id', $vacancy->id)
            ->first();

        if ($existingApplication) {
            return redirect()->route('seeker.my-applications')
                ->with('info', 'You have already applied to this vacancy.');
        }

        $vacancy->load(['company', 'jobCategory']);

        // Get user's resumes
        $resumes = Resume::where('user_id', AuthFacade::id())->get();

        return view('seeker.apply', compact('vacancy', 'resumes'));
    }

    /**
     * Store a new application.
     */
    public function store(Request $request, JobVacansy $vacancy)
    {
        // Check if vacancy is active
        if ($vacancy->status !== 'active') {
            return redirect()->route('seeker.dashboard')
                ->with('error', 'This vacancy is no longer available.');
        }

        // Check if user already applied
        $existingApplication = JobApplication::where('user_id', AuthFacade::id())
            ->where('job_vacansy_id', $vacancy->id)
            ->first();

        if ($existingApplication) {
            return redirect()->route('seeker.my-applications')
                ->with('info', 'You have already applied to this vacancy.');
        }

        // $request->validate([
        //     'resume_id' => 'nullable|exists:resumes,id',
        //     'cover_letter' => 'nullable|string|max:5000',
        // ]);

        JobApplication::create([
            'user_id' => AuthFacade::id(),
            'job_vacansy_id' => $vacancy->id,
            'resume_id' => $request->resume_id,
            'company_id' => $vacancy->company_id,
            'status' => 'pending',
            'aiGeneratedScore' => rand(40, 95), // Mock AI score for now
        ]);

        return redirect()->route('seeker.my-applications')
            ->with('success', 'Your application has been submitted successfully!');
    }

    /**
     * Show the vacancy details.
     */
    public function showVacancy(JobVacansy $vacancy)
    {
        $vacancy->load(['company', 'jobCategory']);

        // Check if user already applied
        $hasApplied = JobApplication::where('user_id', AuthFacade::id())
            ->where('job_vacansy_id', $vacancy->id)
            ->exists();

        return view('seeker.vacansy_show', compact('vacancy', 'hasApplied'));
    }

    /**
     * List the user's applications.
     */
    public function myApplications()
    {
        $user = AuthFacade::user();

        $applications = JobApplication::with(['jobVacansy.company', 'jobVacansy.jobCategory'])
            ->where('user_id', $user->id)
            ->latest()
            ->paginate(10);

        $totalApplications = $user->jobApplications()->count();
        $pendingApplications = $user->jobApplications()->where('status', 'pending')->count();
        $acceptedApplications = $user->jobApplications()->where('status', 'accepted')->count();
        $rejectedApplications = $user->jobApplications()->where('status', 'rejected')->count();

        return view('seeker.my_applications', compact(
            'applications',
            'totalApplications',
            'pendingApplications',
            'acceptedApplications',
            'rejectedApplications'
        ));
    }
}
