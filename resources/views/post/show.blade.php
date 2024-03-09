@extends('layouts.main')
@section('content')
    <div>
        <div>{{$post->id}}. {{$post->title}}</div>
        <div>{{$post->content}}</div>
    </div>
    <div>
        <a class="btn btn-outline-warning" href="{{route('post.edit', $post->id) }}">Edit</a>
    </div>

    <div>
        <form action="{{route('post.delete', $post->id)}}" method="post">
            @csrf
            @method('delete')
            <input type="submit" class="btn btn-outline-danger" value="Delete">
        </form>
    </div>

    <div>
        <a class="btn btn-outline-secondary" href="{{route('post.index') }}">Back</a>
    </div>
@endsection
