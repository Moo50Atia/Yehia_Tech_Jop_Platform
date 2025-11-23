<?php

namespace App\Http\Controllers;

use App\Models\Company;
use App\Models\User;
use Illuminate\Http\Request;

class CompanyController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $companies = Company::with('owner')->latest()->paginate(15);
        return view('companies.index', compact('companies'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $users = User::where('role', 'company_owner')->get();
        return view('companies.create', compact('users'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'address' => 'required|string|max:500',
            'industry' => 'required|string|max:255',
            'website' => 'nullable|url|max:255',
            'owner_id' => 'required|exists:users,id',
        ]);

        Company::create($validated);

        return redirect()->route('company.index')
            ->with('success', 'Company created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $company = Company::with(['owner', 'jobVacansies'])->findOrFail($id);
        return view('companies.show', compact('company'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $company = Company::findOrFail($id);
        $users = User::where('role', 'company_owner')->get();
        return view('companies.edit', compact('company', 'users'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $company = Company::findOrFail($id);

        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'address' => 'required|string|max:500',
            'industry' => 'required|string|max:255',
            'website' => 'nullable|url|max:255',
            'owner_id' => 'required|exists:users,id',
        ]);

        $company->update($validated);

        return redirect()->route('company.index')
            ->with('success', 'Company updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $company = Company::findOrFail($id);
        $company->delete();

        return redirect()->route('company.index')
            ->with('success', 'Company deleted successfully.');
    }
}
