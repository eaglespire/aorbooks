@extends('layouts.master')

@section('content')
    <div class="row justify-content-center">
        <div class="col-lg-8">
            @if (session('msg'))
                <div class="alert alert-danger" role="alert">
                    {{ session('msg') }}
                </div>
            @endif
            <div class="card text-center">
                <h1 class="card-header font-weight-bold hero p-3 mb-3">{{ config('app.name') }}</h1>
                <div class="card-body">
                    <a href="" class="btn btn-block btn-lg fbSignUpBtn">
                        <i class="fab fa-facebook"></i> Continue with Facebook
                    </a>
                    <a href="{{ route('register') }}" class="emailSignUpBtn btn btn-block btn-lg">
                        <i class="fas fa-envelope"></i> Sign up with email
                    </a>
                </div>
                <div class="card-footer text-muted">
                    <small class="h6">By creating an account, you agree to the <a class="welcome-link" href="/">{{ config('app.name') }}</a> <a class="welcome-link" href="">Terms of Service</a> and
                        <a class="welcome-link" href="">Privacy Policy.</a></small>
                    <p class="font-weight-bold">Already a member? <a class="welcome-link" href="{{ route('login') }}">Sign In</a></p>
                </div>
            </div>
        </div>
    </div>
@endsection
