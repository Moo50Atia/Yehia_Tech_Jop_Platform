<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CompanyOwnerCompanyController extends Controller
{
    public function index()
    {
        return view('company.my-company');
    }
}
