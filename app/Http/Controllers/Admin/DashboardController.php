<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Company;
use App\Models\JobVacansy;
use App\Models\JobApplication;
use App\Models\User;

class DashboardController extends Controller
{
    public function index()
    {
        $companies = Company::monthlyStats();
        $vacancies = JobVacansy::monthlyStats();
        $applications = JobApplication::monthlyStats();
        $users = User::monthlyStats();

        // Chart Data: User Growth (Last 6 Months)
        $userGrowthData = [];
        $userGrowthLabels = [];
        for ($i = 5; $i >= 0; $i--) {
            $month = now()->subMonths($i);
            $userGrowthLabels[] = $month->format('M');
            $userGrowthData[] = User::whereYear('created_at', $month->year)
                ->whereMonth('created_at', $month->month)
                ->count();
        }

        // Chart Data: Applications by Status
        $applicationsByStatus = [
            'pending' => JobApplication::where('status', 'pending')->count(),
            'accepted' => JobApplication::where('status', 'accepted')->count(),
            'rejected' => JobApplication::where('status', 'rejected')->count(),
            'under_review' => JobApplication::where('status', 'under_review')->count(),
        ];

        return view('dashboard', [
            'companies' => $companies,
            'vacancies' => $vacancies,
            'applications' => $applications,
            'users' => $users,
            'userGrowthLabels' => $userGrowthLabels,
            'userGrowthData' => $userGrowthData,
            'applicationsByStatus' => $applicationsByStatus,
        ]);
    }
}
