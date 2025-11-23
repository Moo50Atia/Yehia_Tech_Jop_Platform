<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    // Company Routes
    Route::resource('companies', App\Http\Controllers\CompanyController::class)->names('company');

    // Job Category Routes
    Route::resource('categories', App\Http\Controllers\JopCategoryController::class)->names('category');

    // Job Vacancy Routes
    Route::resource('job-vacancies', App\Http\Controllers\JobVacansyController::class)->names('job-vacancy');

    // Application Routes
    Route::resource('applications', App\Http\Controllers\JopApplicationController::class)->names('application');

    // User Routes
    Route::resource('users', App\Http\Controllers\UserController::class)->names('user');

    // Resume Routes
    Route::resource('resumes', App\Http\Controllers\ResumeController::class)->names('resume');
});

require __DIR__ . '/auth.php';
