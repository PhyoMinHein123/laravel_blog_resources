@extends('base')


@section('title')
    Post Update 
@endsection 


@section('body')

    <div class="container">
        <h2 class="mb-4"> Post Update </h2>
        <form method="POST" action="{{ route('posts.update', ['post' => $data->id]) }}"  enctype='multipart/form-data' class="card shadow p-4">
            @csrf
            @method('PUT')
            <div class="mb-3">
                <label class="form-label">Title</label>
                <input type="text" value="{{$data->title}}" name="title" class="form-control">
            </div>
            <div class="mb-3">
                <label class="form-label">Content</label>
                <textarea style="height: 100px;" type="text" name="content" class="form-control">{{$data->content}}</textarea>
            </div>

            @if($data->image)
            <a href="{{ asset('storage/'.$data->image) }}" >
                <img src="{{ asset('storage/'.$data->image) }}" style="width: 100px;" />
            </a>
            @endif

            <div class="mb-3">
                <label class="form-label">Image</label>
                <input type="file" value="{{$data->image}}" name="image" class="form-control">
            </div>
            
            <button type="submit" class="btn btn-primary">Update</button>
        </form>
    </div>

@endsection


