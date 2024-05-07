@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Create New Blog Post</h1>
        <form method="POST" action="{{ route('posts.store') }}">
            @csrf
            <div class="form-group">
                <label for="title">Title</label>
                <input type="text" class="form-control" id="title" name="title" required>
            </div>
            <div class="form-group">
                <label for="content">Content</label>
                <textarea class="form-control" id="content" name="content" rows="8" required></textarea>
            </div>
            <div class="form-group">
                <label for="author">Author</label>
                <input type="text" class="form-control" id="author" name="author" required>
            </div>
            <button type="submit" class="btn btn-primary">Create Post</button>
        </form>
    </div>
<br>
<br>
<p style="text-align: center;">Created by Timothy Labounko 2024<p>
@endsection
