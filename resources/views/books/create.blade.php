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
                    <a href="{{ route('books.index') }}" class="btn btn-warning float-right">
                        <i class="fas fa-eye"></i> view books
                    </a>
                </div>
                <form method="post" action="{{ route('books.store') }}" enctype="multipart/form-data">
                    <div class="card-body">
                        @csrf
                        <div class="form-row">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="">Book Title</label>
                                    <input name="title" type="text" class="form-control @error('title') is-invalid @enderror"
                                           value="{{ old('title') }}" autocomplete="title" autofocus placeholder="book title"
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
                                        @foreach($authors as $author)
                                            <option value="{{ $author->id }}">{{ $author->firstName }} {{ $author->lastName }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="">Publication Date</label>
                                    <input name="pub_date" type="text" class="form-control @error('pub_date') is-invalid @enderror" value="{{ old('pub_date') }}" placeholder="publication date" required>
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
                                    <input type="number" name="num_of_pages" class="form-control @error('num_of_pages') is-invalid @enderror" placeholder="number of pages" required value="{{ old('num_of_pages') }}">
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
                                    <input type="text" name="ISBN" class="form-control @error('ISBN') is-invalid @enderror" placeholder="ISBN" required value="{{ __('978-2-1234-5678-2') }}" readonly>
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
                                    <input type="text" name="ISBN13" class="form-control @error('ISBN13') is-invalid @enderror" placeholder="ISBN13" required value="{{ __('978-2-1234-5678-2') }}" readonly>
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
                                    <textarea class="form-control @error('intro') is-invalid @enderror" name="intro" rows="3"></textarea>
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
                                    <textarea class="form-control @error('description') is-invalid @enderror" name="description" rows="3"></textarea>
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
                                    <textarea class="form-control @error('other_authors') is-invalid @enderror" name="other_authors" rows="3"></textarea>
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
                                    <label for="">Category</label>
                                    <select name="category_id" id="" class="form-control">
                                        @foreach($categories as $category)
                                            <option value="{{ $category->id }}">{{ $category->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col">
                                <div class="form-group">
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
                                    <label for="">File</label>
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
                                <button class="btn btn-warning btn-md btn-block" type="submit">
                                    Enter   <i class="fas fa-arrow-circle-right text-white"></i>
                                </button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
                </div>
            </div>
@endsection
