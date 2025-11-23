<?php

namespace App\Http\Controllers;

use App\Models\JobVacansy;
use App\Models\Company;
use App\Models\JopCategory;
use Illuminate\Http\Request;

class JobVacansyController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $jobVacancies = JobVacansy::with(['company', 'jobCategory'])->latest()->paginate(15);
        return view('job-vacancies.index', compact('jobVacancies'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $companies = Company::all();
        $categories = JopCategory::all();
        return view('job-vacancies.create', compact('companies', 'categories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'requirements' => 'required|string',
            'salary_range' => 'nullable|string|max:255',
            'location' => 'required|string|max:255',
            'job_type' => 'required|in:full_time,part_time,contract,internship',
            'company_id' => 'required|exists:companies,id',
            'job_category_id' => 'required|exists:jop_categories,id',
        ]);

        JobVacansy::create($validated);

        return redirect()->route('job-vacancy.index')
            ->with('success', 'Job vacancy created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $jobVacancy = JobVacansy::with(['company', 'jobCategory', 'applications'])->findOrFail($id);
        return view('job-vacancies.show', compact('jobVacancy'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $jobVacancy = JobVacansy::findOrFail($id);
        $companies = Company::all();
        $categories = JopCategory::all();
        return view('job-vacancies.edit', compact('jobVacancy', 'companies', 'categories'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $jobVacancy = JobVacansy::findOrFail($id);

        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'requirements' => 'required|string',
            'salary_range' => 'nullable|string|max:255',
            'location' => 'required|string|max:255',
            'job_type' => 'required|in:full_time,part_time,contract,internship',
            'company_id' => 'required|exists:companies,id',
            'job_category_id' => 'required|exists:jop_categories,id',
        ]);

        $jobVacancy->update($validated);

        return redirect()->route('job-vacancy.index')
            ->with('success', 'Job vacancy updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $jobVacancy = JobVacansy::findOrFail($id);
        $jobVacancy->delete();

        return redirect()->route('job-vacancy.index')
            ->with('success', 'Job vacancy deleted successfully.');
    }
}
