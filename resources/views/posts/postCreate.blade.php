@extends('base')


@section('title')
    Post Create 
@endsection 


@section('body')

    <div class="container">
        <h2 class="mb-4"> Post Create </h2>
        <form method="POST" action="{{route('posts.store')}}" enctype='multipart/form-data' class="card shadow p-4">
            @csrf
            <div class="mb-3">
                <label class="form-label">Title</label>
                <input type="text" name="title" class="form-control" required>
            </div>
            <div class="mb-3">
                <label class="form-label">Content</label>
                <textarea style="height: 100px;" type="text" name="content" class="form-control" required></textarea>
            </div>
            <div class="mb-3">
                <label class="form-label">Image</label>
                <input type="file" name="image" class="form-control" required>
            </div>
            <button type="submit" class="btn btn-primary">Create</button>
        </form>
    </div>

@endsection
