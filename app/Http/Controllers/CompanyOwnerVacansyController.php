<?php

namespace App\Http\Controllers;

use App\Models\JobVacansy;
use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Support\Facades\Auth as FacadesAuth;

class CompanyOwnerVacansyController extends Controller
{
    use AuthorizesRequests;

    public function index()
    {
        // $this->authorize('viewAny', JobVacansy::class);

        // $vacancies = JobVacansy::where('company_id', FacadesAuth::user()->company_id)->paginate(10);
        return view('company.vacancies');
    }

    public function edit(JobVacansy $vacancy)
    {
        $this->authorize('update', $vacancy);

        return view('vacancies.edit', compact('vacancy'));
    }

    public function store(Request $request)
    {
        $this->authorize('create', JobVacansy::class);
        return view('vacancies.create');
    }

    public function update(Request $request, JobVacansy $vacancy)
    {
        $this->authorize('update', $vacancy);

        $vacancy->update($request->validated());
        return redirect()->route('owner.vacancies.index');
    }

    public function destroy(JobVacansy $vacancy)
    {
        $this->authorize('delete', $vacancy);

        $vacancy->delete();
        return redirect()->route('owner.vacancies.index');
    }
}
