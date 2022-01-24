@extends('layouts.main')

@section('title')Show post @endsection

@section('content')
    <div>
        <div>{{ $post->title }}</div>
        <div>{{ $post->content }}</div>
        <div>{{ $post->img }}</div>
        <div>{{ $post->category->title }}</div>
    </div>
    <div>
        <a href="{{ route('posts.edit', $post->id) }}">Edit</a>
    </div>
    <div>
        <form action="{{ route('posts.delete', $post->id) }}" method="post">
            @csrf
            @method('delete')
            <input type="submit" value="Delete">
        </form>
    </div>
    <div>
        <a href="{{ route('posts.index') }}">Back</a>
    </div>
@endsection