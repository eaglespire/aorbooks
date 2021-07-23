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
        <div class="col-lg-12">
            <div class="jumbotron">
                <div class="card">
                    <div class="card-header">
                        <a href="{{ url()->previous() }}" class="btn btn-info">
                            <i class="fas fa-angle-left"></i> go back
                        </a>
                        <a href="{{ route('books.create') }}" class="btn btn-primary float-right">
                            <i class="fas fa-plus"></i> new book
                        </a>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-striped table-hover">
                                <thead>
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">title</th>
                                    <th scope="col">author</th>
                                    {{--<th scope="col">pub date</th>
                                    <th scope="col">pages</th>--}}
                                    <th scope="col" colspan="2">Actions</th>
                                </tr>
                                </thead>
                                <tbody>
                                @forelse($books as $book)
                                    <tr>
                                        {{--<td class="align-middle">
                                            <img src="{{ asset('books/'.$book->image) }}" alt="{{ $book->title }}"
                                                 class="img-thumbnail" width="44">
                                        </td>--}}
                                        <td class="align-middle">{{ $book->id }}</td>
                                        <td class="align-middle">
                                            <a href="{{ route('books.show',$book->slug) }}" class="text-dark">{{ $book->title }}</a>
                                        </td>
                                        <td class="align-middle">
                                            <a href="{{ route('authors.show',$book->author->slug) }}" class="text-dark">{{ $book->author->full_name }}</a>
                                        </td>
                                        {{--<td class="align-middle">{{ $book->pub_date }}</td>
                                        <td class="align-middle">
                                            {{ $book->num_of_pages }}
                                        </td>--}}
                                        <td class="align-middle">
                                            <a href="{{ route('books.edit', $book->slug) }}" class="btn btn-warning mb-2 mb-sm-0">
                                                <i class="fas fa-edit"></i> edit
                                            </a>
                                            <a href="{{ route('books.destroy',$book->slug) }}" class="btn btn-danger "
                                               onclick="event.preventDefault(); document.getElementById('delete-book').submit()">
                                                <i class="fas fa-trash-alt"></i> remove
                                            </a>
                                            <form method="post" action="{{ route('books.destroy',$book->slug) }}" id="delete-book" style="display: none">
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
                </div>
            </div>
        </div>
    </div>
@endsection
