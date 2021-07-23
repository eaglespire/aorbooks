<nav class="navbar navbar-expand-md navbar-dark p-4" >
    <a class="navbar-brand" href="#">{{ config('app.name') }}</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav mr-auto ">
            <li class="nav-item {{ request()->is('/') ? 'active' : '' }}">
                <a class="nav-link" href="{{ url('/') }}">Home <span class="sr-only">(current)</span></a>
            </li>
            <li class="nav-item {{ request()->is('/books') ? 'active' : '' }}">
                <a class="nav-link" href="{{ route('my-books') }}">My Books</a>
            </li>
            {{--<li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    Browse
                </a>
                <div class="dropdown-menu bg-primary " aria-labelledby="navbarDropdown">
                    <a class="dropdown-item text-white" href="#">African</a>
                    <a class="dropdown-item text-white"  href="#">American</a>
                    <a class="dropdown-item text-white" href="#">Europe</a>
                </div>
            </li>--}}
        </ul>
        <ul class="navbar-nav ml-auto">
            @guest
                <li class="nav-item {{ request()->is('login') ? 'active' : ''}}">
                    <a href="{{ route('login') }}" class="text-white nav-link">Login</a>
                </li>
                @if(Route::has('register'))
                    <li class="nav-item {{ request()->is('register') ? 'active' : '' }}">
                        <a href="{{ route('register') }}" class="text-white  nav-link" >Register</a>
                    </li>
                @endif
            @else
                <li class="nav-item dropdown">
                    <a class="nav-link {{ request()->is('home') ? 'active' : '' }} dropdown-toggle" href="{{ route('home') }}" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        {{ auth()->user()->email }}
                    </a>
                    <div class="dropdown-menu dropdown-menu-lg-left bg-primary " aria-labelledby="navbarDropdown">
                        <a class="dropdown-item text-white"  href="{{ auth()->user()->is_admin == 1 ? route('admin') : route('home')}}">Profile</a>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item text-white" href="{{ route('logout') }}"
                            onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                            {{ __('Logout') }}
                        </a>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                            @csrf
                        </form>
                    </div>

                </li>
            @endguest
        </ul>
    </div>
</nav>
