<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CompanyOwnerApplicationController extends Controller
{
    public function index()
    {
        return view('company.applications');
    }
}
