@extends('base')

@section('title')
    Post List 
@endsection

@section('body')

    <div class="container">

    @if(session('message'))
        <div class="alert alert-{{ session('status') }} alert-dismissible fade show" role="alert">
            <strong>{{ session('message') }}</strong>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif

    <div class="card" style="width: 50rem;">
        <img src="{{ asset('storage/'.$post->image) }}" class="card-img-top" alt="...">
        <div class="card-body">
            <h5 class="card-title">{{$post->title}}</h5>
            <p class="card-text">{{$post->content}}</p>
            <a href="/posts/{{$post->id}}/edit" class="btn btn-primary">Update</a>
            <form method="POST" action="{{ route('posts.destroy', ['post' => $post->id]) }}" style="display:inline;">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger">Delete</button>
            </form>
        </div>
    </div>

    </div>

@endsection