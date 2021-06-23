<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Custom Fonts -->
    <link href="{{ asset('fontawesome/css/all.css')}}" rel="stylesheet" type="text/css">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body>
<div id="app">
        <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
            <div class="container">
                <a class="navbar-brand " href="{{ route('home') }}">
                    Toko Buku Qu
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse " id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav mr-auto">
                        @if (Auth::user()->akses=='manager')
                            <li class="nav-item">
                                <a href="{{ route('user.index') }}" class="nav-link">Input User</a>
                            </li>
                            <li class="nav-item dropdown">
                                <a id="navbarDropdownLap" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    Laporan
                                </a>
                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownLap">
                                    <a href="#" class="dropdown-item">Cetak Faktur</a>
                                    <a href="#" class="dropdown-item">Semua Penjualan</a>
                                    <a href="#" class="dropdown-item">Penjualan Pertanggal</a>
                                    <a href="#" class="dropdown-item">Semua Data Buku</a>
                                    <a href="#" class="dropdown-item">Filter Penulis Buku</a>
                                    <a href="#" class="dropdown-item">Buku yang sering terjual</a>
                                    <a href="#" class="dropdown-item">Buku yang tidak pernah terjual</a>
                                    <a href="#" class="dropdown-item">Pasok Buku</a>
                                    <a href="#" class="dropdown-item">Filter Pasok Buku</a>
                                </div>
                            </li>
                        @endif

                        @if (Auth::user()->akses=='admin')
                            <li class="nav-item">
                                <a href="{{ route('distributor.index') }}" class="nav-link">Input Distributor</a>
                            </li>
                            <li class="nav-item">
                                <a href="{{ route('buku.index') }}" class="nav-link">Input Buku</a>
                            </li>
                            <li class="nav-item">
                                <a href="{{ route('pasok.index') }}" class="nav-link">Input Pasok</a>
                            </li>
                            <li class="nav-item dropdown">
                                <a id="navbarDropdownLap" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    Laporan
                                </a>
                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownLap">
                                    <a href="#" class="dropdown-item">Semua Data Buku</a>
                                    <a href="#" class="dropdown-item">Filter Penulis Buku</a>
                                    <a href="#" class="dropdown-item">Buku yang sering terjual</a>
                                    <a href="#" class="dropdown-item">Buku yang tidak pernah terjual</a>
                                    <a href="#" class="dropdown-item">Pasok Buku</a>
                                    <a href="#" class="dropdown-item">Filter Pasok Buku</a>
                                </div>
                            </li>
                        @endif

                        @if (Auth::user()->akses=='kasir')
                            <li class="nav-item">
                                <a href="#" class="nav-link">Penjualan</a>
                            </li>
                            <li class="nav-item dropdown">
                                <a id="navbarDropdownLap" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    Laporan
                                </a>
                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownLap">
                                    <a href="#" class="dropdown-item">Cetak Faktur</a>
                                    <a href="#" class="dropdown-item">Semua Penjualan</a>
                                    <a href="#" class="dropdown-item">Penjualan Pertanggal</a>
                                </div>
                            </li>
                        @endif
                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ml-auto">
                        <!-- Authentication Links -->
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->nama }}
                                </a>
                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                    <a href="#" class="dropdown-item">Ubah Password</a>
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>
                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                    </ul>
                </div>
            </div>
        </nav>
        <main class="py-4">
            @yield('content')
        </main>
    </div>
</body>
</html>
