@extends('layouts.dashboard')
@section('content')
    <div class="row justify-content-center">
        <div class="col-lg-10">
            <div class="card">
                <div class="card-header">
                    <a href="{{ url()->previous() }}" class="btn btn-info">
                        <i class="fas fa-angle-left"></i> go back
                    </a>
                </div>
                <div class="card-body">
                    <form>
                        <div class="form-row">
                            <div class="col">
                                <div class="form-group">
                                    <label for="">FirstName</label>
                                    <input type="text" class="form-control"
                                           value="{{ $author->firstName }}"  autofocus readonly>
                                </div>
                            </div>
                            <div class="col">
                                <div class="form-group">
                                    <label for="">LastName</label>
                                    <input type="text" class="form-control" value="{{ $author->lastName }}"  readonly>
                                </div>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="col">
                                <div class="form-group">
                                    <label for="">Gender</label>
                                    <select name="gender" id="" class="form-control" readonly="true">
                                        <option value="{{ $author->gender }}">{{ $author->gender }}</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col">
                                <div class="form-group">
                                    <label for="">Mail</label>
                                    <input type="text" class="form-control"  value="{{$author->mail }}" readonly>
                                </div>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="col">
                                <div class="form-group">
                                    <label for="">Country</label>
                                    <select class="form-control" readonly>
                                            <option value="{{ $author->country }}">{{ $author->country }}</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col">
                                <div class="form-group">
                                    <label for="">Image</label>
                                    <p>
                                        <img class="img-fluid rounded-circle" src="{{ asset('storage/authors/'.$author->image) }}" alt="{{ $author->slug }}" width="150">
                                    </p>
                                </div>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="col">
                                <div class="form-group">
                                    <label for="">Description</label>
                                    <textarea class="form-control"  rows="3" readonly>{{ $author->description }}</textarea>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
