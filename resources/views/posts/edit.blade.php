@extends('layouts.app')

@section('content')
    <h1>Edit Post</h1>
    <form action="{{ route('posts.update', $post) }}" method="POST">
        @csrf
        @method('PUT')
        @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif
        <div class="form-group">
            <label for="title">Title:</label>
            <input type="text" name="title" id="title" class="form-control @error('title') is-invalid @enderror" value="{{ old('title', $post->title) }}" required>
            @error('title')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
        <div class="form-group">
            <label for="body">Body:</label>
            <textarea name="body" id="body" class="form-control @error('body') is-invalid @enderror" rows="10" required>{{ old('body', $post->body) }}</textarea>
            @error('body')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
        <button type="submit" class="btn btn-primary">Update</button>
    </form>
@endsection