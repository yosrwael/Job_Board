@extends('layouts.sidebar')
@section('content')
        <section class="content w-100">
            <div class="d-flex justify-content-between align-items-center">
                <h2 class="header-title">Users</h2>
            </div>
            @if (session()->get('success'))
            <h6 class="alert alert-success p-3">{{ session()->get('success') }}</h6>
            @endif

            <table class="table table-hover mt-3">
                <thead class="table-custom">
                    <tr>
                        <th>#</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Phone</th>
                        <th>Role</th>
                        <th class="text-center">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($users as $user)
                    <tr>
                        <td>{{ $user->id }}</td>
                        <td>{{ $user->name}}</td>
                        <td>{{ $user->email }}</td>
                        <td>{{ $user->Phone }}</td>
                        <td>{{ $user->getRoleNames()->first() }}</td>
                        <td class="p-2 d-flex justify-content-around">
                            <form action="{{ route('users.destroy', $user) }}" method="POST" style="display:inline-block">
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-sm btn-danger" onclick="return confirm('Are you sure?')">Delete</button>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>

            <div class="mt-4 d-flex justify-content-center">
                {{ $users->links() }}
            </div>
        </section>
@endsection