<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\CompanyRequest;
use App\Models\Company;
use App\Models\User;

class CompanyController extends Controller
{
    public function index(): \Illuminate\Contracts\View\View
    {
        $companies = Company::with('owner')->latest()->paginate(10);
        return view('companies.index', compact('companies'));
    }

    public function create(): \Illuminate\Contracts\View\View
    {
        $users = User::where('role', 'company_owner')->get();
        return view('companies.create', compact('users'));
    }

    public function store(CompanyRequest $request): \Illuminate\Http\RedirectResponse
    {
        Company::create($request->validated());
        return redirect()->route('admin.companies.index')->with('success', 'Company created successfully');
    }

    public function show(Company $company): \Illuminate\Contracts\View\View
    {
        $company->load('owner', 'jobVacancies');
        return view('companies.show', compact('company'));
    }

    public function edit(Company $company): \Illuminate\Contracts\View\View
    {
        $users = User::where('role', 'company_owner')->get();
        return view('companies.edit', compact('company', 'users'));
    }

    public function update(CompanyRequest $request, Company $company): \Illuminate\Http\RedirectResponse
    {
        $company->update($request->validated());
        return redirect()->route('admin.companies.index')->with('success', 'Company updated successfully');
    }

    public function destroy(Company $company): \Illuminate\Http\RedirectResponse
    {
        $company->delete();
        return redirect()->route('admin.companies.index')->with('success', 'Company deleted successfully');
    }
}
