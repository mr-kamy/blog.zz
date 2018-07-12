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
                <a href="#" class="btn btn-danger">Delete</a>
            </div>
        </div>
    </div>

@endsection