<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CompanyOwnerDashboardController;
use App\Http\Controllers\CompanyOwnerCompanyController;
use App\Http\Controllers\CompanyOwnerVacansyController;
use App\Http\Controllers\CompanyOwnerApplicationController;
use App\Http\Controllers\CompanyOwnerCategoryController;
use App\Http\Controllers\CompanyOwnerUserController;
use App\Http\Controllers\JopSeeker\SeekerDashboardController;
use \App\Http\Controllers\JopSeeker\SeekerApplicationController;
// Public routes
Route::get('/', function () {
    return view('welcome');
});

// Route::get('vacansies/{id?}', function () {
//     return view('job_vacansies.show');
// })->name('vacansies.show.virtual');

// Virtual routes for frontend-only show pages (override resource routes)
// These routes are defined BEFORE resource routes to take precedence
// Route::get('users/{id?}', function () {
//     return view('users.show');
// })->name('users.show.virtual');

Route::get('companies/{id?}', function () {
    return view('companies.show');
})->name('companies.show.virtual');

// Route::get('categories/{id?}', function () {
//     return view('jop_categories.show');
// })->name('categories.show.virtual');


// Route::get('applications/{id?}', function () {
//     return view('jop_applications.show');
// })->name('applications.show.virtual');
// Auth routes (Breeze / Jetstream)
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

    Route::get('users', [CompanyOwnerUserController::class, 'index'])
        ->name('company.users');

    // Job Seeker Routes
    Route::prefix('seeker')->name('seeker.')->group(function () {
        Route::get('dashboard', [SeekerDashboardController::class, 'index'])
            ->name('dashboard');
        Route::get('vacancy/{vacancy}', [SeekerApplicationController::class, 'showVacancy'])
            ->name('vacancy.show');
        Route::get('vacancy/{vacancy}/apply', [SeekerApplicationController::class, 'show'])
            ->name('apply');
        Route::post('vacancy/{vacancy}/apply', [SeekerApplicationController::class, 'store'])
            ->name('apply.store');
        Route::get('my-applications', [SeekerApplicationController::class, 'myApplications'])
            ->name('my-applications');

        // Resume management routes
        Route::get('resumes', [SeekerDashboardController::class, 'myResumes'])
            ->name('resumes');
        Route::get('resume/upload', [SeekerDashboardController::class, 'showUploadResume'])
            ->name('resume.upload');
        Route::post('resume/upload', [SeekerDashboardController::class, 'storeResume'])
            ->name('resume.store');
        Route::get('resume/{resume}/download', [SeekerDashboardController::class, 'downloadResume'])
            ->name('resume.download');
        Route::delete('resume/{resume}', [SeekerDashboardController::class, 'deleteResume'])
            ->name('resume.delete');
    });

    // Virtual routes for frontend-only show pages (no backend required)
    Route::get('resume/show/{id?}', function () {
        return view('resumes.show');
    })->name('resume.show');

    Route::get('resume/create', function () {
        return view('resumes.create');
    })->name('resume.create');

    Route::get('resume/edit/{id?}', function () {
        return view('resumes.edit');
    })->name('resume.edit');
});
require __DIR__ . '/auth.php';

require __DIR__ . '/admin.php';
