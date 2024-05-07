@extends('layouts.app')

@section('content')
<br>
<br>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Edit Comment') }}</div>

                    <div class="card-body">
                        <form method="POST" action="{{ route('comment.update', $comment->id) }}">
                            @csrf
                            @method('PUT')

                            <div class="form-group">
                                <label for="body">{{ __('Comment') }}</label>
                                <textarea id="body" class="form-control" name="body" rows="3">{{ $comment->body }}</textarea>
                            </div>

                            <button type="submit" class="btn btn-primary">
                                {{ __('Update Comment') }}
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
