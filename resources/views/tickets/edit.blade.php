@extends('master')
@section('title', 'Edit a ticket')
@section('content')
    <div class="container col-md-8 offset-md-2">
        <form method="post">
            @foreach($errors->all as $error)
                <p class="alert alert-danger">{{ $error }}</p>
            @endforeach

            @if(session('status'))
                <p class="alert alert-success">{{ session('status') }}</p>
            @endif

            <div class="form-group">
                <label for="title" class="bmd-label-floating">Title</label>
                <input type="text" class="form-control" id="title" name="title" value="{{ $ticket->title }}">
            </div>
            <div class="form-group bmd-form-group">
                <label for="content" class="bmd-label-floating">Content</label>
                <input type="text" class="form-control" id="content" name="content" value="{{ $ticket->content }}">
            </div>
            <div class="form-group">
                <label>
                    <input type="checkbox" name="status" {{ $ticket->status ? "" : "checked" }}>
                    Close this ticket?
                </label>
            </div>
                <div class="form-group">
                    <div class="col-lg-10">
                        <button class="btn btn-info">Cancel</button>
                        <button type="submit" class="btn btn-primary">Update</button>
                    </div>
                </div>
            <input type="hidden" name="_token" value="{{ csrf_token() }}">

        </form>
    </div>

@endsection