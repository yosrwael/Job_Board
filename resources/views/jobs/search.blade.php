<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        .btn-search {
            background-color: #0f1829;
            color: rgba(220, 209, 183, 0.9);
            border: none;
            transition: 0.3s;
            margin-left: 50px !important;
        }

        .btn-search:hover {
            background-color: #1c2942;
            color: #fff;
        }

        .search-box {
            width: 400px !important;
        }
    </style>
</head>

<body>
    <form action="{{ route('candidate.jobs.search') }}" method="GET" class="row g-2 mb-4">
        <div class="col-8 ">
            <input type="text" name="filter[search]" class="form-control search-box"
                placeholder="Search (title, description, location, salary, category)"
                value="{{ request('filter.search') }}">
        </div>
        <div class="col-md-2">
            <button type="submit" class="btn btn-search">Search</button>
        </div>
    </form>
</body>

</html>