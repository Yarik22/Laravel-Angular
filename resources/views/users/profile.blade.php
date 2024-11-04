@extends('layouts.app')

@section('content')
    <div class="container mt-5">
        <h1>Your Profile</h1>

        <div class="card shadow">
            <div class="card-body text-center">
                <h3>{{ $user->name }}</h3>
                <p>Email: {{ $user->email }}</p>
                <p>Bio: {{ $user->bio }}</p>

                @if($user->profile_image)
                    <img src="data:image/jpeg;base64,{{ base64_encode($user->profile_image) }}" alt="{{ $user->name }}" class="img-fluid rounded" style="max-width: 200px;">
                @else
                    <img src="https://via.placeholder.com/200" alt="Placeholder image" class="img-fluid rounded" style="max-width: 200px;">
                @endif

                <a href="{{ route('users.edit') }}" class="btn btn-primary mt-3">Edit Profile</a>
                <a href="{{ route('users.delete') }}" class="btn btn-danger mt-3">Delete Account</a>
            </div>
        </div>
    </div>
@endsection
