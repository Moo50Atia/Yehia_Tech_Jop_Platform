<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Company;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\JobApplication;

class CompanyOwnerCompanyController extends Controller
{
    public function index()
    {
        $company = Company::where('owner_id', Auth::user()->id)->first();
        $totalJobVacancy = $company->jobVacancies()->count();
        $totalApplicants = User::whereHas('jobApplications', function ($query) use ($company) {
            $query->where('company_id', $company->id);
        })->count();
        $totalJobApplication = JobApplication::where('company_id', $company->id)->count();
        $AVGapllicantScore = round((JobApplication::where('company_id', $company->id)->avg('aiGeneratedScore') / 10), 1);;
        $applications_received_per_vacancy = Get_Applications_received_per_vacancy($company, $totalJobApplication);
        // $FristAlphapetInCompanyCountry = getInitialsLaravel($company->country);
        $YearTheCompanyEstablished = $company->created_at->year;
        // dd($totalApplicants, $totalJobApplication);

        return view('company.my-company', compact('company', 'totalJobVacancy', 'totalJobApplication', 'totalApplicants', 'AVGapllicantScore', 'applications_received_per_vacancy', 'YearTheCompanyEstablished'));
    }
}
