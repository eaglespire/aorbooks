
<!DOCTYPE html>

<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Welcome to {{ config('app.name', 'eaglespire books') }}</title>

    <link rel="shortcut icon" href="{{ asset('dist/img/AdminLTELogo.png') }}" type="image/x-icon">
    <!-- Font Awesome Icons -->
    <link rel="stylesheet" href="{{ asset('fontawesome-free-5.15.2-web/css/all.min.css') }}">
    <!-- Theme style -->
    <link rel="stylesheet" href="{{ asset('css/adminlte.min.css') }}">

    <style>
        @font-face {
            font-family: 'Arno pro subhead';
            src: url("/fonts/ArnoPro-Subhead.otf");
        }
        @font-face {
            font-family: 'Tisa Sans Pro ';
            src: url("/fonts/TisaSansPro-Bold.ttf");
        }
        /*.tisa {
            font-family: 'Tisa Sans Pro';
            font-weight: 500;
            font-style: normal;
        }*/
        /*@font-face {
            font-family: Rbto;
            src: url("/fonts/RobotoCondensed-Regular.ttf");
        }*/
        body{
            background-color: #e5e4d7;
            font-family: "Arno pro subhead";
            /*font-family: "Tisa Sans Pro ";*/
        }
        nav{
            /*font-family: "Arno pro subhead";*/
            font-family: "Tisa Sans Pro ";
        }
    </style>
</head>
<body class="hold-transition sidebar-mini ">
<div class="wrapper">

    <!-- Navbar -->
    <nav class="main-header navbar navbar-expand navbar-white navbar-light">
        <!-- Left navbar links -->
        <ul class="navbar-nav">
            <li class="nav-item">
                <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
            </li>
            <li class="nav-item d-none d-sm-inline-block">
                <a href="/" class="nav-link">Home</a>
            </li>

        </ul>

        <!-- Right navbar links -->
        <ul class="navbar-nav ml-auto">

        </ul>
    </nav>
    <!-- /.navbar -->

    <!-- Main Sidebar Container -->
    <aside class="main-sidebar sidebar-dark-primary elevation-4">
        <!-- Brand Logo -->
        <a href="{{ route('admin') }}" class="brand-link">
            <img src="{{ asset('dist/img/AdminLTELogo.png') }}" alt="{{ config('app.name') }}" class="brand-image img-circle elevation-3"
                 style="opacity: .8">
            <span class="brand-text font-weight-light">{{ config('app.name','EagleSpire Books') }}</span>
        </a>

        <!-- Sidebar -->
        <div class="sidebar">
            <!-- Sidebar user panel (optional) -->
            <div class="user-panel mt-3 pb-3 mb-3 d-flex">
                <div class="image">
                    @if(auth()->user()->profile !== null)
                        <img src="{{ asset('storage/users/'.auth()->user()->profile->image) }}" class="img-circle elevation-2" alt="User Image">
                        @else
                        <img src="{{ asset('dist/img/user2-160x160.jpg') }}" class="img-circle elevation-2" alt="User Image">
                    @endif
                </div>
                <div class="info">
                    <a href="#" class="d-block">{{ auth()->user()->email }}</a>
                </div>
            </div>

            <!-- Sidebar Menu -->
            <nav class="mt-2">
                <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                    <!-- Add icons to the links using the .nav-icon class
                         with font-awesome or any other icon font library -->
                    <li class="nav-item">
                        <a href="{{ route('admin') }}" class="nav-link {{ request()->is('admin/home')  ? 'active' : ''}}">
                            <i class="nav-icon fas fa-tachometer-alt text-info"></i>
                            <p>
                                Dashboard
                            </p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('users.index') }}" class="nav-link {{ request()->is('admin/users') || request()->is('admin/users/*')   ? 'active' : ''}}">
                            <i class="nav-icon fas fa-users text-info"></i>
                            <p>
                                Manage Users
                            </p>
                        </a>
                    </li>
                    {{--<li class="nav-item">
                        <a  href="{{ route('send-newsletter') }}" class="nav-link {{ request()->is('admin/authors') || request()->is('admin/authors/*')   ? 'active' : ''}}">
                            <i class="nav-icon fas fa-users text-info"></i>
                            <p>
                                Newsletters
                            </p>
                        </a>
                    </li>--}}
                    <li class="nav-item">
                        <a href="{{ route('authors.index') }}" class="nav-link {{ request()->is('admin/authors') || request()->is('admin/authors/*')   ? 'active' : ''}}">
                            <i class="nav-icon fas fa-tasks text-info"></i>
                            <p>
                                Manage Authors
                            </p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('categories.index') }}" class="nav-link {{ request()->is('admin/categories') || request()->is('admin/categories/*')   ? 'active' : ''}}">
                            <i class="nav-icon fas fa-list-alt text-info"></i>
                            <p>
                                Manage Categories
                            </p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('books.index') }}" class="nav-link {{ request()->is('admin/books') || request()->is('admin/books/*')   ? 'active' : ''}}">
                            <i class="nav-icon fas fa-book text-info"></i>
                            <p>
                                Manage Books
                            </p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('profile.show', auth()->user()->slug) }}" class=" nav-link {{ request()->is('profile/*')  ? 'active' : ''}}">
                            <i class="nav-icon fas fa-cog text-info"></i>
                            <p>
                                Settings
                            </p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('logout') }}" class=" nav-link" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                            <i class="nav-icon fas fa-power-off text-danger"></i>
                            <p>
                                Logout
                            </p>
                            <form action="{{ route('logout') }}" method="post" id="logout-form">
                                @csrf
                            </form>
                        </a>
                    </li>
                </ul>
            </nav>
            <!-- /.sidebar-menu -->
        </div>
        <!-- /.sidebar -->
    </aside>

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0 text-dark">
                            @if($pageTitle ?? '')
                                {{ $pageTitle}}
                                @else
                                {{__('Welcome')}}
                            @endif
                        </h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="/">Home</a></li>
                            <li class="breadcrumb-item active">
                                @if($pageTitle ?? '')
                                    {{ $pageTitle  }}
                                @else
                                    {{__('Welcome')}}
                                @endif
                            </li>
                        </ol>
                    </div><!-- /.col -->
                </div><!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>
        <!-- /.content-header -->

        <!-- Main content -->
        <div class="content">
            <div class="container-fluid">
                @yield('content')
            </div><!-- /.container-fluid -->
        </div>
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->



    <!-- Main Footer -->
    <footer class="main-footer">
        <!-- To the right -->
        <div class="float-right d-none d-sm-inline">
            Anything you want
        </div>
        <!-- Default to the left -->
        <strong>Copyright &copy; 2021 <a href="https://ogabooks.preww.com">{{ config('app.name','OgaBooks') }}</a>.</strong> All rights reserved.
    </footer>
</div>
<!-- ./wrapper -->

<!-- REQUIRED SCRIPTS -->

<!-- jQuery -->
<script src="{{ asset('js/jquery.min.js') }}"></script>
<!-- Bootstrap 4 -->
<script src="{{ asset('js/bootstrap.bundle.min.js') }}"></script>
<!-- AdminLTE App -->
<script src="{{ asset('js/adminlte.min.js') }}"></script>
</body>
</html>


