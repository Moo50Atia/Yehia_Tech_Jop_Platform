<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\JopCategory;
use App\Models\Company;
use Illuminate\Support\Facades\Auth;

class CompanyOwnerCategoryController extends Controller
{
    public function index()
    {
        $company = Company::where('owner_id', Auth::user()->id)->with("jobVacancies.jobCategory")->first();
        // كل الفاكانسيز الخاصة بالشركة
        $vacancies = $company->jobVacancies;

        // نجمعها حسب الكاتيجوري
        $categoriesStats = $vacancies->groupBy(function ($vacancy) {
            return $vacancy->jobCategory->name;
        })->map(function ($group) {
            return [
                "count" => $group->count(),
                "vacancies" => $group
            ];
        });

        // dd($categoriesStats);

        return view('company.categories', compact('categoriesStats'));
    }
}
