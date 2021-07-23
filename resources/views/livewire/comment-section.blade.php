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
<div class="row">

    <div class="col-md-12">

        <div class="d-flex align-items-start jumbotron">
            <img src="{{ asset('images/1625443115475.jpg') }}" alt="" class="rounded-circle" width="44" height="44">
           <div class="d-flex flex-column">
                <{{--a href="">{{ auth()->user()->full_name }}</a>--}}
                <span class="text-muted">Shared publicly- Jan 2021</span>
                <div class="font-weight-bold">
                    Lorem ipsum dolor sit amet, consectetur adipisicing elit. Atque deleniti ducimus earum eligendi fug
                    a in nostrum pariatur quibusdam quo reiciendis.
                </div>
            </div>

        </div>
    </div>

    <div class="col-md-12">
        <div class="d-flex align-items-center">
            @if(auth()->user()->profile)
                <img src="{{ asset('users/'.auth()->user()->profile->image) }}" alt="" class="rounded-circle" width="44" height="44">
            @else
                <img src="{{ asset('users/avatar.jpg') }}" alt="" class="rounded-circle" width="44" height="44">
            @endif
            <form action="" class="flex-fill">
                <div class="form-group">
                    <label for="exampleFormControlTextarea1">Write a review</label>
                    {{--<input type="text" class="form-control py-5 @error('comment') is-invalid @enderror" wire:model="comment">--}}
                    <textarea class="form-control @error('comment') is-invalid @enderror" id="exampleFormControlTextarea1" rows="3" wire:model="comment"></textarea>
                    @error('comment')
                        <span class="invalid-feedback">{{ $message }}</span>
                    @enderror
                </div>
                <button type="submit" class="btn btn-outline-dark" wire:click.prevent="addComment" >Post comment</button>
            </form>
        </div>
    </div>
</div>
