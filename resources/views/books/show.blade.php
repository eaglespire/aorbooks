@extends('layouts.dashboard')
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
    <div class="row justify-content-center">
        <div class="col-lg-10">
            <div class="jumbotron text-center">
                <div class="card mb-3">
                    <div class="row no-gutters">
                        <div class="col-md-4">
                            <p class="p-3">
                                <img src="{{ asset('storage/books/images/'.$book->image) }}" alt="{{ $book->title }}" class="img-fluid w-50 rounded">
                            </p>
                        </div>
                        <div class="col-md-8 ">
                            <div class="card-header">
                                <a href="{{ url()->previous() }}" class="btn btn-info">
                                    <i class="fas fa-angle-left"></i> go back
                                </a>
                                <a href="{{ route('books.edit', $book->slug) }}" class="btn btn-warning">
                                    <i class="fas fa-edit"></i> edit this book
                                </a>
                            </div>
                            <div class="card-body">
                                <h2 class="card-text font-weight-bold">
                                    <span>{{ $book->title }}</span>
                                </h2>
                                <h6 class="card-text">A book by <a href="{{ route('authors.show', $book->author->slug) }}">{{ $book->author->full_name }}</a></h6>
                                <div>
                                    <h6 class="font-weight-bolder">Book Introduction</h6>
                                    <p class="card-text font-weight-bold">
                                        {{ $book->intro }}
                                    </p>
                                </div>
                                <hr>
                                <div>
                                    <h6 class="font-weight-bold">Book Description</h6>
                                    <p class="card-text">
                                        {{ $book->description }}
                                    </p>
                                </div>
                                <hr>
                                <div>
                                    <h2 class="font-weight-bold">Other Information</h2>
                                    <h6>Pages <span class="text-muted">{{ $book->num_of_pages }}</span></h6>
                                    <h6>ISBN <span class="text-muted">{{ $book->ISBN }}</span></h6>
                                    <h6>ISBN13 <span class="text-muted">{{ $book->ISBN13 }}</span></h6>
                                    <h6>Publication Date <span class="text-muted">{{ $book->pub_date }}</span></h6>
                                    <h6>Other Authors <span class="text-muted">{{ $book->other_authors }}</span></h6>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
