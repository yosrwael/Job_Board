<?php

use Spatie\Permission\Models\Role;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\JobController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\CandidateController;
use App\Http\Controllers\ApplicationController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return redirect()->route('jobs.index');
})->middleware(['auth', 'verified'])->name('dashboard');


Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';


Route::middleware(['auth', 'role:employer|admin|candidate'])->group(function () {
    Route::resource('/jobs', JobController::class);
    Route::get('/jobs/{job}/applications', [JobController::class, 'applications'])->name('jobs.applications');
    Route::post('/applications/{application}/accept', [JobController::class, 'accept'])->name('applications.accept');
    Route::post('/applications/{application}/reject', [JobController::class, 'reject'])->name('applications.reject');
});

Route::resource('applications', ApplicationController::class)->middleware('role:admin|employer|candidate');

Route::get('/candidate/jobs/search', [CandidateController::class, 'search'])->name('candidate.jobs.search')->middleware(['auth', 'role:candidate']);

Route::middleware(['auth', 'role:candidate'])->group(function () {
    Route::get('/applications/create/{job}', [ApplicationController::class, 'create'])->name('applications.create');
    Route::post('/applications/store/{job}', [ApplicationController::class, 'store'])->name('applications.store');
});
