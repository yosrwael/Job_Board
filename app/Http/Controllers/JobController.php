<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\JobListing;
use App\Models\Application;
use Illuminate\Http\Request;
use App\Actions\StoreJobAction;
use App\Actions\UpdateJobAction;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\StoreJobRequest;
use App\Http\Requests\UpdateJobRequest;
use App\Notifications\ApplicationAcceptedNotification;
use App\Notifications\ApplicationRejectedNotification;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class JobController extends Controller
{
    use AuthorizesRequests;
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $user = Auth::user();
        if ($user->hasRole('admin')) {
            $jobs = JobListing::paginate(10);
        } elseif ($user->hasRole('candidate')) {
            $jobs = JobListing::where('status', 'accepted')->paginate(10);
        } else {
            $jobs = JobListing::where('user_id', $user->id)->paginate(10);
        }

        return view('jobs.index', compact('jobs'));
    }


    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = Category::all();
        return view('jobs.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreJobRequest $request, StoreJobAction $action)
    {
        $action->handle($request->validated());

        return redirect()->route('jobs.index')->with('success', 'Job created successfully');
    }

    /**
     * Display the specified resource.
     */

    public function show(JobListing $job)
    {
        return view('jobs.show', compact('job'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(JobListing $job)
    {
        $categories = Category::all();
        $this->authorize('update', $job);
        return view('jobs.edit', compact('job', 'categories'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateJobRequest $request, JobListing $job, UpdateJobAction $action)
    {
        $this->authorize('update', $job);

        $action->handle($request->validated(), $job);

        return redirect()->route('jobs.index')->with('success', 'Job updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(JobListing $job)
    {
        $this->authorize('delete', $job);
        $job->delete();
        return back()->with('success', 'Job deleted successfully');
    }

    public function applications(JobListing $job)
    {
        $this->authorize('reviewApplications', $job);

        $applications = $job->applications()->paginate(10);

        return view('jobs.applications', compact('job', 'applications'));
    }

    /**
     * Update application status.
     */

    public function approve(JobListing $job)
    {
        $job->update(['status' => 'accepted']);
        return back()->with('success', 'Job approved successfully.');
    }

    public function reject(JobListing $job)
    {
        $job->update(['status' => 'rejected']);
        return back()->with('error', 'Job rejected.');
    }
}
