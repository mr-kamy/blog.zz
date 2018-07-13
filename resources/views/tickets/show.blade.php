@extends('master')
@section('title', 'View a ticket')
@section('content')

    <div class="container col-md-8 offset-md-2">
        <div class="card">
            <div class="card-body">
                <h2 class="card-header">{{ $ticket->title }}</h2>
                <p><strong>Status: </strong>{{ $ticket->status ? 'Pending' : 'Answered' }}</p>
                <p>{{ $ticket->content }}</p>
                <a href="{{ action('TicketsController@edit', $ticket->slug) }}" class="btn btn-info">Edit</a>
                <form method="post" action="{{ action('TicketsController@destroy', $ticket->slug) }}">
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                    <div class="form-group">
                        <button type="submit" class="btn btn-danger">Delete</button>
                    </div>
                </form>
                <div class="clearfix"></div>
            </div>
        </div>

        @foreach($comments as $comment)
            <div class="content">
                {{ $comment->content }}
            </div>
        @endforeach

        <form method="post" action="/comment">
            @foreach ($errors->all() as $error)
                <p class="alert alert-danger">{{ $error }}</p>
            @endforeach

            @if(session('status'))
                <p class="alert alert-success">{{ session('status') }}</p>
            @endif

            <input type="hidden" name="_token" value="{{ csrf_token() }}">
            <input type="hidden" name="post_id" value="{{ $ticket->id }}">

            <fieldset>
                <legend>Reply</legend>
                <div class="form-group">
                    <div class="col-lg-12">
                        <textarea class="form-control" rows="3" id="content" name="content"></textarea>
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-lg-10 offset-lg-2">
                        <button type="reset" class="btn btn-default">Cancel</button>
                        <button type="submit" class="btn btn-primary">Post</button>
                    </div>
                </div>
            </fieldset>
        </form>

    </div>

@endsection