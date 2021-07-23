
@extends('layouts.thank-you')
@section('content')
    @if(session()->has('success'))
        <div class="row justify-content-center">
            <div class="col">
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    {{ session()->get('success') }}
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            </div>
        </div>
    @endif
    <div id="thank-you-page" class="py-5">
        <h1 class="h1 font-weight-bold text-primary text-center">Welcome, {{ auth()->user()->full_name }}</h1>
        <h2 class="display-4 font-weight-bold text-white text-center">Thank You for signing up!</h2>
        <div class="text-white text-center">
            <p>We are glad to welcome you to <a class="app bg-primary" href="{{ url('/') }}">{{ config('app.name') }}</a></p>
            <p>Feel free to access all the resources available in this site and also share the link to your friends</p>
            <a href="{{ route('my-books') }}" class="btn btn-primary">Get Started</a>
            <a href="{{ route('privacy-policy') }}" class="btn btn-secondary">Read our privacy policy</a>
        </div>
    </div>
@endsection
