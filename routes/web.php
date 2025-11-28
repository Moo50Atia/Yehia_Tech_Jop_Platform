<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CompanyOwnerDashboardController;
use App\Http\Controllers\CompanyOwnerCompanyController;
use App\Http\Controllers\CompanyOwnerVacansyController;
use App\Http\Controllers\CompanyOwnerApplicationController;
use App\Http\Controllers\CompanyOwnerCategoryController;
use App\Http\Controllers\CompanyOwnerUserController;
// Public routes
Route::get('/', function () {
    return view('welcome');
});

// Auth routes (Breeze / Jetstream)
require __DIR__ . '/auth.php';

// Company Owner routes
Route::middleware(['auth'])->group(function () {

    Route::get('dashboard', [CompanyOwnerDashboardController::class, 'index'])
        ->name('company.dashboard');

    Route::get('my-company', [CompanyOwnerCompanyController::class, 'index'])
        ->name('company.my-company');

    Route::resource('vacansies', CompanyOwnerVacansyController::class);

    Route::get('applications', [CompanyOwnerApplicationController::class, 'index'])
        ->name('company.applications');

    Route::get('categories', [CompanyOwnerCategoryController::class, 'index'])
        ->name('company.categories');
});
