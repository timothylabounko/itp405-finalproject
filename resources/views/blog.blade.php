@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8">
                <br>
                <br>
                <h1>Comments</h1>
                <br>
                <p style="text-align: center;">If you have any feedback about the app, please leave it here!</p>
                <hr>
                @if($comments->count() > 0)
                    @foreach($comments as $comment)
                        <div class="card mb-3">
                            <div class="card-body">
                                <h5 class="card-title">{{ $comment->viewer->username }}</h5>
                                <p class="card-text">{{ $comment->body }}</p>
                                <p class="card-text"><small class="text-muted">{{ $comment->created_at->diffForHumans() }}</small></p>
                                @if(auth()->check())
                                    @if(auth()->user()->marks->contains('comment_id', $comment->id))
                                        <form action="{{ route('marks.remove', $comment->id) }}" method="POST" style="display: inline;">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-sm btn-warning">Unmark</button>
                                        </form>
                                    @else
                                        <form action="{{ route('marks.add', $comment->id) }}" method="POST" style="display: inline;">
                                            @csrf
                                            <button type="submit" class="btn btn-sm btn-success">Mark</button>
                                        </form>
                                    @endif
                                @endif
                                @if(auth()->check() && $comment->viewer_id === auth()->id())
                                    <a href="{{ route('comment.edit', $comment->id) }}" class="btn btn-sm btn-primary">Edit</a>
                                    <form action="{{ route('comment.destroy', $comment->id) }}" method="POST" style="display: inline;">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-sm btn-danger">Delete</button>
                                    </form>
                                @endif
                            </div>
                        </div>
                    @endforeach
                @else
                    <p>No comments yet. Be the first to comment!</p>
                @endif
                <hr>
                <h4>Add Your Comment</h4>
                <form action="{{ route('comment.store') }}" method="POST">
                    @csrf
                    <div class="form-group">
                        <textarea class="form-control" name="body" rows="3" placeholder="Write your comment here..."></textarea>
                    </div>
                    <button type="submit" class="btn btn-primary">Submit</button>
                </form>
            </div>
            <div class="col-md-4">
                <br>
                <br>
                <br>
                <img src="https://upload.wikimedia.org/wikipedia/commons/3/34/LA_China_Town_Train_Station_%2815143816342%29_%28cropped%29.jpg" alt="Image" style="border: 1px solid #ccc; padding: 5px; max-width: 100%; height: auto;">
                <p style="text-align: center; margin-top: 10px;">Courtesy of LA Metro</p>
                <br>
                <a href="{{ route('marks.index') }}" class="btn btn-primary btn-block">View Marks</a>
            </div>
        </div>
    </div>
@endsection
