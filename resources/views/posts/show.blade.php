@extends('layouts.app')

@section('content')
    <div class="container mt-5">
        <div class="card shadow-sm mb-4">
            <div class="card-body">
                <h1 class="card-title mb-4">{{ $post->title }}</h1>
                
                <div class="mb-3">
                    <p class="font-weight-bold">Status:</p>
                    <span class="badge badge-{{ $post->status === 'published' ? 'success' : 'warning' }}">{{ ucfirst($post->status) }}</span>
                </div>
                
                <div class="mb-3">
                    <p class="font-weight-bold">Posted by User ID:</p>
                    <span class="text-muted">{{ $post->user_id }}</span>
                </div>
                
                <div class="mb-4">
                    @if($post->image)
                        <img src="data:image/jpeg;base64,{{ base64_encode($post->image) }}" alt="{{ $post->title }}" class="img-fluid rounded shadow" style="max-width: 100%; height: auto;">
                    @else
                        <img src="https://via.placeholder.com/600x400" alt="Placeholder image" class="img-fluid rounded shadow" style="max-width: 100%; height: auto;">
                    @endif
                </div>
                
                <p class="lead mb-4">{{ $post->content }}</p>

                <div class="d-flex justify-content-between">
                    <a href="{{ route('posts.index') }}" class="btn btn-secondary">Back to Posts</a>
                    <a href="{{ route('posts.user.index') }}" class="btn btn-secondary">Back to Gallery</a> 
                </div>
            </div>
        </div>
    </div>
@endsection
