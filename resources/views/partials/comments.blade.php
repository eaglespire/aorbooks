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
{{--<div class="row" style=" font-size: 14px">
    @forelse($book->comments as $comment)
        <div class="col-md-12" id="reviews">
            <div class="d-flex align-items-start jumbotron">
                @if($comment->user->profile)
                    <img src="{{ asset('storage/users/'. $comment->user->profile->image) }}" alt="" class="rounded-circle" width="44" height="44">
                    @else
                    <img src="{{ asset('storage/users/avatar.jpg') }}" alt="" class="rounded-circle" width="44" height="44">
                @endif
                <div class="d-flex flex-column">
                    --}}{{--a href="">{{ auth()->user()->full_name }}</a>--}}{{--
                    <span class="text-muted">Shared publicly- {{ $comment->created_at->diffForHumans() }}</span>
                    <div class="font-weight-bold">
                        {{ $comment->body }}
                    </div>
                </div>

            </div>
        </div>
        @empty
        <p class="lead">No comments yet to display</p>
    @endforelse

    <div class="col-md-12">
        <div class="d-flex align-items-center">
            @if(auth()->user()->profile)
                <img src="{{ asset('storage/users/'.auth()->user()->profile->image) }}" alt="" class="rounded-circle" width="44" height="44">
            @else
                <img src="{{ asset('storage/users/avatar.jpg') }}" alt="" class="rounded-circle" width="44" height="44">
            @endif
            <form action="{{ route('comments.store', $book->slug) }}" class="flex-fill" enctype="multipart/form-data" method="post">
                @csrf
                <div class="form-group">
                    <label for="exampleFormControlTextarea1">Write a review</label>
                    --}}{{--<input type="text" class="form-control py-5 @error('comment') is-invalid @enderror" wire:model="comment">--}}{{--
                    <textarea class="form-control @error('comment') is-invalid @enderror" id="exampleFormControlTextarea1" rows="3" name="comment"></textarea>
                    @error('comment')
                        <span class="invalid-feedback">{{ $message }}</span>
                    @enderror
                </div>
                <button type="submit" class="btn btn-outline-dark">Post comment</button>
            </form>
        </div>
    </div>
</div>--}}

<section id="section">
    <div class="container">
        <div class="row">
            <div class="col-sm-5 col-md-6 col-12 my-4">
                <h1 class="white">Comments</h1>
                @forelse($book->comments as $comment)
                <div id="reviews" class="{{ $comment->id % 2 == 0 ? 'comment' : 'darker' }} mt-4 text-justify float-left">
                    @if($comment->user->profile)
                        <img src="{{ asset('storage/users/'.$comment->user->profile->image) }}" alt="{{ $comment->user->first_name }}" class="rounded-circle" width="40" height="40">
                        @else
                        <img src="{{ asset('storage/users/avatar.jpg') }}" alt="{{ '' }}" class="rounded-circle" width="40" height="40">
                    @endif
                    <h4 class="white">{{ $comment->user ? $comment->user->full_name : 'John Doe' }}</h4> <span>- {{ $comment->created_at->diffForHumans() }}</span> <br>
                    <p>
                        {{ $comment->body }}
                    </p>
                </div>
                    @empty
                <p class="text-white">No comments yet...</p>
                @endforelse
                {{--<div class="text-justify darker mt-4 float-right"> <img src="https://i.imgur.com/CFpa3nK.jpg" alt="" class="rounded-circle" width="40" height="40">
                    <h4 class="white">Rob Simpson</h4> <span>- 20 October, 2018</span> <br>
                    <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Accusamus numquam assumenda hic aliquam vero sequi velit molestias doloremque molestiae dicta?</p>
                </div>--}}
            </div>
            <div class="col-lg-4 col-md-5 col-sm-4 offset-md-1 offset-sm-1 col-12 my-4">
                <form id="algin-form" action="{{ route('comments.store', $book->slug) }}" class="flex-fill" enctype="multipart/form-data" method="post">
                    @csrf
                    <div class="form-group form-group-form" id="form-group">
                        <h4 class="white">Leave a comment</h4>
                        <label for="message">Message</label>
                        <textarea name="comment" id="exampleFormControlTextarea1" msg cols="30" rows="5" class="form-control @error('comment') is-invalid @enderror" style="background-color: black;"></textarea>
                        @error('comment')
                        <span class="invalid-feedback">{{ $message }}</span>
                        @enderror
                    </div>
                    {{--<div class="form-group form-group-form"> <label for="name">Name</label> <input type="text" name="name" id="fullname" class="form-control"> </div>
                    <div class="form-group form-group-form"> <label for="email">Email</label> <input type="text" name="email" id="email" class="form-control"> </div>
                    <div class="form-group form-group-form">
                        <p class="text-secondary">If you have a <a href="#" class="alert-link">gravatar account</a> your address will be used to display your profile picture.</p>
                    </div>
                    <div class="form-inline"> <input type="checkbox" name="check" id="checkbx" class="mr-1"> <label for="subscribe">Subscribe me to the newlettter</label> </div>--}}
                    <div class="form-group form-group-form"> <button type="submit"  class="btn btn-primary">Post Comment</button> </div>
                </form>
            </div>
        </div>
    </div>
</section>
