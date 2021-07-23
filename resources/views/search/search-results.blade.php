@extends('layouts.master')

@section('content')
    <div class="row justify-content-center">
        <div class="col-sm-9">
            @include('search.show')
        </div>
    </div>

    <div class="row justify-content-center">
        <div class="col-sm-9">
            @if($results->isNotEmpty())
            <div class="row mt-2">
                <div class="col">
                    <h2 class="font-weight-bolder">Search results...</h2>
                </div>
            </div>
            <div class="row mt-2">
                    @foreach($results as $result)
                        <div class="col-md-3">
                            <div class="card">
                                <img src="{{ asset('storage/books/images/'. $result->image) }}" class="card-img-top" alt="{{ $result->title }}">
                                <div class="card-body">
                                    <h5 class="card-title">
                                        <a href="{{ route('single-book', $result->slug) }}">{{ $result->title }}</a>
                                    </h5>
                                    <p class="card-text">
                                        {{ Str::of($result->intro)->limit(20) }}
                                    </p>
                                </div>
                            </div>
                        </div>
                    @endforeach
                @else
                    <div>
                        <h2>No book found</h2>
                    </div>
                @endif
            </div>

        </div>
    </div>
@endsection


