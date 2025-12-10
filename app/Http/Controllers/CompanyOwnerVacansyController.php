<?php

namespace App\Http\Controllers;

use App\Models\Company;
use App\Models\JobVacansy;
use App\Models\JopCategory;
use App\Http\Requests\JobVacansyRequest;
use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Support\Facades\Auth;

class CompanyOwnerVacansyController extends Controller
{
    use AuthorizesRequests;

    public function index()
    {
        $company = Company::where('owner_id', Auth::user()->id)->first();

        if (!$company) {
            return redirect()->route('company.my-company')->with('error', 'Please create your company profile first.');
        }

        $vacancies = JobVacansy::where('company_id', $company->id)->with('jobCategory')->get();
        $totalVacancies = $vacancies->count();
        $activeVacancies = $vacancies->where('status', 'active')->count();
        $pendingVacancies = $vacancies->where('status', 'pending')->count();
        $rejectedVacancies = $vacancies->where('status', 'rejected')->count();

        return view('company.vacancies', compact('vacancies', 'totalVacancies', 'activeVacancies', 'pendingVacancies', 'rejectedVacancies'));
    }

    public function create()
    {
        $this->authorize('create', JobVacansy::class);

        $categories = JopCategory::all();

        return view('job_vacansies.create', compact('categories'));
    }

    public function store(JobVacansyRequest $request)
    {
        $this->authorize('create', JobVacansy::class);

        $company = Auth::user()->company;

        $vacancy = JobVacansy::create([
            'company_id' => $company->id,
            'job_category_id' => $request->job_category_id,
            'title' => $request->title,
            'description' => $request->description,
            'note' => $request->note,
            'location' => $request->location,
            'type' => $request->type,
            'salary' => $request->salary,
            'status' => $request->status ?? 'pending',
        ]);

        return redirect()->route('company.my-company')->with('success', 'We received your request and the Admin will approve it.');
    }

    public function show(JobVacansy $vacansy)
    {
        $this->authorize('view', $vacansy);

        $vacansy->load(['company', 'jobCategory', 'JobApplications.user']);

        return view('job_vacansies.show', compact('vacansy'));
    }

    public function edit(JobVacansy $vacansy)
    {
        $this->authorize('update', $vacansy);

        $categories = JopCategory::all();

        return view('job_vacansies.edit', compact('vacansy', 'categories'));
    }

    public function update(JobVacansyRequest $request, JobVacansy $vacansy)
    {
        $this->authorize('update', $vacansy);

        $vacansy->update([
            'job_category_id' => $request->job_category_id,
            'title' => $request->title,
            'description' => $request->description,
            'note' => $request->note,
            'location' => $request->location,
            'type' => $request->type,
            'salary' => $request->salary,
            'status' => $request->status ?? $vacansy->status,
        ]);

        return redirect()->route('vacansies.index')->with('success', 'Vacancy updated successfully.');
    }

    public function destroy(JobVacansy $vacansy)
    {
        $this->authorize('delete', $vacansy);

        $vacansy->delete();

        return redirect()->route('vacansies.index')->with('success', 'Vacancy deleted successfully.');
    }
}
