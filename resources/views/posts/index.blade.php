@extends('layouts.app')

@section('content')
    <h1>
        @if(session('pageName'))
            {{ session('pageName') }}
        @else
            All Posts
        @endif
    </h1>
    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif
    
    <a href="{{ route('posts.create') }}" class="btn btn-primary">Create Post</a>
    @if (count($posts) > 0)
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>Title</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($posts as $post)
                    <tr>
                        <td>{{ $post->title }}</td>
                        <td>
                            <a href="{{ route('posts.show', $post) }}" class="btn btn-sm btn-primary">Show</a>
                            @can('delete', $post)
                            <form action="{{ route('posts.destroy', $post) }}" method="POST" style="display: inline-block;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Are you sure you want to delete this post?')">Delete</button>
                            </form>
                            @endcan
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @else
        <p>No posts found.</p>
    @endif
@endsection