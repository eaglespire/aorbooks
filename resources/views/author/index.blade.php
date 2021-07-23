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
            <div class="card">
                <div class="card-header">
                    <a href="{{ url()->previous() }}" class="btn btn-info">
                        <i class="fas fa-angle-left"></i> go back
                    </a>
                    <a href="{{ route('authors.create') }}" class="btn btn-primary float-right">
                        <i class="fas fa-plus"></i> new author
                    </a>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-striped table-dark">
                            <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Name</th>
                                <th scope="col">Country</th>
                                <th scope="col" >Actions</th>
                            </tr>
                            </thead>
                            <tbody>
                            @forelse($authors as $author)
                                <tr>
                                    <th scope="row" class="align-middle">{{ $author->id }}</th>
                                    <td class="align-middle">
                                        <a href="{{ route('authors.show',$author->slug) }}">{{ $author->firstName }} {{ $author->lastName }}</a>
                                    </td>
                                    <td class="align-middle">{{ $author->country }}</td>
                                    <td class="align-middle">
                                        <a href="{{ route('authors.edit', $author->slug) }}" class="btn btn-warning mb-2 mb-sm-0">
                                            <i class="fas fa-edit"></i> edit
                                        </a>
                                        <a href="{{ route('authors.destroy', $author->slug) }}" class="btn btn-danger"
                                           onclick="event.preventDefault(); document.getElementById('remove-author').submit()">
                                            <i class="fas fa-trash-alt"></i> delete
                                        </a>
                                        <form action="{{ route('authors.destroy', $author->slug) }}"
                                              id="remove-author" style="display: none" method="post">
                                            @csrf
                                            @method('delete')
                                        </form>
                                    </td>
                                </tr>
                            @empty
                                <p class="lead">No data to display...</p>
                            @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="card-footer">
                    {{ $authors->links() }}
                </div>
            </div>
        </div>
    </div>
@endsection
