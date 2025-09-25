<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Applications</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <style>
        body {
            margin: 0;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }

        .sidebar {
            background-color: #0f1829;
            min-height: 100vh;
            width: 250px;
            position: fixed;
            left: 0;
            top: 0;
            padding: 30px 20px;
        }

        .sidebar .nav-link {
            color: rgba(220, 209, 183, 0.9);
            margin: 10px 0;
            transition: 0.3s;
            line-height: 40px;
        }

        .sidebar .nav-link:hover {
            color: #ffffff;
            padding-left: 10px;
        }

        .content {
            margin-left: 250px;
            padding: 30px;
            background: #ffffff;
            min-height: 100vh;
        }

        .header-title {
            margin-bottom: 20px;
            font-weight: bold;
            font-size: 1.6rem;
            color: #0f1829;

        }

        .btn-ctm {
            background-color: rgba(146, 135, 110, 0.9);
        }

        .btn-ctm:hover {
            background-color: rgba(201, 190, 166, 0.9);
        }

        .btn-user {
            background-color: #0f1829;
            color: rgba(220, 209, 183, 0.9);
            border: none;
            transition: 0.3s;
        }

        .table-custom th {
            background-color: #0f1829 !important;
            color: rgba(220, 209, 183, 0.95) !important;
            font-weight: 600;
        }

        .btn-user:hover {
            border: none;
            color: rgba(220, 209, 183, 0.9);
            opacity: 1;
            text-decoration: underline;
            text-decoration-thickness: 2px;
            text-underline-offset: 8px;
            background-color: #fff;
        }

        .btn-custom {
            background-color: #0f1829;
            color: rgba(220, 209, 183, 0.9);
            border: none;
            transition: 0.3s;
        }

        .btn-custom:hover {
            background-color: #1c2942;
            color: #fff;
        }

        .pagination .page-item .page-link {
            background-color: #0f1829;
            color: rgba(220, 209, 183, 0.9);
        }

        .pagination .page-item.active .page-link {
            background-color: rgba(146, 135, 110, 0.9);
            color: #fff;
            font-weight: bold;
            border: none;
        }
    </style>
</head>

<body>
    <div class="d-flex">
        <nav class="sidebar d-flex flex-column justify-content-between">
            <div>
                <h4 class="text-light mb-4">Dashboard</h4>
                <a class="nav-link" href="{{ route('jobs.index') }}">View Jobs</a>
                <a class="nav-link" href="{{ route('jobs.create') }}">Create Job</a>
                <a class="nav-link" href="">View Applications</a>
            </div>

            <div class="mt-auto pt-4">
                <div class="dropdown">
                    <div class="btn-group dropup">
                        <button type="button" class="btn btn-custom">
                            {{ Auth::user()->name }}
                        </button>
                        <button type="button" class="btn btn-custom dropdown-toggle dropdown-toggle-split" data-bs-toggle="dropdown" aria-expanded="false">
                            <span class="visually-hidden">Toggle Dropdown</span>
                        </button>
                        <ul class="dropdown-menu">
                            <li>
                                <a class="dropdown-item" href="{{ route('profile.edit') }}">
                                    Profile
                                </a>
                            </li>
                            <li>
                                <form method="POST" action="{{ route('logout') }}">
                                    @csrf
                                    <button type="submit" class="dropdown-item">
                                        Log Out
                                    </button>
                                </form>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </nav>

        <section class="content w-100">
            <div class="d-flex justify-content-between align-items-center">
                <h2 class="header-title">Applicatios</h2>
                <a href="{{ route('jobs.index') }}" class="btn btn-secondary">← Back</a>
            </div>

            @if (session()->get('success'))
            <h6 class="alert alert-success p-3">{{ session()->get('success') }}</h6>
            @endif

            <table class="table table-hover mt-3">
                <thead class="table-custom">
                    <tr>
                        <th>#</th>
                        <th>Job Title</th>
                        <th>Username</th>
                        <th>Phone</th>
                        <th>Resume</th>
                        <th>status</th>
                        <th class="text-center">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($applications as $application)
                    <tr>
                        <td>{{ $application->id }}</td>
                        <td>{{ $job->title }}</td>
                        <td>{{ $application->user->name }}</td>
                        <td>{{ $application->user->phone }}</td>
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
                            <form action="{{ route('applications.accept', $application) }}" method="POST" style="display:inline-block">
                                @csrf
                                <button class="btn btn-success">Accept</button>
                            </form>
                            <form action="{{ route('applications.reject', $application) }}" method="POST" style="display:inline-block">
                                @csrf
                                <button class="btn btn-danger">Reject</button>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                </tbody>


            </table>

            <div class="mt-4 d-flex justify-content-center">
                {{ $applications->links() }}
            </div>
        </section>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
</body>

</html>