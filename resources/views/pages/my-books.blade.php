@extends('layouts.master')
@section('content')
    <div class="row justify-content-center rbto">
        <div class="col-md-10">
            {{--<form action="{{ route('search') }}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="input-group mb-3">
                    <div class="input-group-prepend">
                        <span class="input-group-text">Search</span>
                    </div>
                    <input type="text" class="form-control" aria-label="enter search query">
                    <div class="input-group-append">
                        <input type="submit" value="Enter" class="btn btn-primary input-group-text">
                    </div>
                </div>
            </form>--}}
            @include('search.show')
        </div>
    </div>

    {{--<div class="row justify-content-center rbto">
        <div class="col-md-10">
            <ul class="nav nav-pills">
                <li class="nav-item">
                    <a class="nav-link active" href="#">Active</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Link</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Link</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link disabled" href="#" tabindex="-1" aria-disabled="true">Disabled</a>
                </li>
            </ul>
        </div>
    </div>--}}

    <div class="row justify-content-center rbto">
        <div class="col-md-10">
            <div class="row justify-content-center my-2">
                <div class="col">
                    <h2 class="font-weight-bold">POPULAR BOOKS</h2>
                </div>
            </div>
            <div class="row no-gutters">
                {{--<div class="col-2">
                    <a href="{{ route('single-book') }}">
                        <img src="{{ asset('images/1625443115434.jpg') }}" alt="" class="img-fluid rounded">
                    </a>
                </div>
                <div class="col-2">
                    <a href="">
                        <img src="{{ asset('images/1625443115438.jpg') }}" alt="" class="img-fluid rounded">
                    </a>
                </div>
                <div class="col-2">
                    <a href="">
                        <img src="{{ asset('images/1625443115442.jpg') }}" alt="" class="img-fluid">
                    </a>
                </div>
                <div class="col-2">
                    <a href="">
                        <img src="{{ asset('images/1625443115446.png') }}" alt="" class="img-fluid">
                    </a>
                </div>
                <div class="col-2">
                    <a href="">
                        <img src="{{ asset('images/1625443115450.jpg') }}" alt="" class="img-fluid">
                    </a>
                </div>
                <div class="col-2">
                    <a href="">
                        <img src="{{ asset('images/1625443115453.jpg') }}" alt="" class="img-fluid">
                    </a>
                </div>
                <div class="col-2">
                    <a href="">
                        <img src="{{ asset('images/1625443115457.jpg') }}" alt="" class="img-fluid">
                    </a>
                </div>
                <div class="col-2">
                    <a href="">
                        <img src="{{ asset('images/1625443115460.jpg') }}" alt="" class="img-fluid">
                    </a>
                </div>
                <div class="col-2">
                    <a href="">
                        <img src="{{ asset('images/1625443115464.png') }}" alt="" class="img-fluid">
                    </a>
                </div>
                <div class="col-2">
                    <a href="">
                        <img src="{{ asset('images/1625443115468.jpg') }}" alt="" class="img-fluid">
                    </a>
                </div>
                <div class="col-2">
                    <a href="">
                        <img src="{{ asset('images/1625443115471.jpg') }}" alt="" class="img-fluid">
                    </a>
                </div>
                <div class="col-2">
                    <a href="">
                        <img src="{{ asset('images/1625443115475.jpg') }}" alt="" class="img-fluid">
                    </a>
                </div>--}}

                @forelse($books as $book)
                    <div class="col-2">
                        {{--<a href="{{ route('single-book', $book->slug) }}">
                            <img src="{{ asset('storage/books/images/'.$book->image) }}" alt="{{ $book->title }}" class="img-fluid pr-1 rounded" id="img-fluid">
                        </a>--}}
                        <div class="card">
                            <a href="{{ route('single-book', $book->slug) }}">
                                <img src="{{ asset('storage/books/images/'.$book->image) }}" alt="{{ $book->title }}"  class="card-img-top" >
                            </a>

                        </div>
                    </div>
                    @empty
                    <h4>Loading...</h4>
                @endforelse
            </div>
        </div>
    </div>
    @endsection
