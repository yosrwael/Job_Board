<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create New Job</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet"
        crossorigin="anonymous">

    <style>
        .btn-custom {
            background-color: #0f1829;
            color: rgba(237, 226, 202, 0.9);
            font-weight: bold;
            font-size: large;
        }

        .btn-custom:hover {
            background-color: #0f1829;
            color: rgba(237, 226, 202, 0.9);
            font-weight: bold;
            font-size: large;
        }
    </style>
</head>

<body class="bg-light">

    <h1 class="mt-4 text-center" style="color:#0f1829;">Create New Job</h1>

    <form action="{{ route('jobs.store') }}" method="POST" enctype="multipart/form-data" class="w-75 mx-auto my-4">
    @csrf

    <div class="mb-3">
        <label for="title" class="form-label">Title</label>
        <input type="text" class="form-control" id="title" name="title" required>
    </div>

    <div class="mb-3">
        <label for="description" class="form-label">Description</label>
        <textarea class="form-control" id="description" name="description" rows="3" required></textarea>
    </div>

    <div class="mb-3">
        <label for="responsibilities" class="form-label">Responsibilities</label>
        <textarea class="form-control" id="responsibilities" name="responsibilities" rows="3"></textarea>
    </div>

    <div class="mb-3">
        <label for="skills" class="form-label">Skills</label>
        <input type="text" class="form-control" id="skills" name="skills">
    </div>

    <div class="mb-3">
        <label for="qualifications" class="form-label">Qualifications</label>
        <textarea class="form-control" id="qualifications" name="qualifications" rows="2"></textarea>
    </div>

    <div class="mb-3">
        <label for="salary" class="form-label">Salary</label>
        <input type="text" class="form-control" id="salary" name="salary">
    </div>

    <div class="mb-3">
        <label for="benefits" class="form-label">Benefits</label>
        <textarea class="form-control" id="benefits" name="benefits" rows="2"></textarea>
    </div>

    <div class="mb-3">
        <label for="location" class="form-label">Location</label>
        <input type="text" class="form-control" id="location" name="location">
    </div>

    <div class="mb-3">
        <label for="work_type" class="form-label">Work Type</label>
        <select class="form-select" id="work_type" name="work_type">
            <option value="on-site">On-Site</option>
            <option value="remote">Remote</option>
            <option value="hybrid">Hybrid</option>
        </select>
    </div>

    <div class="mb-3">
        <label for="deadline" class="form-label">Application Deadline</label>
        <input type="date" class="form-control" id="deadline" name="deadline">
    </div>

    <div class="mb-3">
        <label for="company_logo" class="form-label">Company Logo</label>
        <input type="file" class="form-control" id="company_logo" name="company_logo">
    </div>

    <input type="hidden" name="status" value="pending">

    <div class="mb-3">
        <label for="category_id" class="form-label">Category</label>
        <select class="form-select" id="category_id" name="category_id">
            @foreach ($categories as $category)
                <option value="{{ $category->id }}">{{ $category->name }}</option>
            @endforeach
        </select>
    </div>

    <div class="text-center">
        <button type="submit" class="btn btn-custom">Create</button>
    </div>
</form>

</body>

</html>