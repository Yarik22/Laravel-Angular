{{-- resources/views/posts/user/index.blade.php --}}
@extends('layouts.app')

@section('content')
    <h1 class="mb-4">My Posts</h1>

    <a href="{{ route('posts.create') }}" class="btn btn-success mb-3">Create New Post</a>

    @if($posts->isEmpty())
        <div class="alert alert-warning">You have no posts yet.</div>
    @else
        <div class="row">
            @foreach($posts as $post)
                <div class="col-md-4 mb-4">
                    <div class="card h-100">
                        <img src="{{ $post->image ? 'data:image/jpeg;base64,' . base64_encode($post->image) : 'https://via.placeholder.com/300' }}" class="card-img-top" alt="{{ $post->title }}">
                        <div class="card-body d-flex flex-column">
                            <h5 class="card-title">{{ $post->title }}</h5>
                            <p class="card-text">{{ Str::limit($post->content, 100) }}</p>
                            <p class="text-muted">Status: {{ $post->status }}</p>
                            
                            <div class="mt-auto">
                                <a href="{{ route('posts.show', $post->id) }}" class="btn btn-primary">Read More</a>
                                <a href="{{ route('posts.edit', $post->id) }}" class="btn btn-warning">Edit</a>
                                <form action="{{ route('posts.destroy', $post->id) }}" method="POST" style="display:inline;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure you want to delete this post?');">Delete</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    @endif
@endsection
