@extends('layouts.app')

@section('content')
    <h1>Edit Post: {{ $post->title }}</h1>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('posts.update', $post->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <div class="form-group">
            <label for="title">Title</label>
            <input type="text" name="title" id="title" class="form-control" value="{{ old('title', $post->title) }}" required>
        </div>

        <div class="form-group">
            <label for="content">Content</label>
            <textarea name="content" id="content" class="form-control" required>{{ old('content', $post->content) }}</textarea>
        </div>

        <div class="form-group">
            <label for="image">Image (Leave blank to keep current image)</label>
            <input type="file" name="image" id="image" class="form-control" accept="image/jpeg">
            <small class="form-text text-muted">Max file size: 50 KB. Accepted formats: JPG, JPEG only.</small>
        </div>

        @if($post->image)
            <div>
                <img src="data:image/jpeg;base64,{{ base64_encode($post->image) }}" alt="{{ $post->title }}" style="max-width: 300px;">
            </div>
        @endif

        <div class="form-group">
            <label for="status">Status</label>
            <select name="status" id="status" class="form-control" required>
                <option value="draft" {{ (old('status', $post->status) === 'draft') ? 'selected' : '' }}>Draft</option>
                <option value="published" {{ (old('status', $post->status) === 'published') ? 'selected' : '' }}>Published</option>
            </select>
        </div>

        <button type="submit" class="btn btn-primary">Update Post</button>
        <a href="{{ route('posts.index') }}" class="btn btn-secondary">Back to Posts</a>
        <a href="{{ route('posts.user.index') }}" class="btn btn-secondary">Back to Gallery</a> 
    </form>
@endsection
