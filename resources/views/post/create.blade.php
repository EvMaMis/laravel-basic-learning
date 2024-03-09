@extends('layouts.main')
@section('content')
    <form action="{{route('post.store')}}" method="POST">
        @csrf
        <div class="form-group">
            <label for="title" class="form-label">Title</label>
            <input value="{{old('title')}}" name="title" type="text" class="form-control" id="title" placeholder="title">
            @error('title')
            <p class="text-danger">{{$message}}</p>
            @enderror
        </div>
        <div class="form-group">
            <label for="content" class="form-label">Content</label>
            <textarea name="content" id="content" placeholder="content" class="form-control">{{old('content')}}</textarea>
            @error('content')
            <p class="text-danger">{{$message}}</p>
            @enderror
        </div>
        <div class="form-group">
            <label for="image" class="form-label">Title</label>
            <input value="{{old('image')}}" name="image" type="text" class="form-control" id="image" placeholder="image">
            @error('image')
            <p class="text-danger">{{$message}}</p>
            @enderror
        </div>
        <div class="form-group">
            <label for="category">Category</label>
            <select class="form-control" id="category" name="category_id">
                @foreach($categories as $category)
                    <option
                        {{old('category_id') == $category->id ? 'selected' : ''}}
                        value="{{$category->id}}">{{$category->title}}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label for="tags">Tags</label>
            <select multiple class="form-control" id="tags" name="tags[]">
                @foreach($tags as $tag)
                    <option value="{{$tag->id}}">{{$tag->title}}</option>
                @endforeach
            </select>
        </div>
        <button type="submit" class="btn btn-primary" name="create-post">Submit</button>
    </form>
@endsection
