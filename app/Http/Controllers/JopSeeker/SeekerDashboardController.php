<?php

namespace App\Http\Controllers\JopSeeker;

use App\Http\Controllers\Controller;
use App\Models\JobVacansy;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\Resume;
use App\Http\Requests\UploadResumeRequest;
use Illuminate\Support\Facades\Storage;

class SeekerDashboardController extends Controller
{
    /**
     * Show the resume upload form.
     */
    public function showUploadResume()
    {
        $user = Auth::user();
        $resumes = Resume::where('user_id', $user->id)->latest()->get();

        return view('seeker.upload_resume', compact('resumes'));
    }

    /**
     * Store an uploaded resume securely.
     */
    public function storeResume(UploadResumeRequest $request)
    {
        $user = Auth::user();

        // Get sanitized filename from the Form Request
        $sanitizedFilename = $request->getSanitizedFilename();

        // Store the file in a private directory (not publicly accessible)
        $path = $request->file('resume')->storeAs(
            'resumes/' . $user->id,
            $sanitizedFilename,
            'local' // Use local storage (not public)
        );

        // Create the resume record
        $resume = Resume::create([
            'user_id' => $user->id,
            'filename' => $request->title ?? pathinfo($request->file('resume')->getClientOriginalName(), PATHINFO_FILENAME),
            'fileURL' => $path,
            'contactDetails' => null,
            'education' => null,
            'summary' => null,
            'skills' => null,
            'experience' => null,
        ]);

        return redirect()->route('seeker.resumes')
            ->with('success', 'Resume uploaded successfully!');
    }

    /**
     * Show list of user's resumes.
     */
    public function myResumes()
    {
        $user = Auth::user();
        $resumes = Resume::where('user_id', $user->id)->latest()->get();

        return view('seeker.my_resumes', compact('resumes'));
    }

    /**
     * Download a resume file (only the owner can download).
     */
    public function downloadResume(Resume $resume)
    {
        // Authorization check
        if ($resume->user_id !== Auth::id()) {
            abort(403, 'Unauthorized access to this resume.');
        }

        // Check if file exists
        if (!Storage::disk('local')->exists($resume->fileURL)) {
            abort(404, 'Resume file not found.');
        }

        return response()->download(
            Storage::disk('local')->path($resume->fileURL),
            $resume->filename . '.pdf'
        );
    }

    /**
     * Delete a resume (only the owner can delete).
     */
    public function deleteResume(Resume $resume)
    {
        // Authorization check
        if ($resume->user_id !== Auth::id()) {
            abort(403, 'Unauthorized access to this resume.');
        }

        // Delete the file from storage
        if (Storage::disk('local')->exists($resume->fileURL)) {
            Storage::disk('local')->delete($resume->fileURL);
        }

        // Delete the database record
        $resume->delete();

        return redirect()->route('seeker.resumes')
            ->with('success', 'Resume deleted successfully!');
    }

    public function index(Request $request)
    {
        $query = JobVacansy::with(['company', 'jobCategory'])
            ->where('status', 'active');

        // Search by title or company name
        if ($request->has('search') && $request->search !== '') {
            $search = $request->search;
            $query->where(function ($q) use ($search) {
                $q->where('title', 'like', "%{$search}%")
                    ->orWhereHas('company', function ($q) use ($search) {
                        $q->where('name', 'like', "%{$search}%");
                    });
            });
        }

        // Filter by job type
        if ($request->has('type') && $request->type !== '' && $request->type !== 'all') {
            $query->where('type', $request->type);
        }

        // Filter by category
        if ($request->has('category') && $request->category !== '' && $request->category !== 'all') {
            $query->where('job_category_id', $request->category);
        }

        $vacancies = $query->latest()->paginate(12);

        // Get categories for filter dropdown
        $categories = \App\Models\JopCategory::all();

        // Get user stats
        $user = User::find(Auth::user()->id);
        $totalApplications = $user->jobApplications()->count();
        $pendingApplications = $user->jobApplications()->where('status', 'pending')->count();
        $acceptedApplications = $user->jobApplications()->where('status', 'accepted')->count();

        return view('seeker.dashboard', compact(
            'vacancies',
            'categories',
            'totalApplications',
            'pendingApplications',
            'acceptedApplications'
        ));
    }
}
