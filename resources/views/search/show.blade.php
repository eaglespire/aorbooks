<form method="get" action="{{ route('search') }}">
    @csrf
    <div class="form-group row">
        <input class="form-control col-9" type="search" placeholder="Search" aria-label="Search" name="search">
        <button class="btn btn-outline-success  col-2 ml-2" type="submit">Search</button>
    </div>
</form>
