<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CompanyOwnerCategoryController extends Controller
{
    public function index()
    {
        return view('company.categories');
    }
}
