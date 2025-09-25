<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title></title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

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


<div class="container">
    <h2 class="mt-4 text-center" style="color:#0f1829;">Update Your CV</h2>

    <form action="{{ route('applications.update', $application->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label for="resume" class="form-label">Upload New Resume</label>
            <input type="file" name="resume" id="resume" class="form-control">
        </div>
        <div class="text-center">
            <button type="submit" class="btn btn-custom text-center">Update Application</button>
        </div>
    </form>
    
</div>
</body>
</html>