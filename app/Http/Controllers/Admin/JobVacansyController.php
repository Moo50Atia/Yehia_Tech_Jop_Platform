<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\JobVacansyRequest;
use App\Models\JobVacansy;
use App\Models\Company;
use App\Models\JopCategory;

use Illuminate\Http\Request;

class JobVacansyController extends Controller
{
    public function index(Request $request): \Illuminate\Contracts\View\View
    {
        $query = JobVacansy::with(['company', 'jobCategory']);

        // Filter by status if provided
        if ($request->has('status') && $request->status !== 'all') {
            $query->where('status', $request->status);
        }

        $job_vacansies = $query->latest()->paginate(10);
        $statuses = ['all' => 'All', 'pending' => 'Pending', 'active' => 'Active', 'rejected' => 'Rejected'];
        $currentStatus = $request->status ?? 'all';

        return view('job_vacansies.index', compact('job_vacansies', 'statuses', 'currentStatus'));
    }

    public function create(): \Illuminate\Contracts\View\View
    {
        $companies = Company::all();
        $categories = JopCategory::all();
        return view('job_vacansies.create', compact('companies', 'categories'));
    }

    public function store(JobVacansyRequest $request): \Illuminate\Http\RedirectResponse
    {
        JobVacansy::create($request->validated());
        return redirect()->route('admin.vacansies.index')->with('success', 'Job vacancy created successfully');
    }

    public function show(JobVacansy $vacansy): \Illuminate\Contracts\View\View
    {
        $vacansy->load(['company', 'jobCategory', 'JobApplications']);
        return view('job_vacansies.show', compact('vacansy'));
    }

    public function edit(JobVacansy $vacansy): \Illuminate\Contracts\View\View
    {
        $companies = Company::all();
        $categories = JopCategory::all();
        return view('job_vacansies.edit', compact('vacansy', 'companies', 'categories'));
    }

    public function update(JobVacansyRequest $request, JobVacansy $vacansy): \Illuminate\Http\RedirectResponse
    {
        $vacansy->update($request->validated());
        return redirect()->route('admin.vacansies.index')->with('success', 'Job vacancy updated successfully');
    }

    public function destroy(JobVacansy $vacansy): \Illuminate\Http\RedirectResponse
    {
        $vacansy->delete();
        return redirect()->route('admin.vacansies.index')->with('success', 'Job vacancy deleted successfully');
    }
}
