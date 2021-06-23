@extends('layouts.app')

@section('title', 'Input User')

@section('content')
<div class="container-fluid">
    <div class="content-title">
        <h4 class="text-center">Input User</h4>
        <hr>
    </div>
    <div class="content-body">
        @if ($errors->any())
            <div class="alert alert-danger">
                <h4>Error : </h4>
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <form action="{{ route('user.store') }}" method="POST">
        @csrf
            <div class="row">
                <div class="form-group col-6">
                    <label for="nama" class="form-label">Nama</label>
                    <input type="text" name="nama" class="form-control" placeholder="Nama">
                </div>
                <div class="form-group col-6">
                    <label for="alamat" class="form-label">Alamat</label>
                    <input type="text" name="alamat" class="form-control" placeholder="Alamat">
                </div>
            </div>
            <div class="row">
                <div class="form-group col-6">
                    <label for="telpon" class="form-label">Nomor Telepon</label>
                    <input type="number" name="telpon" class="form-control" placeholder="Nomor Telepon">
                </div>
                <div class="form-group col-6">
                    <label for="status" class="form-label">Status</label>
                    <select name="status" class="form-control">
                        <option selected disabled>-- Pilih Status --</option>
                        <option value="aktif">Aktif</option>
                        <option value="tidak aktif">Tidak Aktif</option>
                    </select>
                </div>
            </div>
            <div class="row">
                <div class="form-group col-4">
                    <label for="username" class="form-label">Username</label>
                    <input type="text" name="username" class="form-control" placeholder="Username">
                </div>
                <div class="form-group col-4">
                    <label for="password" class="form-label">Password</label>
                    <input type="password" name="password" class="form-control" placeholder="Password">
                </div>
                <div class="form-group col-4">
                    <label for="akses" class="form-label">Akses</label>
                    <select name="akses" class="form-control">
                        <option selected disabled>-- Pilih Hak Akses --</option>
                        <option value="admin">Admin</option>
                        <option value="kasir">Kasir</option>
                        <option value="manager">Manager</option>
                    </select>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12 text-center">
                    <button type="submit" class="btn btn-success btn-sm">Tambah</button>
                    <button type="reset" class="btn btn-secondary btn-sm">Reset</button>
                    <a href="{{ route('user.index') }}" class="btn btn-danger btn-sm">Back</a>
                </div>
            </div>
        </form>
    </div>
 </div>
@endsection
