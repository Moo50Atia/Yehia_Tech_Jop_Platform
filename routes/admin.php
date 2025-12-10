<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\CompanyController;
use App\Http\Controllers\Admin\JopCategoryController;
use App\Http\Controllers\Admin\JobVacansyController;
use App\Http\Controllers\Admin\JopApplicationController;
use App\Http\Controllers\Admin\DashboardController;

Route::middleware(['auth', 'admin'])
    ->prefix('admin/')
    ->name('admin.')
    ->group(function () {

        Route::get('dashboard', [DashboardController::class, 'index'])->name('dashboard');
        Route::get('reports', function () {
            return view('reports');
        })->name('reports');


        // Admin CRUD routes
        Route::resource('users', UserController::class);
        Route::resource('companies', CompanyController::class);
        Route::resource('categories', JopCategoryController::class)->parameters(['categories' => 'category']);
        Route::resource('vacansies', JobVacansyController::class)->parameters(['vacansies' => 'vacansy']);
        Route::resource('applications', JopApplicationController::class)->parameters(['applications' => 'application']);
    });
