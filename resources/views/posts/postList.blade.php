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

    @foreach($datas as $d )
    <div class="card shadow mb-5" style="width: 38rem;">
        <img src="{{ asset('storage/'.$d->image) }}" class="card-img-top" alt="...">
        <div class="card-body">
            <h5 class="card-title">{{$d->title}}</h5>
            <p class="card-text">{{$d->content}}</p>
            <a href="/posts/{{$d->id}}" class="btn btn-primary">Detail</a>
        </div>
    </div>
    @endforeach

    </div>

@endsection