@extends('master')

@section('title', 'Edit User')

@section('content')
    <div class="container">
        <div class="card">
            <div class="card-header">Edit User</div>
            <div class="card-body">
                <form method="post">
                    @foreach($errors->all() as $error)
                        <div class="alert alert-danger">{{ $error }}</div>
                    @endforeach
                    @if(session('status'))
                        <div class="alert alert-success">{{ session('status') }}</div>
                    @endif
                    {{ csrf_field() }}
                    <div class="form-group">
                        <label for="name" class="bmd-label-floating">Name</label>
                        <input type="text" id="name" name="name" class="form-control" value="{{ $user->name }}">
                    </div>
                    <div class="form-group">
                        <label for="email" class="bmd-label-floating">Email</label>
                        <input type="text" id="email" name="email" class="form-control" value="{{ $user->email }}">
                    </div>
                    <div class="form-group">
                        <label for="role" class="bmd-label-floating">Role</label>
                        <select class="form-control" id="role" name="role">
                            @foreach($roles as $role)
                                <option value="{{ $role->id }}">
                                    {{ $role->name }}
                                </option>
                            @endforeach
                        </select>
                    </div>

                        <div class="form-group">
                            <label for="password" class="col-lg-2 control-label">Password</label>

                            <div class="col-lg-10">
                                <input type="password" class="form-control" name="password">

                            </div>
                        </div>

                    <div class="form-group">
                        <label for="password" class="col-lg-2 control-label">Confirm password</label>

                        <div class="col-lg-10">
                            <input type="password" class="form-control" name="password_confirmation">

                        </div>
                    </div>

                    <div class="form-group">
                        <div class="col-lg-10 col-lg-offset-2">
                            <button type="reset" class="btn btn-default">Cancel</button>

                                <button type="submit" class="btn btn-primary">Submit</button>

                            </button>
                        </div>
                    </div>

                </form>
            </div>
        </div>
    </div>
@endsection