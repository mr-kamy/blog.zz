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
    </div>

@endsection