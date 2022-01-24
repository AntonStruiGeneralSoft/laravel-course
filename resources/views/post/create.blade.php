@extends('layouts.main')

@section('title')Create post @endsection

@section('content')
    <div>
        <form action="{{ route('posts.store') }}" method="post">
            @csrf
            <div class="form-group">
                <label for="title">Title</label>
                <input type="text" name="title" value="{{ old('title') }}" class="form-control" id="title" placeholder="Enter title">
                
                @error('title')
                    <p class="text-danger">{{ $message }}</p>
                @enderror
            </div>
            <div class="form-group">
                <label for="content">Content</label>
                <textarea class="form-control" name="content" id="content" placeholder="Enter content">{{ old('content') }}</textarea>
            </div>
            <div class="form-group">
                <label for="img">Image</label>
                <input type="text" name="img" value="{{ old('img') }}" class="form-control" id="img" placeholder="Enter image">
            </div>
            <div class="form-group">
                <label for="category">Category</label>
                <select class="form-control" id="category" name="category_id">
                    @foreach($categories as $category)
                        <option {{ old('category_id') == $category->id ? 'selected' : '' }} value="{{ $category->id }}">{{ $category->title }}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label for="tag">Tags</label>
                <select multiple class="form-control" id="tag" name="tags[]">
                    @foreach($tags as $tag)
                        <option value="{{ $tag->id }}">{{ $tag->title }}</option>
                    @endforeach
                </select>
            </div>
            <button type="submit" class="btn btn-primary">Create</button>
        </form>
    </div>
@endsection