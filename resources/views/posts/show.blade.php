@extends('layouts.app')

@section('content')
@if(session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
@endif
    <h1>{{ $post->title }}</h1>
    <p>{{ $post->body }}</p>
    
    @can('delete', $post)
        <a href="{{ route('posts.edit', $post) }}" class="btn btn-primary">Edit</a>
        <form action="{{ route('posts.destroy', $post) }}" method="POST" style="display: inline-block;">
            @csrf
            @method('DELETE')
            <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Are you sure you want to delete this post?')">Delete</button>
        </form>
    @endcan
    
    <h3>Add Comment</h3>
    <form action="{{ route('comments.store') }}" method="POST">
        @csrf
        <input type="hidden" name="post_id" value="{{ $post->id }}">
        <div class="form-group">
            <textarea name="comment" class="form-control" placeholder="Add a comment" rows="3" required></textarea>
        </div>
        <button type="submit" class="btn btn-primary">Add Comment</button>
    </form>

    <h2>Comments</h2>
    <ul>
        @foreach ($post->comments as $comment)
            <li>
                <strong>{{ $comment->user->name }}:</strong> {{ $comment->comment }}
                @can('delete', $comment)
                    <form action="{{ route('comments.destroy', $comment) }}" method="POST" style="display: inline-block;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Are you sure you want to delete this post?')">Delete</button>
                    </form>
                @endcan
            </li>
        @endforeach
    </ul>

@endsection