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
            <div class="card bg-dark">
                <div class="card-header bg-dark">
                    <a href="{{ url()->previous() }}" class="btn btn-info">
                        <i class="fas fa-angle-left"></i> go back
                    </a>
                    <a href="{{ route('books.index') }}" class="btn btn-warning float-right">
                        <i class="fas fa-eye"></i> view books
                    </a>
                </div>
                <form method="post" action="{{ route('books.update', $book->slug) }}" enctype="multipart/form-data">
                    <div class="card-body">
                        @csrf
                        @method('put')
                        <div class="form-row">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="">Book Title</label>
                                    <input name="title" type="text" class="form-control @error('title') is-invalid @enderror"
                                           value="{{ $book->title }}" autocomplete="title" autofocus placeholder="book title"
                                           required>
                                    @error('title')
                                    <span class="invalid-feedback" role="alert">
                                            <strong>{{$message}}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="">Book Author</label>
                                    <select name="author_id"  class="form-control">
                                        <option selected value="{{ $book->author_id }}">{{ $book->author->full_name }}</option>
                                        @foreach($authors as $author)
                                            <option value="{{ $author->id }}">{{ $author->firstName }} {{ $author->lastName }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="">Publication Date</label>
                                    <input name="pub_date" type="text" class="form-control @error('pub_date') is-invalid @enderror" value="{{ $book->pub_date }}" placeholder="publication date" required>
                                    @error('pub_date')
                                    <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="">Pages</label>
                                    <input type="number" name="num_of_pages" class="form-control @error('num_of_pages') is-invalid @enderror" placeholder="number of pages" required value="{{ $book->num_of_pages }}">
                                    @error('num_of_pages')
                                    <span class="invalid-feedback">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="">ISBN</label>
                                    <input type="text" name="ISBN" class="form-control @error('ISBN') is-invalid @enderror" placeholder="ISBN" required value="{{ $book->ISBN }}">
                                    @error('ISBN')
                                    <span class="invalid-feedback">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="">ISBN13</label>
                                    <input type="text" name="ISBN13" class="form-control @error('ISBN13') is-invalid @enderror" placeholder="ISBN13" required value="{{ $book->ISBN13 }}">
                                    @error('ISBN13')
                                    <span class="invalid-feedback">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="col">
                                <div class="form-group">
                                    <label for="">Introduction</label>
                                    <textarea class="form-control @error('intro') is-invalid @enderror" name="intro" rows="3">{{ $book->intro }}</textarea>
                                    @error('intro')
                                    <span class="invalid-feedback" role="alert">
                                            {{ $message }}
                                        </span>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="col">
                                <div class="form-group">
                                    <label for="">Description</label>
                                    <textarea class="form-control @error('description') is-invalid @enderror" name="description" rows="3">{{ $book->description }}</textarea>
                                    @error('description')
                                    <span class="invalid-feedback" role="alert">
                                            {{ $message }}
                                        </span>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="col">
                                <div class="form-group">
                                    <label for="">Co-Authors(optional)</label>
                                    <textarea class="form-control @error('other_authors') is-invalid @enderror" name="other_authors" rows="3">{{ $book->other_authors }}</textarea>
                                    @error('other_authors')
                                    <span class="invalid-feedback" role="alert">
                                            {{ $message }}
                                        </span>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="col">
                                <div class="form-group">
                                    <p><img src="{{ asset('books/images/'.$book->image) }}" alt="{{ $book->title }}"
                                            class="img-thumbnail" width="100"></p>
                                    <label for="">Image</label>
                                    <input name="image" type="file" class="form-control-file @error('image') is-invalid @enderror" value="{{ old('image') }}">
                                    @error('image')
                                    <span class="invalid-feedback">
                                            {{ $message }}
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col">
                                <div class="form-group">
                                    <p>{{ $book->file_path }}</p>
                                    <label for="">File Path</label>
                                    <input name="file_path" type="file" class="form-control-file @error('file_path') is-invalid @enderror" value="{{ old('file_path') }}">
                                    @error('file_path')
                                    <span class="invalid-feedback">
                                            {{ $message }}
                                        </span>
                                    @enderror
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card-footer bg-dark">
                        <div class="form-row">
                            <div class="col">
                                <button class="btn btn-secondary btn-md btn-block" type="submit">
                                    Update   <i class="fas fa-arrow-circle-right text-white"></i>
                                </button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
