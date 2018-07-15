@extends('master')
@section('title', 'Home')

@section('content')

    <div class="container">
        <div class="row">
            <div class="col-md-12">

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                <h1 class="text-center">Learning Laravel 5</h1>
                <h3 class="text-center">Building Practical Applications</h3>
                <div class="text-center">
                    <img src="http://learninglaravel.net/img/LearningLaravel5_cover0.png" width="302" height="391" alt="">
                </div>
            </div>
        </div>
    </div>


@endsection