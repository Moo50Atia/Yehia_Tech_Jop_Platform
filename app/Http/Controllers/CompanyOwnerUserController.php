<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CompanyOwnerUserController extends Controller
{
    public function index()
    {
        return view('company.users');
    }
}
