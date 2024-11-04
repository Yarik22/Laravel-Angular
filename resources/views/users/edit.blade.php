@extends('layouts.app')

@section('content')
    <div class="container mt-5">
        <h1>Edit Profile</h1>

        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <div class="card shadow">
            <div class="card-body">
                <form action="{{ route('users.update') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')

                    <div class="form-group">
                        <label for="name">Name</label>
                        <input type="text" name="name" id="name" class="form-control" value="{{ old('name', $user->name) }}" required>
                    </div>

                    <div class="form-group">
                        <label for="email">Email</label>
                        <input type="email" name="email" id="email" class="form-control" value="{{ old('email', $user->email) }}" readonly>
                        <small class="form-text text-muted">Your email cannot be changed.</small>
                    </div>

                    <div class="form-group">
                        <label for="bio">Bio</label>
                        <textarea name="bio" id="bio" class="form-control">{{ old('bio', $user->bio) }}</textarea>
                    </div>

                    <div class="form-group">
                        <label for="profile_image">Profile Image (JPG only, max 50 KB)</label>
                        <input type="file" name="profile_image" id="profile_image" class="form-control">
                        <small class="form-text text-muted">Leave blank to keep current image.</small>
                    </div>

                    @if($user->profile_image)
                        <div>
                            <img src="data:image/jpeg;base64,{{ base64_encode($user->profile_image) }}" alt="{{ $user->name }}" style="max-width: 300px;">
                        </div>
                    @endif

                    <div class="d-flex justify-content-between mt-3">
                        <button type="submit" class="btn btn-primary">Update Profile</button>
                        <a href="{{ route('users.profile') }}" class="btn btn-secondary">Back to Profile</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
