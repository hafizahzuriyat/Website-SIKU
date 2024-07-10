<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Sistem Informasi Kerjasama Universitas</title>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">

    <!-- Styles -->
    <style>
    /* Define your sidebar styles here */
    .sidebar {
        width: 250px;
        background-color: #f0f0f0;
        padding: 20px;
        position: fixed;
        left: 0;
        top: 0;
        bottom: 0; /* Adjusted to fill the entire height */
        height: auto; /* Adjusted to fill the entire height */
        overflow-y: auto;
        transition: all 0.3s ease;
        z-index: 1000; /* Ensure sidebar is above other content */
        display: flex;
        flex-direction: column; /* Arrange children in a column */
    }

    /* Adjust main content to accommodate sidebar */
    .main-content {
        margin-left: 250px; /* Adjust this value based on your sidebar width */
        padding: 20px;
        transition: all 0.3s ease;
    }

    /* Style for sidebar links */
    .sidebar a {
        display: block;
        margin-bottom: 20px;
        color: #333;
        text-decoration: none;
        transition: all 0.3s ease;
    }

    .sidebar a:hover {
        color: #000;
    }

    /* Style for login section */
    .login-section {
        margin-top: auto;
        text-align: center;
    }

    ul li.active a {
    background-color: #728FCE; /* Warna latar belakang */
    color: #fff; /* Warna teks */
    border-radius: 5px; /* Bentuk sudut tombol */
    padding: 10px; /* Ukuran padding */
    }

</style>

    <!-- Scripts -->
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
</head>
<body>
    <div id="app">
        <!-- Sidebar -->
        <div class="sidebar" id="sidebar">
            <!-- Sidebar content goes here -->
            <h2 style="text-align: center; margin-bottom: 30px;">
                Menu
            </h2>
            <ul style="list-style-type: none; padding-left: 0;">
                @auth
                    <li class="{{ Request::is('home') ? 'active' : '' }}"><a href="{{ url('/home') }}"><i class="fa fa-tachometer-alt"></i>&nbsp;&nbsp;&nbsp;DASHBOARD</a></li>
                    <li class="{{ Request::is('about-us') ? 'active' : '' }}"><a href="{{ url('/about-us') }}"><i class="fas fa-users"></i>&nbsp;&nbsp;&nbsp;TENTANG KAMI</a></li>
                    <li class="{{ Request::is('daftar-kerjasama') ? 'active' : '' }}"><a href="{{ url('/daftar-kerjasama') }}"><i class="fa fa-list"></i>&nbsp;&nbsp;&nbsp;DAFTAR KERJASAMA</a></li>
                    <li class="{{ Request::is('info') ? 'active' : '' }}"><a href="{{ url('/info') }}"><i class="fas fa-info-circle"></i>&nbsp;&nbsp;&nbsp;INFORMASI</a></li>
                    <li class="{{ Request::is('contact') ? 'active' : '' }}"><a href="{{ url('/contact') }}"><i class="fa fa-address-book"></i>&nbsp;&nbsp;&nbsp;KONTAK</a></li>
                @endauth
            </ul>

            <!-- Login section -->
            <div class="login-section">
                <!-- Authentication Links -->
                @guest
                    @if (Route::has('login'))
                        <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                    @endif

                    @if (Route::has('register'))
                        <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                    @endif
                @else
                    <div class="dropdown">
                        <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                            {{ Auth::user()->name }}
                        </a>

                        <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item" href="{{ route('logout') }}"
                               onclick="event.preventDefault();
                                             document.getElementById('logout-form').submit();">
                                {{ __('Logout') }} <i class="fa fa-sign-out"></i>
                            </a>

                            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                @csrf
                            </form>
                        </div>
                    </div>
                @endguest
            </div>
        </div>

        <!-- Main content -->
        <div class="main-content" id="main-content">
            <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
                <div class="container">
                    <!-- Sidebar toggle button -->
                    <a class="navbar-brand" href="{{ url('/') }}">
                        <img src="logo_new.png" alt="Logo" style="height: 60px; margin-right: 10px;">
                        <span style="font-size: 1.5rem;">SIKU - Sistem Informasi Kerjasama Universitas</span>
                    </a>


                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                        <!-- Left Side Of Navbar -->
                    </div>
                </div>
            </nav>

            <main class="py-4">
                @yield('content')
            </main>
        </div>
    </div>
</body>
</html>
