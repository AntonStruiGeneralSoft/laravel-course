@extends('layouts.main')

@section('title')Posts @endsection

@section('content')
    <div>
        <a href="{{ route('posts.create') }}">Create</a>
    </div>
    @foreach($posts as $post)
        <p><a href="{{ route('posts.show', $post->id) }}">{{ $post->id }}. {{ $post->title }}</a></p>
    @endforeach
    <div>
        {{ $posts->withQueryString()->links() }}
    </div>
@endsection