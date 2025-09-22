<?php

use App\Http\Controllers\JobController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use Spatie\Permission\Models\Role;

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
});

require __DIR__ . '/auth.php';


Route::middleware(['auth', 'role:employer|admin'])->group(function () {
    Route::resource('/jobs', JobController::class);

    Route::get('/jobs/{job}/applications', [JobController::class, 'applications'])
        ->name('jobs.applications');

    Route::put('/jobs/{job}/applications/{application}', [JobController::class, 'updateApplicationStatus'])
        ->name('jobs.applications.update');

});
