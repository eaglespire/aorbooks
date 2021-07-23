@extends('layouts.master')
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
    @if(session()->has('error'))
        <div class="row justify-content-center">
            <div class="col">
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    {{ session()->get('error') }}
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            </div>
        </div>
    @endif
    <div class="row">
        <div class="col">
            <h6 class="text-center font-weight-bold">Change Password</h6>
        </div>
    </div>
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card card-body bg-dark">
                <form method="post" action="{{ route('store-changed-password') }}" enctype="multipart/form-data">
                    @csrf
                    <div class="form-row">
                        <div class="col-md-4">
                            <label for="" class="text-white">Current password</label>
                            <input type="password" class="form-control @error('current_password') is-invalid @enderror "
                                   id="exampleInputEmail1" aria-describedby="emailHelp" name="current_password" placeholder="current password">
                            @error('current_password')
                            <span class="invalid-feedback">
                            <strong>
                                {{ $message }}
                            </strong>
                        </span>
                            @enderror
                        </div>
                        <div class="col-md-4">
                            <label for="" class="text-white">New password</label>
                            <input type="password" class="form-control @error('new_password') is-invalid @enderror" id="exampleInputPassword1" name="new_password" placeholder="new password">
                            @error('new_password')
                            <span class="invalid-feedback">
                        <strong>{{ $message }}</strong>
                    </span>
                            @enderror
                        </div>
                        <div class="co-md-4">
                            <label for="" class="text-white">Enter password again</label>
                            <input type="password" class="form-control @error('confirm_password') is-invalid @enderror" id="exampleInputPassword1" name="confirm_password" placeholder="retype password">
                            @error('confirm_password')
                            <span class="invalid-feedback">
                        <strong>{{ $message }}</strong>
                    </span>
                            @enderror
                        </div>
                    </div>
                    <div class="form-row mt-2">
                        <div class="col">
                            <button type="submit" class="btn btn-secondary btn-block">Submit</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
