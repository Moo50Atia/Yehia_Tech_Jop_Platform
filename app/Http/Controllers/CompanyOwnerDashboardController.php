<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CompanyOwnerDashboardController extends Controller
{
    public function index()
    {
        return view('company.dashboard');
    }
}
