<?php

use Spatie\Permission\Models\Role;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\JobController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\CategoryController;
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

Route::get('/applications', [ApplicationController::class, 'index'])
    ->name('applications.index')
    ->middleware(['auth', 'role:admin|employer|candidate']);


Route::middleware(['auth', 'role:candidate'])->group(function () {
    Route::get('/jobs/{job}/apply', [ApplicationController::class, 'create'])->name('applications.create');
    Route::post('/jobs/{job}/apply', [ApplicationController::class, 'store'])->name('applications.store');
    Route::delete('/applications/{application}', [ApplicationController::class, 'destroy'])->name('applications.destroy');
    Route::get('applications/{application}/edit', [ApplicationController::class, 'edit'])->name('applications.edit');
    Route::put('applications/{application}/update', [ApplicationController::class, 'update'])->name('applications.update');
});

Route::get('/candidate/jobs/search', [CandidateController::class, 'search'])->name('candidate.jobs.search')->middleware(['auth', 'role:candidate']);

Route::get('users', [AdminController::class, 'users'])->name('users.index')->middleware(['auth', 'role:admin']);
Route::delete('users/{user}', [AdminController::class, 'destroy'])->name('users.destroy')->middleware(['auth', 'role:admin']);

Route::get('/notifications', [App\Http\Controllers\NotificationController::class, 'index'])
    ->name('notifications.index')
    ->middleware('auth');

Route::resource('categories', CategoryController::class)->middleware(['auth', 'role:admin']);
