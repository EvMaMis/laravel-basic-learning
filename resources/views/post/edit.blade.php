@extends('layouts.main')
@section('content')
    <form action="{{route('post.update', $post->id)}}" method="post">
        @csrf
        @method('patch')
        <div class="form-group">
            <label for="title" class="form-label">Title</label>
            <input value="{{$post->title}}" name="title" type="text" class="form-control" id="title" placeholder="title">
        </div>
        <div class="form-group">
            <label for="content" class="form-label">Content</label>
            <textarea name="content" id="content" placeholder="content" class="form-control">{{$post->content}}</textarea>
        </div>
        <div class="form-group">
            <label for="image" class="form-label">Image</label>
            <input value="{{$post->image}}" name="image" type="text" class="form-control" id="image" placeholder="image">
        </div>
        <div class="form-group">
            <label for="category">Category</label>
            <select class="form-control" id="category" name="category_id">
                @foreach($categories as $category)
                    <option
                        {{$category->id === $post->category_id ? 'selected' : ''}}
                        value="{{$category->id}}">{{$category->title}}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label for="tags">Tags</label>
            <select multiple class="form-control" id="tags" name="tags[]">
                @foreach($tags as $tag)
                    <option
                        @foreach($post->tags as $postTag)
                            {{$tag->id === $postTag->id ? 'selected' : ''}}

                        @endforeach
                        value="{{$tag->id}}">{{$tag->title}}</option>
                @endforeach
            </select>
        </div>
        <button type="submit" class="btn btn-primary" name="create-post">Update</button>
    </form>
@endsection
