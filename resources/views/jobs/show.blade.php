<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Job Details</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <style>
        body {
            margin: 0;
            padding: 20px;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background: #f8f9fa;
        }

        .header-title {
            margin-bottom: 20px;
            font-weight: bold;
            font-size: 1.6rem;
            color: #0f1829;
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

        .table td {
            vertical-align: middle;
        }
    </style>
</head>

<body>
    <div class="container mt-4">
        <div class="d-flex justify-content-between align-items-center">
            <h2 class="header-title">Job Details</h2>
            <div>
                <a href="{{ route('jobs.index') }}" class="btn btn-secondary">← Back</a>
                @role('admin|employer')
                <a href="{{ route('jobs.applications', $job->id) }}" class="btn btn-custom">View Applications</a>
                @endrole
            </div>
        </div>

        <table class="table table-bordered table-striped mt-3">
            <tbody>
                <tr>
                    <th>ID</th>
                    <td>{{ $job->id }}</td>
                </tr>
                <tr>
                    <th>Company_name</th>
                    <td>{{ $job->employer->company_name}}</td>
                </tr>
                <tr>
                    <th>Company_logo</th>
                    <td>
                        <img src="{{ $job->getFirstMediaUrl('logos') }}" width="70" alt="logo">
                    </td>
                </tr>
                <tr>
                    <th>Title</th>
                    <td>{{ $job->title }}</td>
                </tr>
                <tr>
                    <th>Location</th>
                    <td>{{ $job->location }}</td>
                </tr>
                <tr>
                    <th>Work Type</th>
                    <td>{{ ucfirst($job->work_type) }}</td>
                </tr>
                <tr>
                    <th>Salary</th>
                    <td>{{ $job->salary ?? 'Not specified' }}</td>
                </tr>
                <tr>
                    <th>Deadline</th>
                    <td>{{ $job->deadline?->format('Y-m-d') }}</td>
                </tr>
                <tr>
                    <th>Category</th>
                    <td>{{ $job->category?->name ?? 'No category' }}</td>
                </tr>
                <tr>
                    <th>Description</th>
                    <td>{{ $job->description }}</td>
                </tr>
                <tr>
                    <th>Responsibilities</th>
                    <td>{{ $job->responsibilities ?? 'Not specified' }}</td>
                </tr>
                <tr>
                    <th>Skills</th>
                    <td>{{ $job->skills ?? 'Not specified' }}</td>
                </tr>
                <tr>
                    <th>Qualifications</th>
                    <td>{{ $job->qualifications ?? 'Not specified' }}</td>
                </tr>
                <tr>
                    <th>Benefits</th>
                    <td>{{ $job->benefits ?? 'Not specified' }}</td>
                </tr>
                <tr>
                    <th>Status</th>
                    <td>{{ $job->status }}</td>
                </tr>
                <tr>
                    <th>Created At</th>
                    <td>{{ $job->created_at->format('Y-m-d H:i') }}</td>
                </tr>
                <tr>
                    <th>Updated At</th>
                    <td>{{ $job->updated_at->format('Y-m-d H:i') }}</td>
                </tr>
            </tbody>
        </table>

    </div>
     
</body>

</html>