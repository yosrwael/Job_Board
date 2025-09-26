@extends('layouts.sidebar')
@section('content')
<section class="content w-100">
    <h3 class="mb-4">Categories</h3>
    @if (session()->get('success'))
    <h6 class="alert alert-success p-3">{{ session()->get('success') }}</h6>
    @endif

    <form action="{{ route('categories.store') }}" method="POST" class="d-flex mb-4">
        @csrf
        <input type="text" name="name" class="form-control me-2" placeholder="New Category" required>
        <button type="submit" class="btn btn-custom">Add</button>
    </form>

    <div class="list-group">
        @forelse($categories as $category)
            <div class="list-group-item d-flex justify-content-between align-items-center">
                {{ $category->name }}
                <form action="{{ route('categories.destroy', $category) }}" method="POST"
                      onsubmit="return confirm('Are you sure you want to delete this category?')">
                    @csrf
                    @method('DELETE')
                    <button class="btn btn-sm btn-danger">Delete</button>
                </form>
            </div>
        @empty
            <div class="list-group-item text-muted">No categories found.</div>
        @endforelse
    </div>

    <div class="mt-3 d-flex justify-content-center">
        {{ $categories->links() }}
    </div>
</section>
@endsection
