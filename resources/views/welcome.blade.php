@extends('layouts.master')
@section('content')
    <div class="row justify-content-center">
        <div class="col-sm-8">
            <div class="welcome welcome-text text-center p-5">
                <h2 class="font-weight-bolder">Meet your next favorite book</h2>
                <p class="">Find and read more books you'll love. Be part of <a class="welcome-link" href="/">{{ config('app.name') }}</a>,
                    the world's largest community for readers like you.
                </p>
                @guest
                    <a href="{{ route('register') }}" class="btn btn-lg btn-block btn-primary">Sign up with email</a>
                    <small>By creating an account, you agree to the <a class="welcome-link" href="/">{{ config('app.name') }}</a> <a class="welcome-link" href="">Terms of Service</a> and
                        <a class="welcome-link" href="{{ route('privacy-policy') }}">Privacy Policy.</a></small>
                    <p class="font-weight-bold">Already a member? <a class="welcome-link" href="{{ route('login') }}">Sign In</a></p>
                    @else
                    <a href="{{ route('my-books') }}" class="btn btn-lg btn-block btn-primary">Browse our bookstore</a>
                @endguest
            </div>
        </div>
    </div>
@endsection
