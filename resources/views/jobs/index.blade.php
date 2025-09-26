@extends('layouts.sidebar')
@section('content')

<section class="content w-100">
    <div class="d-flex justify-content-between align-items-center">
        <h2 class="header-title">Jobs</h2>
        @role('admin|employer')
        <a href="{{ route('jobs.create') }}" class="btn btn-custom">+ New Job</a>
        @else
        @include('jobs.search')
        @endrole
    </div>
    @if (session()->get('success'))
    <h6 class="alert alert-success p-3">{{ session()->get('success') }}</h6>
    @endif

    <table class="table table-hover mt-3">
        <thead class="table-custom">
            <tr>
                <th>#</th>
                <th>Title</th>
                <th>Location</th>
                <th>Work Type</th>
                <th>Deadline</th>
                <th class="text-center">Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($jobs as $job)
            <tr>
                <td>{{ $job->id }}</td>
                <td>{{ $job->title }}</td>
                <td>{{ $job->location }}</td>
                <td>{{ $job->work_type }}</td>
                <td>{{ $job->deadline?->format('Y-m-d') }}</td>
                <td class="p-2 d-flex justify-content-around">
                    <a href="{{ route('jobs.show', $job) }}" class="btn btn-sm btn-ctm text-white">View Details</a>
                    @if (Auth::user()->hasRole('candidate'))
                    <a href="{{ route('applications.create', $job->id) }}" class="btn btn-sm btn-primary">Apply Now</a>
                    @else
                    <a href="{{ route('jobs.edit', $job) }}" class="btn btn-sm btn-custom">Update</a>
                    <form action="{{ route('jobs.destroy', $job) }}" method="POST" style="display:inline-block">
                        @csrf
                        @method('DELETE')
                        <button class="btn btn-sm btn-danger" onclick="return confirm('Are you sure?')">Delete</button>
                    </form>
                    @endif
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>

    <div class="mt-4 d-flex justify-content-center">
        {{ $jobs->links() }}
    </div>
</section>
@endsection