@extends('layouts.master')
@section('content')
    <div class="row justify-content-center">
        <div class="col-lg-6">
            <div class="card mb-3">
                <div class="row no-gutters">
                    <div class="col-md-4 col-sm-12">
                        <img src="{{ asset('storage/books/images/'.$book->image) }}" alt="" class="img-fluid rounded d-block mx-auto my-auto">
                    </div>
                    <div class="col-md-8 col-sm-12">
                        <div class="card-body text-center">
                            <h3 class="card-title">{{ $book->title }}</h3>
                            <p class="card-title">by <a href="{{ route('single-author', $book->author) }}">{{ $book->author->full_name }}</a> </p>
                            <p class="card-text">{{ count($book->comments) }} comments</p>
                            <a class="btn btn-outline-info" href="#exampleFormControlTextarea1">Write a review</a>
                            {{--<a class="btn btn-primary mt-sm-1" href="">Get Download Access</a>--}}
                            <a class="btn btn-primary mt-sm-1" href="{{ route('download',$book->file_path) }}">Download</a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="jumbotron" style="background-color: #000; color: #fff">
                <h2>Book details</h2>
                <h6>Hardcover, {{ $book->num_of_pages }} pages</h6>
                <h6>Publication date <small class="text-muted text-white-50">{{ $book->pub_date }}</small></h6>
                <h6>ISBN <small class="text-muted text-white-50">{{ $book->ISBN }} ({{ $book->ISBN13 }})</small></h6>
                <h6>Original title <small class="text-muted text-white-50">{{ $book->title }}</small></h6>
                <a class="btn btn-link" data-toggle="collapse" href="#authorInfo" role="button" aria-expanded="false" aria-controls="collapseExample">
                    Author information
                </a>
                <div class="collapse" id="authorInfo">
                    <div class="card card-body bg-dark">
                        <img src="{{ asset('storage/authors/'.$book->author->image) }}" alt="" class="img-thumbnail rounded-circle" width="64" height="64">
                        <a href="{{ route('single-author', $book->author) }}">{{{ $book->author->full_name }}}</a>
                        <p class="">
                            {{ $book->author->description }}
                        </p>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-6">
            <div class="card">
                {{--INTRO--}}
                <div class="card-header font-weight-bold">
                    <p>
                        {{ $book->intro }}
                    </p>
                </div>
                <div class="card-body">
                    <a class="btn btn-link" data-toggle="collapse" href="#book_description" role="button" aria-expanded="false" aria-controls="collapseExample">
                      View  Book description
                    </a>
                    <div class="collapse" id="book_description">
                        <p class="">
                            {{ $book->description }}
                        </p>
                    </div>
                </div>
                <div class="card-footer">
                    {{--<h5>Get a copy</h5>--}}
                    <h5>Download Now</h5>
                    {{--<a href="" class="btn btn-primary">Subscribe now</a>--}}
                    <a href="#reviews" class="btn btn-primary">Reviews</a>

                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-lg-11">
            <div class="card card-body">
                {{--@livewire('comment-section', ['book' => $book])--}}
                @include('partials.comments')
            </div>
        </div>
    </div>
@if($similarBooks->isNotEmpty())
    <div class="row">
        <div class="col-lg-11">
            <div class="card">
                <div class="card-header">
                    <h6 class="font-weight-bolder">Similar books</h6>
                </div>
                <div class="card-body">
                    <div class="row">
                        @foreach($similarBooks as $book)
                            <div class="col-2">
                                <div class="card">
                                    <a href="{{ route('single-book', $book->slug) }}">
                                        <img src="{{ asset('storage/books/images/'.$book->image) }}" alt="{{ $book->title }}"  class="card-img-top" >
                                    </a>

                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
@endif
    @endsection
