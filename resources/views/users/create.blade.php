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
                    <a href="{{ route('users.index') }}" class="btn btn-primary float-right">
                        <i class="fas fa-eye"></i> view users
                    </a>
                </div>
                <div class="card-body">
                    <form method="post" action="{{ route('users.store') }}" enctype="multipart/form-data">
                        @csrf
                        <div class="form-row">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="">First Name</label>
                                    <input name="first_name" type="text" class="form-control @error('first_name') is-invalid @enderror"
                                           value="{{ old('first_name') }}" autocomplete="first_name" autofocus placeholder="First name"
                                           required>
                                    @error('first_name')
                                    <span class="invalid-feedback" role="alert">
                                            <strong>{{$message}}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="">Last Name</label>
                                    <input name="last_name" type="text" class="form-control @error('last_name') is-invalid @enderror"
                                           value="{{ old('last_name') }}" autocomplete="last_name" placeholder="Last name"
                                           required>
                                    @error('last_name')
                                    <span class="invalid-feedback" role="alert">
                                            <strong>{{$message}}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="">Email</label>
                                    <input name="email" type="email" class="form-control @error('email') is-invalid @enderror"
                                           value="{{ old('email') }}" autocomplete="email" placeholder="Email"
                                           required>
                                    @error('email')
                                    <span class="invalid-feedback" role="alert">
                                            <strong>{{$message}}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="">Password</label>
                                    <input name="password" type="password" class="form-control @error('password') is-invalid @enderror"
                                           value="{{ __('password') }}" autocomplete="fpassword" placeholder="Password"
                                           required readonly>
                                    <small class="font-weight-bold">Default password is <i class="text-danger">password</i></small>
                                    @error('password')
                                    <span class="invalid-feedback" role="alert">
                                            <strong>{{$message}}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="">Enter password again</label>
                                    <input name="password_confirmation" type="password" class="form-control"
                                            autocomplete="password" placeholder="type password again" value="{{ __('password') }}"
                                           required readonly>
                                </div>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="col">
                                <div class="form-group">
                                    <label for="">Grant Administrative Rights?</label>
                                    <select name="is_admin" id="" class="form-control">
                                        <option value=0>no</option>
                                        <option value=1>yes</option>
                                    </select>
                                </div>
                            </div>
                        </div>

                        <div class="form-row">
                            <div class="col">
                                <button class="btn btn-success btn-md" type="submit">
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

