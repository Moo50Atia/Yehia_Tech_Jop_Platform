<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\Models\JobVacansy;
use App\Models\JobApplication;
use App\Models\JopCategory;
use Illuminate\Support\Facades\Auth;

class CompanyOwnerDashboardController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        $company = $user->company;

        if (!$company) {
            return redirect()->route('company.my-company')->with('error', 'Please create your company profile first.');
        }

        // Statistics
        $totalVacancies = JobVacansy::where('company_id', $company->id)->count();
        $totalApplications = JobApplication::whereIn('job_vacansy_id', $company->jobVacancies->pluck('id'))->count();
        $activeVacancies = JobVacansy::where('company_id', $company->id)
            ->where('status', 'active')
            ->count();
        $acceptedApplications = JobApplication::whereHas('jobVacansy', function ($query) use ($company) {
            $query->where('company_id', $company->id);
        })->where('status', 'accepted')->count();

        // Chart Data: Applications per Category
        $categoriesData = JopCategory::withCount(['jobVacansies' => function ($query) use ($company) {
            $query->where('company_id', $company->id)
                ->whereHas('JobApplications');
        }])->having('job_vacansies_count', '>', 0)->get(); // There is Data there 


        $categoryLabels = [];
        $categoryData = [];
        foreach ($categoriesData as $category) {
            $categoryLabels[] = $category->name;
            $applicationCount = JobApplication::whereHas('jobVacansy', function ($query) use ($company, $category) {
                $query->where('company_id', $company->id)
                    ->where('job_category_id', $category->id);
            })->count();
            $categoryData[] = $applicationCount;
        }

        // Chart Data: Applications Trend (Last 7 Days)
        $trendLabels = [];
        $trendData = [];
        for ($i = 6; $i >= 0; $i--) {
            $date = now()->subDays($i);
            $trendLabels[] = $date->format('D'); // Mon, Tue, etc.
            $trendData[] = JobApplication::whereHas('jobVacansy', function ($query) use ($company) {
                $query->where('company_id', $company->id);
            })->whereDate('created_at', $date->toDateString())->count();
        }
        // dd($trendData);

        $recentApplications = JobApplication::whereHas('jobVacansy', function ($query) use ($company) {
            $query->where('company_id', $company->id);
        })->orderBy('created_at', 'desc')->limit(5)->get();
        // $IntialsLetters = getInitialsLaravel($user->name);

        return view('company.dashboard', [
            'totalVacancies' => $totalVacancies,
            'totalApplications' => $totalApplications,
            'activeVacancies' => $activeVacancies,
            'acceptedApplications' => $acceptedApplications,
            'categoryLabels' => $categoryLabels,
            'categoryData' => $categoryData,
            'trendLabels' => $trendLabels,
            'trendData' => $trendData,
            'recentApplications' => $recentApplications,
            // 'IntialsLetters' => $IntialsLetters,
        ]);
    }
}
