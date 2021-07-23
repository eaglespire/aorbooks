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
                    <a href="{{ route('categories.create') }}" class="btn btn-primary float-right">
                        <i class="fas fa-plus"></i> new category
                    </a>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-striped table-dark">
                            <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Name</th>
                                <th scope="col" >Actions</th>
                            </tr>
                            </thead>
                            <tbody>
                            @forelse($categories as $category)
                                <tr>
                                    <th scope="row" class="align-middle">{{ $category->id }}</th>
                                    <td class="align-middle">
                                        <a href="{{ route('categories.show',$category->slug) }}">{{ $category->name }}</a>
                                    </td>
                                    <td class="align-middle">
                                        <a href="{{ route('categories.edit', $category->slug) }}" class="btn btn-warning mb-2 mb-sm-0">
                                            <i class="fas fa-edit"></i> edit
                                        </a>
                                        <a href="{{ route('categories.destroy', $category->slug) }}" class="btn btn-danger"
                                           onclick="event.preventDefault(); document.getElementById('remove-category').submit()">
                                            <i class="fas fa-trash-alt"></i> delete
                                        </a>
                                        <form action="{{ route('categories.destroy', $category->slug) }}"
                                              id="remove-category" style="display: none" method="post">
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
                    {{ $categories->links() }}
                </div>
            </div>
        </div>
    </div>
@endsection
