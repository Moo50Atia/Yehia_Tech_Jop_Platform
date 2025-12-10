<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\JobApplication;
use Illuminate\Support\Facades\Auth;
use App\Models\Company;
use App\Helper\Helper;

class CompanyOwnerApplicationController extends Controller
{
    public function index()
    {
        $userID = Auth::user()->id;
        $company = Company::where('owner_id', $userID)->first();
        $applications = JobApplication::where('company_id', $company->id)->cursorPaginate(10);
        $totalApplications = $applications->count();
        $pendingApplications = $applications->where('status', 'pending')->count();
        $acceptedApplications = $applications->where('status', 'accepted')->count();
        $rejectedApplications = $applications->where('status', 'rejected')->count();
        // dd($applications);


        return view('company.applications', compact('applications', 'totalApplications', 'pendingApplications', 'acceptedApplications', 'rejectedApplications'));
    }
}
