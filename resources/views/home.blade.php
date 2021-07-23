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
    @if(session()->has('info'))
        <div class="row justify-content-center">
            <div class="col">
                <div class="alert alert-secondary alert-dismissible fade show" role="alert">
                    {{ session()->get('info') }}
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            </div>
        </div>
    @endif

    @if(auth()->user()->profile !== null)
        <div class="jumbotron">
            <div class="row justify-content-center">
                <div class="col-lg-3">
                    <figure class="figure">
                        <img src="{{ asset('users/'.auth()->user()->profile->image) }}" class="figure-img img-fluid rounded" alt="...">
                        <figcaption class="figure-caption">image.</figcaption>
                    </figure>
                    @if(auth()->user()->comments)
                    <h5 class="text-center">Activity</h5>
                    <ul class="list-group">
                        <li class="list-group-item d-flex justify-content-between align-items-center">
                            Comments
                            <span class="badge badge-primary badge-pill">{{ count(auth()->user()->comments) }}</span>
                        </li>
                        {{--<li class="list-group-item d-flex justify-content-between align-items-center">
                            Books bought
                            <span class="badge badge-primary badge-pill">2</span>
                        </li>--}}
                    </ul>
                    @endif
                    {{--<div class="list-group">
                        <a href="" class="list-group-item">
                            <div class="w-100 d-flex justify-content-between">
                                <h5 class="mb-1">Comments</h5>
                                <small class="text-muted">5</small>
                            </div>
                        </a>
                        <a href="" class="list-group-item">
                            <div class="w-100 d-flex justify-content-between">
                                <h5 class="mb-1">Books bought</h5>
                                <small class="text-muted">3</small>
                            </div>
                        </a>
                        --}}{{--<a href="" class="list-group-item">
                            <div class="w-100 d-flex justify-content-between">
                                <h5 class="mb-1">State</h5>
                                <small class="text-muted">Edo</small>
                            </div>
                        </a>
                        <a href="" class="list-group-item">
                            <div class="w-100 d-flex justify-content-between">
                                <h5 class="mb-1">Country</h5>
                                <small class="text-muted">Nigeria</small>
                            </div>
                        </a>
                        <a href="" class="list-group-item">
                            <div class="w-100 d-flex justify-content-between">
                                <h5 class="mb-1">Zipcode</h5>
                                <small class="text-muted">300281</small>
                            </div>
                        </a>--}}{{--
                    </div>--}}
                </div>
                <div class="col-lg-8">
                    <a href="{{ route('profile.edit', auth()->user()->slug) }}" class="btn btn-warning my-2">
                        <i class="fas fa-edit"></i> edit profile
                    </a>
                    <a href="{{ route('profile.create') }}" class="btn btn-success float-md-right my-2 mx-2">
                        Complete profile setup  <i class="fas fa-angle-double-right"></i>
                    </a>
                    <form>
                        <div class="form-row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>First name</label>
                                    <input  class="form-control" value="{{ auth()->user()->first_name }}" readonly>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Last name</label>
                                    <input  class="form-control" value="{{ auth()->user()->last_name }}" readonly>
                                </div>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>Email</label>
                                    <input  class="form-control" value="{{ auth()->user()->email }}" readonly>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>Mobile Number</label>
                                    <input  class="form-control" value="{{ auth()->user()->profile->mobile_no }}" readonly>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>Zip</label>
                                    <input  class="form-control" value="{{ auth()->user()->profile->zip }}" readonly>
                                </div>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Street</label>
                                    <input  class="form-control" value="{{ auth()->user()->profile->street }}" readonly>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>City</label>
                                    <input  class="form-control" value="{{ auth()->user()->profile->city }}" readonly>
                                </div>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>State</label>
                                    <input  class="form-control" value="{{ auth()->user()->profile->state }}" readonly>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Country</label>
                                    <input  class="form-control" value="{{ auth()->user()->profile->country }}" readonly>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    @else
        <div class="jumbotron">
            <div class="row justify-content-center">
                <div class="col-lg-3">
                    <figure class="figure">
                        <img src="{{ asset('storage/users/avatar.jpg') }}" class="figure-img img-fluid rounded" alt="...">
                        <figcaption class="figure-caption">image.</figcaption>
                    </figure>
                    @if(auth()->user()->comments)
                        <h5 class="text-center">Activity</h5>
                        <ul class="list-group">
                            <li class="list-group-item d-flex justify-content-between align-items-center">
                                Comments
                                <span class="badge badge-primary badge-pill">{{ count(auth()->user()->comments) }}</span>
                            </li>
                            {{--<li class="list-group-item d-flex justify-content-between align-items-center">
                                Books bought
                                <span class="badge badge-primary badge-pill">2</span>
                            </li>--}}
                        </ul>
                    @endif

                </div>
                <div class="col-lg-8">
                    <a href="{{ route('profile.create') }}" class="btn btn-success float-md-right my-2 mx-2">
                        Complete profile setup  <i class="fas fa-angle-double-right"></i>
                    </a>
                    <form>
                        <div class="form-row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>First name</label>
                                    <input  class="form-control" value="{{ auth()->user()->first_name }}" readonly>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Last name</label>
                                    <input  class="form-control" value="{{ auth()->user()->last_name }}" readonly>
                                </div>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>Email</label>
                                    <input  class="form-control" value="{{ auth()->user()->email }}" readonly>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>Mobile Number</label>
                                    <input  class="form-control" value="" readonly>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>Zip</label>
                                    <input  class="form-control" value="" readonly>
                                </div>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Street</label>
                                    <input  class="form-control" value="" readonly>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>City</label>
                                    <input  class="form-control" value="" readonly>
                                </div>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>State</label>
                                    <input  class="form-control" value="" readonly>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Country</label>
                                    <input  class="form-control" value="" readonly>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    @endif
@endsection
