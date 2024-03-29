@extends('layouts.master')
@section('content')
    <div class="row justify-content-center rbto">
        <div class="col-md-12">
            <div class="row justify-content-center my-2">
                <div class="col">
                    <div class="jumbotron bg-dark">
                        <a href="{{ url()->previous() }}" class="btn btn-primary mb-1">
                            <i class="fas fa-arrow-left"></i> Back
                        </a>
                        {{--<div class="card mb-3 bg-dark text-white py-2">
                            <div class="row no-gutters">
                                <div class="col-md-3">
                                    <img src="{{ asset('storage/authors/'.$author->image) }}" alt="..." class="rounded d-block mx-auto my-auto">
                                </div>
                                <div class="col-md-9">
                                    <div class="card-body text-md-left text-center overflow-hidden">
                                        <h5 class="card-title font-weight-bold">{{ $author->full_name }}</h5>
                                        <p class="card-text">{{ $author->description }}</p>
                                    </div>
                                </div>
                            </div>
                        </div>--}}
                        <div class="row py-5 px-4">
                            <div class="col-md-12 mx-auto">
                                <!-- Profile widget -->
                                <div class="bg-white shadow rounded overflow-hidden">
                                    <div class="px-4 pt-0 pb-4 cover">
                                        <div class="media align-items-end profile-head">
                                            <div class="profile mr-3"><img src="{{ asset('storage/authors/'.$author->image) }}" alt="..." width="130" class="rounded mb-2 img-thumbnail"></div>
                                            <div class="media-body mb-5 text-white">
                                                <h4 class="mt-0 mb-0">{{ $author->full_name }}</h4>
                                                <p class="small mb-4"> <i class="fas fa-map-marker-alt mr-2"></i>{{ $author->country }}</p>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="px-4 py-5 mt-3">
                                        <h5 class="mb-0">About</h5>
                                        <div class="p-4 rounded shadow-sm bg-light">
                                            <p>{{ $author->description }}</p>
                                        </div>
                                    </div>
                                 {{--   <div class="py-4 px-4">
                                        <div class="d-flex align-items-center justify-content-between mb-3">
                                            <h5 class="mb-0">Recent photos</h5><a href="#" class="btn btn-link text-muted">Show all</a>
                                        </div>
                                        <div class="row">
                                            <div class="col-lg-6 mb-2 pr-lg-1"><img src="https://images.unsplash.com/photo-1469594292607-7bd90f8d3ba4?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=750&q=80" alt="" class="img-fluid rounded shadow-sm"></div>
                                            <div class="col-lg-6 mb-2 pl-lg-1"><img src="https://images.unsplash.com/photo-1493571716545-b559a19edd14?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=750&q=80" alt="" class="img-fluid rounded shadow-sm"></div>
                                            <div class="col-lg-6 pr-lg-1 mb-2"><img src="https://images.unsplash.com/photo-1453791052107-5c843da62d97?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=1350&q=80" alt="" class="img-fluid rounded shadow-sm"></div>
                                            <div class="col-lg-6 pl-lg-1"><img src="https://images.unsplash.com/photo-1475724017904-b712052c192a?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=750&q=80" alt="" class="img-fluid rounded shadow-sm"></div>
                                        </div>
                                    </div>--}}
                                </div>
                            </div>
                        </div>
                        <div class="card bg-dark text-white">
                            <div class="card-header text-center font-weight-bolder">
                                Books by {{ $author->full_name }}
                            </div>
                            <div class="card-body">
                                <div class="row">
                                    @forelse($author->books as $book)
                                        <div class="col-md-3">
                                            <a href="{{ route('single-book', $book->slug) }}">
                                                <img src="{{ asset('storage/books/images/'.$book->image) }}" alt="{{ $book->title }}"  class="card-img-top" >
                                            </a>
                                        </div>
                                        @empty
                                        <h2>loading...</h2>
                                    @endforelse
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
