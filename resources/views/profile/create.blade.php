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

                </div>
                <div class="card-body">
                    <form method="post" action="{{ route('profile.store') }}" enctype="multipart/form-data">
                        @csrf

                        <div class="form-row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="">FirstName</label>
                                    <input name="first_name" type="text" class="form-control"
                                           value="{{ auth()->user()->first_name }}" autocomplete="first_name"  placeholder="First name"
                                           required readonly>
                                    {{--@error('first_name')
                                    <span class="invalid-feedback" role="alert">
                                            <strong>{{$message}}</strong>
                                        </span>
                                    @enderror--}}
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="">Last Name</label>
                                    <input name="last_name" type="text" class="form-control" value="{{ auth()->user()->last_name }}" placeholder="Last name" required readonly>
                                    {{--@error('last_name')
                                    <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror--}}
                                </div>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="">Mobile Number</label>
                                    <input name="mobile_no" type="text" class="form-control @error('mobile_no') is-invalid @enderror"
                                           value="{{ '' }}" autocomplete="mobile_no"  placeholder="Mobile Number"
                                           required autofocus>
                                    @error('mobile_no')
                                    <span class="invalid-feedback" role="alert">
                                            <strong>{{$message}}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="">Zip</label>
                                    <input name="zip" type="text" class="form-control @error('zip') is-invalid @enderror" value="{{ '' }}" placeholder="Zip code" required>
                                    @error('zip')
                                    <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label for="">Street Address</label>
                                    <input name="street" type="text" class="form-control @error('street') is-invalid @enderror" value="{{ '' }}"
                                           autocomplete="mobile_no"  placeholder="address"
                                           required>
                                    @error('street')
                                    <span class="invalid-feedback" role="alert">
                                            <strong>{{$message}}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label for="">City</label>
                                    <input name="city" type="text" class="form-control @error('city') is-invalid @enderror" value="{{ '' }}" placeholder="City" required>
                                    @error('city')
                                    <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label for="">State</label>
                                    <input name="state" type="text" class="form-control @error('state') is-invalid @enderror" value="{{ '' }}" placeholder="State" required>
                                    @error('state')
                                    <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label for="">Country</label>
                                    <input name="country" type="text" class="form-control @error('country') is-invalid @enderror" value="{{ '' }}" placeholder="Country" required>
                                    @error('country')
                                    <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="" class="col-md-6">Upload Profile Pic</label>
                            <input type="file" class="form-control-file col-md-6" name="image">
                        </div>
                        <div class="form-row">
                            <div class="col">
                                <div class="d-flex justify-content-between">
                                    <button class="btn btn-warning btn-md" type="submit">
                                        Update   <i class="fas fa-arrow-circle-right text-white"></i>
                                    </button>
                                    <a href="{{ route('change-password') }}" class="btn btn-secondary">
                                        <i class="fas fa-key"></i> Do you want to change your password?
                                    </a>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
