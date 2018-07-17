@extends('master')
@section('title', 'Contact')

@section('content')
    <div class="container col-md-8 offset-md-2 card">
        <form method="post">
            @foreach ($errors->all() as $error)
                <p class="alert alert-danger">{{ $error }}</p>
            @endforeach

            @if(session('status'))
                <p class="alert alert-success">{{ session('status') }}</p>
            @endif
            <div class="form-group">
                <label for="title" class="bmd-label-floating">Name</label>
                <input type="text" class="form-control" id="title" name="name">
            </div>
            <div class="form-group bmd-form-group">
                <label for="guard_name" class="bmd-label-floating">Group</label>
                <input type="text" class="form-control" id="content" name="guard_name">
            </div>
            <div class="form-group">
                <button class="btn btn-default">Cancel</button>
                <button type="submit" class="btn btn-primary btn-raised">Submit</button>
            </div>
            <input type="hidden" name="_token" value="{{ csrf_token() }}">
        </form>
    </div>

@endsection