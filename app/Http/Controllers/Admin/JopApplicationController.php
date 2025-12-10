<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\JopApplicationRequest;
use App\Models\JobApplication;
use App\Models\User;
use App\Models\JobVacansy;
use App\Models\Resume;
use App\Models\Company;

class JopApplicationController extends Controller
{
    public function index(): \Illuminate\Contracts\View\View
    {
        $jop_applications = JobApplication::with(['user', 'jobVacansy', 'resume', 'company'])->latest()->paginate(10);
        return view('jop_applications.index', compact('jop_applications'));
    }

    public function create(): \Illuminate\Contracts\View\View
    {
        $users = User::where('role', 'jop_seeker')->get();
        $vacancies = JobVacansy::with('company')->get();
        $resumes = Resume::with('user')->get();
        $companies = Company::all();
        return view('jop_applications.create', compact('users', 'vacancies', 'resumes', 'companies'));
    }

    public function store(JopApplicationRequest $request): \Illuminate\Http\RedirectResponse
    {
        JobApplication::create($request->validated());
        return redirect()->route('admin.applications.index')->with('success', 'Application created successfully');
    }

    public function show(JobApplication $application): \Illuminate\Contracts\View\View
    {
        $application->load(['user', 'jobVacansy', 'resume', 'company']);
        return view('jop_applications.show', compact('application'));
    }

    public function edit(JobApplication $application): \Illuminate\Contracts\View\View
    {
        $users = User::where('role', 'jop_seeker')->get();
        $vacancies = JobVacansy::with('company')->get();
        $resumes = Resume::with('user')->get();
        $companies = Company::all();
        return view('jop_applications.edit', compact('application', 'users', 'vacancies', 'resumes', 'companies'));
    }

    public function update(JopApplicationRequest $request, JobApplication $application): \Illuminate\Http\RedirectResponse
    {
        $application->update($request->validated());
        return redirect()->route('admin.applications.index')->with('success', 'Application updated successfully');
    }

    public function destroy(JobApplication $application): \Illuminate\Http\RedirectResponse
    {
        $application->delete();
        return redirect()->route('admin.applications.index')->with('success', 'Application deleted successfully');
    }
}
