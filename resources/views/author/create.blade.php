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
        <div class="col-lg-9">
            <div class="card">
                <div class="card-header">
                    <a href="{{ url()->previous() }}" class="btn btn-info">
                        <i class="fas fa-angle-left"></i> go back
                    </a>
                    <a href="{{ route('authors.index') }}" class="btn btn-primary float-right">
                        <i class="fas fa-eye"></i> view authors
                    </a>
                </div>
                <div class="card-body">
                    <form method="post" action="{{ route('authors.store') }}" enctype="multipart/form-data">
                        @csrf
                        <div class="form-row">
                            <div class="col">
                                <div class="form-group">
                                    <label for="">FirstName</label>
                                    <input name="firstName" type="text" class="form-control @error('firstName') is-invalid @enderror"
                                           value="{{ old('firstName') }}" autocomplete="firstName" autofocus placeholder="First name"
                                           required>
                                    @error('firstName')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{$message}}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col">
                                <div class="form-group">
                                    <label for="">LastName</label>
                                    <input name="lastName" type="text" class="form-control @error('lastName') is-invalid @enderror" value="{{ old('lastName') }}" placeholder="Last name" required>
                                    @error('lastName')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="col">
                                <div class="form-group">
                                    <label for="">Gender</label>
                                    <select name="gender" id="" class="form-control">
                                        <option value="male">male</option>
                                        <option value="female">female</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col">
                                <div class="form-group">
                                    <label for="">Mail</label>
                                    <input type="text" name="mail" class="form-control @error('mail') is-invalid @enderror" placeholder="Last name" required value="{{ old('mail') }}">
                                    @error('mail')
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
                                    <label for="">Country</label>
                                    <select name="country"  class="form-control">
                                        @foreach($countries as $country)
                                            <option value="{{ $country }}">{{ $country }}</option>
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
                                <button class="btn btn-success btn-md">
                                    Submit   <i class="fas fa-arrow-circle-right"></i>
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
