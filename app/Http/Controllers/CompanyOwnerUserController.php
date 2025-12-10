<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Company;
use Illuminate\Support\Facades\Auth;
use App\Models\JobApplication;
use App\Models\User;

class CompanyOwnerUserController extends Controller
{
    public function index()
    {
        $company = Company::where('owner_id', Auth::user()->id)->first();
        $totalApplications = JobApplication::where('company_id', $company->id)->count();
        // جلب كل applicants لشركتك

        $users = User::whereHas('jobApplications', function ($query) use ($company) {
            $query->where('company_id', $company->id);
        })
            ->with(['jobApplications' => function ($query) use ($company) {
                $query->where('company_id', $company->id);
            }])
            ->cursorPaginate(10);
        $totalApplicants = User::whereHas('jobApplications', function ($query) {
            $query->where('company_id', Auth::user()->company->id);
        })->count();

        return view('company.users', compact('users', 'totalApplicants', 'totalApplications'));
    }
}
