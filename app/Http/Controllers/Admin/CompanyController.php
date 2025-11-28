<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\CompanyRequest;
use App\Models\Company;

class CompanyController extends Controller
{
    public function index(): \Illuminate\Contracts\View\View
    {
        $companies = Company::latest()->paginate(10);
        return view('companies.index', compact('companies'));
    }

    public function create(): \Illuminate\Contracts\View\View
    {
        return view('companies.create');
    }

    public function store(CompanyRequest $request): \Illuminate\Http\RedirectResponse
    {
        Company::create($request->validated());
        return redirect()->route('companies.index')->with('success', 'Created successfully');
    }

    public function show(Company $company): \Illuminate\Contracts\View\View
    {
        return view('companies.show', compact('company'));
    }

    public function edit(Company $company): \Illuminate\Contracts\View\View
    {
        return view('companies.edit', compact('company'));
    }

    public function update(CompanyRequest $request, Company $company): \Illuminate\Http\RedirectResponse
    {
        $company->update($request->validated());
        return redirect()->route('companies.index')->with('success', 'Updated successfully');
    }

    public function destroy(Company $company): \Illuminate\Http\RedirectResponse
    {
        $company->delete();
        return redirect()->route('companies.index')->with('success', 'Deleted successfully');
    }
}
