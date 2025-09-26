@extends('layouts.sidebar')

@section('content')
<section class="content w-100" style="width: auto;">
    <h3 class="mb-4">My Notifications</h3>

    <div class="list-group">
        @foreach($notifications as $notification)
            <div class="list-group-item d-flex justify-content-between align-items-center {{ $notification->read_at ? '' : 'bg-light border-dark' }}">
                <span>{{ $notification->data['message'] ?? '' }}</span>
                <small class="text-muted">{{ $notification->created_at->diffForHumans() }}</small>
            </div>

            <br>
        @endforeach

        @if($notifications->isEmpty())
            <div class="list-group-item text-center text-muted">
                No notifications found.
            </div>
        @endif
    </div>

    <div class="mt-4 d-flex justify-content-center">
        {{ $notifications->links() }}
    </div>
</section>
@endsection
