@extends('layouts.app')

@section('content')
    <h1 class="mb-4">All Published Posts</h1>

    @if($posts->isEmpty())
        <div class="alert alert-warning">No published posts available.</div>
    @else
        <div class="row">
            @foreach($posts as $post)
                <div class="col-md-4 mb-4">
                    <div class="card h-100">
                        <img src="{{ $post->image ? 'data:image/jpeg;base64,' . base64_encode($post->image) : 'https://via.placeholder.com/300' }}" class="card-img-top" alt="{{ $post->title }}">
                        <div class="card-body d-flex flex-column">
                            <h5 class="card-title">{{ $post->title }}</h5>
                            <p class="card-text">{{ Str::limit($post->content, 100) }}</p>

                            <div class="mt-3 d-flex justify-content-between align-items-center">
                                <div class="d-flex align-items-center">
                                    @if($post->user->profile_image)
                                        <img src="data:image/jpeg;base64,{{ base64_encode($post->user->profile_image) }}" alt="{{ $post->user->name }}" class="rounded-circle" style="width: 40px; height: 40px; margin-right: 10px;">
                                    @else
                                        <img src="{{ asset('images/profiles/sample.jpg') }}" alt="Default Profile Image" class="rounded-circle" style="width: 40px; height: 40px; margin-right: 10px;">
                                    @endif
                                    <span class="font-weight-bold">{{ $post->user->name }}</span>
                                </div>
                                <small class="text-muted">{{ $post->created_at->diffForHumans() }}</small>
                            </div>

                            <div class="mt-auto">
                                <a href="{{ route('posts.show', $post->id) }}" class="btn btn-primary">Read More</a>

                                @auth
                                    @if ($post->user_id === auth()->id())
                                        <a href="{{ route('posts.edit', $post->id) }}" class="btn btn-warning">Edit</a>
                                        <form action="{{ route('posts.destroy', $post->id) }}" method="POST" style="display:inline;">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure you want to delete this post?');">Delete</button>
                                        </form>
                                    @endif
                                @endauth
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    @endif
@endsection
