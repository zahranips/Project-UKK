@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body text-center">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    @if (Auth::user()->akses=='admin')
                        {{ __('Selamat Datang Admin!') }}
                    @endif
                    @if (Auth::user()->akses=='manager')
                        {{ __('Selamat Datang Manager!') }}
                    @endif
                    @if (Auth::user()->akses=='kasir')
                        {{ __('Selamat Datang Kasir!') }}
                    @endif
                </div>
                <div class="panel panel-default" align="center">
                    <div class="panel-heading">
                        <div class="panel-title">
                            <div class="logo-beranda"> <img class="img-responsive" src="{{ ('images/logo.jpg') }}" width="200"> </div>
                                <br>
                                <h2>Toko Buku Qu</h2>
                                <h3>Jl.Raya Wangun</h3>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-12 text-center">
                    <p>Copyright 2021 <a href="#"></a>. Created by <a href="#">Zahrani Putri Solehah</a></p>
                </div>
            </div>
            </div>
        </div>
    </div>
</div>
@endsection
