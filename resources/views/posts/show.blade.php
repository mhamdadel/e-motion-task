@extends('layouts.app')

@section('content')
    <h1>{{ $post->title }}</h1>
    <p>{{ $post->body }}</p>
    <a href="{{ route('posts.edit', $post) }}" class="btn btn-primary">Edit</a>
    <form action="{{ route('posts.destroy', $post) }}" method="POST" style="display: inline-block;">
        @csrf
        @method('DELETE')
        <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure you want to delete this post?')">Delete</button>
    </form>
@endsection