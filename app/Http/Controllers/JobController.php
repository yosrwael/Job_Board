<?php

namespace App\Http\Controllers;

use App\Actions\StoreJobAction;
use App\Actions\UpdateJobAction;
use App\Http\Requests\StoreJobRequest;
use App\Http\Requests\UpdateJobRequest;
use App\Models\JobListing;
use App\Models\Application;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Support\Facades\Auth;

class JobController extends Controller
{
    use AuthorizesRequests;
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $this->authorize('viewAny', JobListing::class);

        $user = Auth::user();
        if ($user && $user->hasRole('admin')) {
            $jobs = JobListing::paginate(10);
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
        $this->authorize('view', $job);

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

    public function accept(Application $application)
    {
        $application->update(['status' => 'accepted']);
        return back()->with('success', 'Application accepted.');
    }

    public function reject(Application $application)
    {
        $application->update(['status' => 'rejected']);
        return back()->with('success', 'Application rejected.');
    }
}
