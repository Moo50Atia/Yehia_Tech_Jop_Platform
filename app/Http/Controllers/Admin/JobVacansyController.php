<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\JobVacansyRequest;
use App\Models\JobVacansy;

class JobVacansyController extends Controller
{
    public function index(): \Illuminate\Contracts\View\View
    {
        $job_vacansies = JobVacansy::latest()->paginate(10);
        return view('job_vacansies.index', compact('job_vacansies'));
    }

    public function create(): \Illuminate\Contracts\View\View
    {
        return view('job_vacansies.create');
    }

    public function store(JobVacansyRequest $request): \Illuminate\Http\RedirectResponse
    {
        JobVacansy::create($request->validated());
        return redirect()->route('job_vacansies.index')->with('success', 'Created successfully');
    }

    public function show(JobVacansy $jobVacansy): \Illuminate\Contracts\View\View
    {
        return view('job_vacansies.show', compact('jobVacansy'));
    }

    public function edit(JobVacansy $jobVacansy): \Illuminate\Contracts\View\View
    {
        return view('job_vacansies.edit', compact('jobVacansy'));
    }

    public function update(JobVacansyRequest $request, JobVacansy $jobVacansy): \Illuminate\Http\RedirectResponse
    {
        $jobVacansy->update($request->validated());
        return redirect()->route('job_vacansies.index')->with('success', 'Updated successfully');
    }

    public function destroy(JobVacansy $jobVacansy): \Illuminate\Http\RedirectResponse
    {
        $jobVacansy->delete();
        return redirect()->route('job_vacansies.index')->with('success', 'Deleted successfully');
    }
}
