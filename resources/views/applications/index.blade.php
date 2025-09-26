@extends('layouts.sidebar')
@section('content')

<section class="content w-100">
    <div class="d-flex justify-content-between align-items-center">
        <h2 class="header-title">Applicatios</h2>
    </div>
    @if (session()->get('success'))
    <h6 class="alert alert-success p-3">{{ session()->get('success') }}</h6>
    @endif

    <table class="table table-hover mt-3">
        <thead class="table-custom">
            <tr>
                <th>#</th>
                <th>Username</th>
                <th>Phone</th>
                <th>Job Title</th>
                <th>Resume</th>
                <th>Status</th>
                <th class="text-center">Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($applications as $application)
            <tr>
                <td>{{ $application->id }}</td>
                <td>{{ $application->user->name }}</td>
                <td>{{ $application->user->phone }}</td>
                <td>{{ $application->job->title }}</td>
                <td>
                    @if($application->getFirstMediaUrl('resumes'))
                    <a href="{{ $application->getFirstMediaUrl('resumes') }}" target="_blank">View PDF</a>
                    @else
                    No Resume
                    @endif
                </td>
                <td>
                    <span class="badge 
                            @if($application->status == 'pending') bg-secondary 
                            @elseif($application->status == 'accepted') bg-success 
                            @else bg-danger @endif">
                        {{ $application->status }}
                    </span>
                </td>
                <td class="p-2 d-flex justify-content-center gap-2">
                    @if(Auth::user()->hasRole('admin') || Auth::user()->hasRole('employer'))
                    <form action="{{ route('applications.accept', $application) }}" method="POST" style="display:inline-block">
                        @csrf
                        <button class="btn btn-success">Accept</button>
                    </form>
                    <form action="{{ route('applications.reject', $application) }}" method="POST" style="display:inline-block">
                        @csrf
                        <button class="btn btn-danger">Reject</button>
                    </form>
                    @elseif(Auth::user()->hasRole('candidate'))
                    <a href="{{ route('applications.edit', $application->id) }}" class="btn btn-sm btn-custom">Update CV</a>
                    <form action="{{ route('applications.destroy', $application) }}" method="POST" style="display:inline-block">
                        @csrf
                        @method('DELETE')
                        <button class="btn btn-sm btn-secondary">Cancel</button>
                    </form>
                    @endif
                </td>

            </tr>
            @endforeach
        </tbody>

    </table>

    <div class="mt-4 d-flex justify-content-center">
        {{ $applications->links() }}
    </div>
</section>
@endsection