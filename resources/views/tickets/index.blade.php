@extends('master')
@section('title', 'View all tickets')

@section('content')
    <div class="container col-md-8 offset-md-2">
        <div class="card">
            <div class="card-body">
                <h2 class="card-title">Tickets</h2>
            </div>

            @if (session('status'))
                <div class="alert alert-success">
                    {{ session('status') }}
                </div>
            @endif

            @if($tickets->isEmpty())
                <p> There is no ticket. </p>
            @else
                <table class="table">
                    <thead>
                    <tr>
                        <th scope="col">ID</th>
                        <th scope="col">Title</th>
                        <th scope="col">Status</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($tickets as $ticket)
                        <tr>
                            <td>{{ $ticket->id }}</td>
                            <td>
                                <a href="{{ action('TicketsController@show', $ticket->slug) }}">{{ $ticket->title }}</a>
                            </td>
                            <td>{{ $ticket->status ? 'Pending' : 'Answered' }}</td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>

            @endif
        </div>
    </div>

@endsection