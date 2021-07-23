<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Welcome to {{ config('app.name', 'eaglespire books') }}</title>
    <link rel="shortcut icon" href="{{ asset('dist/img/AdminLTELogo.png') }}" type="image/x-icon">
    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('fontawesome-free-5.15.2-web/css/all.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/comment.css') }}">
    <link rel="stylesheet" href="{{  asset('css/styles.css') }}">
    <link rel="stylesheet" href="{{ asset('css/footer-css.css') }}">
    {{-- @livewireStyles--}}
    <style>
        @font-face {
            font-family: 'Arno pro subhead';
            src: url("/fonts/ArnoPro-Subhead.otf");
        }
        body{
            font-family: "Arno pro subhead";
        }
    </style>
</head>
<body>
@include('partials.navbar')
{{--<div class="jumbotron jumbotron-fluid" style="background-image: url({{ asset('images/tea-time-snip-bigger.JPG') }});  background-position: center; background-repeat: no-repeat; background-size: cover">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-sm-6">
                <div style="background-color: #DADCEB; border-radius: 10px; color: #046307" >
                    <h1 class="display-4  text-center hero">{{ __('Find and Read Your Favorite Books') }}</h1>
                </div>
            </div>
        </div>
    </div>
</div>--}}
<main>
    @yield('content')
</main>
{{--@livewireScripts--}}

@include('partials.footer')
</body>

<script src="{{ asset('js/jquery.min.js') }}"></script>
<script src="{{ asset('js/bootstrap.bundle.min.js') }}"></script>
</html>
