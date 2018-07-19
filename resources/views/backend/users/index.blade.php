@extends('master')
@section('title', 'All users')

@section('content')


    <div class="container col-md-8 offset-md-2">
        <div class="card">
            <div class="card-body">
                <h2 class="card-title">All users</h2>
            </div>

            @if (session('status'))
                <div class="alert alert-success">
                    {{ session('status') }}
                </div>
            @endif

            @if($users->isEmpty())
                <p> There is no users. </p>
            @else
                <table class="table">
                    <thead>
                    <tr>
                        <th scope="col">ID</th>
                        <th scope="col">Name</th>
                        <th scope="col">Email</th>
                        <th scope="col">Role</th>
                        <th scope="col">Joined at</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($users as $user)
                        <tr>
                            <td>{{ $user->id }}</td>
                            <td>
                                <a href="{{ action('Admin\UsersController@edit', $user->id) }}">{{ $user->name }}</a>
                            </td>
                            <td>{{ $user->email }}</td>
                            <td>{{ $user->roles()->pluck('name')->implode(' ') }}</td>
                            <td>{{ $user->created_at }}</td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>

            @endif
        </div>
    </div>



@endsection