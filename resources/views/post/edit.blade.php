@extends('layouts.main')

@section('title')Edit post @endsection

@section('content')
    <div>
        <form action="{{ route('posts.update', $post->id) }}" method="post">
            @csrf
            @method('patch')
            <div class="form-group">
                <label for="title">Title</label>
                <input type="text" name="title" value="{{ $post->title }}" class="form-control" id="title" placeholder="Enter title">
            </div>
            <div class="form-group">
                <label for="content">Content</label>
                <textarea class="form-control" name="content" id="content" placeholder="Enter content">{{ $post->content }}</textarea>
            </div>
            <div class="form-group">
                <label for="img">Image</label>
                <input type="text" name="img" value="{{ $post->img }}" class="form-control" id="img" placeholder="Enter image">
            </div>
            <div class="form-group">
                <label for="category">Category</label>
                <select class="form-control" id="category" name="category_id">
                    @foreach($categories as $category)
                        <option
                            {{ $category->id === $post->category->id ? 'selected' : '' }}
                            value="{{ $category->id }}">{{ $category->title }}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label for="tag">Tags</label>
                <select multiple class="form-control" id="tag" name="tags[]">
                    @foreach($tags as $tag)
                        <option
                            @foreach($post->tags as $postTag)
                                {{ $tag->id === $postTag->id ? 'selected' : '' }}
                            @endforeach
                            value="{{ $tag->id }}">{{ $tag->title }}</option>
                    @endforeach
                </select>
            </div>
            <button type="submit" class="btn btn-primary">Update</button>
        </form>
    </div>
@endsection