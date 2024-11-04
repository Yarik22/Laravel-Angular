@extends('layouts.app')

@section('content')
    <div class="container mt-5">
        <h1>Delete Account</h1>
        <p>Are you sure you want to delete your account? This action cannot be undone.</p>

        <div class="card shadow">
            <div class="card-body text-center">
                <form action="{{ route('users.destroy') }}" method="POST">
                    @csrf
                    @method('DELETE')

                    <button type="submit" class="btn btn-danger">Yes, Delete My Account</button>
                    <a href="{{ route('users.profile') }}" class="btn btn-secondary">Cancel</a>
                </form>
            </div>
        </div>
    </div>
@endsection
