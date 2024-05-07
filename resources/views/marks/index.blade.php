@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8">
                <br>
                <br>
                <h1>My Bookmarked Posts</h1>
                <hr>
                @if($marks->isEmpty())
                    <p>No posts bookmarked yet.</p>
                @else
                    @foreach($marks as $mark)
                        <div class="card mb-3">
                            <div class="card-body">
                                <h5 class="card-title">{{ $mark->entity->title }}</h5>
                                <p class="card-text">{{ $mark->entity->content }}</p>
                                <p class="card-text">
                                    <small class="text-muted">Bookmarked on {{ $mark->created_at->format('F d, Y \a\t h:i A') }}</small>
                                </p>
                                <form action="{{ route('mark.remove') }}" method="POST" style="display: inline;">
                                    @csrf
                                    <input type="hidden" name="entity_id" value="{{ $mark->entity_id }}">
                                    <button type="submit" class="btn btn-sm btn-danger">Remove Bookmark</button>
                                </form>
                            </div>
                        </div>
                    @endforeach
                @endif
            </div>
        </div>
    </div>
@endsection
