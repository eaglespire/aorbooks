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
                    <form method="post" action="{{ route('users.update', $user->slug) }}" enctype="multipart/form-data">
                        @csrf
                        @method('put')
                        <div class="form-row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="">First Name</label>
                                    <input name="first_name" type="text" class="form-control @error('first_name') is-invalid @enderror"
                                           value="{{ $user->first_name }}" autocomplete="first_name" autofocus placeholder="First name"
                                           required>
                                    @error('first_name')
                                    <span class="invalid-feedback" role="alert">
                                            <strong>{{$message}}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="">Last Name</label>
                                    <input name="last_name" type="text" class="form-control @error('last_name') is-invalid @enderror"
                                           value="{{ $user->last_name }}" autocomplete="last_name" placeholder="Last name"
                                           required>
                                    @error('last_name')
                                    <span class="invalid-feedback" role="alert">
                                            <strong>{{$message}}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            {{--<div class="col-md-4">
                                <div class="form-group">
                                    <label for="">Email</label>
                                    <input name="email" type="email" class="form-control @error('email') is-invalid @enderror"
                                           value="{{ $user->email }}" autocomplete="email" placeholder="Email"
                                           required readonly>
                                    @error('email')
                                    <span class="invalid-feedback" role="alert">
                                            <strong>{{$message}}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>--}}
                        </div>
                        {{--<div class="form-row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="">Password</label>
                                    <input name="password" type="password" class="form-control @error('password') is-invalid @enderror"
                                           value="{{ __('password') }}" autocomplete="password" placeholder="Password"
                                           required>
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
                                    <input name="password_confirmation" value="{{ __('password') }}" type="password" class="form-control"
                                           autocomplete="password" placeholder="type password again"
                                           required>
                                </div>
                            </div>
                        </div>--}}
                        <div class="form-row">
                            <div class="col">
                                <div class="form-group">
                                    <label for="">Grant Administrative Rights?</label>
                                    <select name="is_admin" id="" class="form-control">
                                        <option value=0 @if($user->is_admin == 0) selected @endif>no</option>
                                        <option value=1 @if($user->is_admin == 1) selected @endif>yes</option>
                                    </select>
                                </div>
                            </div>
                        </div>

                        <div class="form-row">
                            <div class="col">
                                <button class="btn btn-secondary btn-sm" type="submit">
                                    Update   <i class="fas fa-arrow-circle-right"></i>
                                </button>
                                <button class="btn btn-warning btn-sm" type="button">
                                    reset   <i class="fas fa-arrow-circle-right"></i>
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection

