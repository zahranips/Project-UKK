@extends('layouts.app')

@section('title', 'Edit User')

@section('content')
<div class="container-fluid">
    <div class="content-title">
        <h4 class="text-center">Edit User</h4>
        <hr>
    </div>
    <div class="content-body">
        <form action="{{ route('user.update', $users->id) }}" method="POST">
        @csrf
        @method('PUT')
            <div class="row">
                <div class="form-group col-6">
                    <label for="nama" class="form-label">Nama</label>
                    <input type="text" name="nama" value="{{ $users->nama }}" class="form-control" placeholder="Nama">
                </div>
                <div class="form-group col-6">
                    <label for="alamat" class="form-label">Alamat</label>
                    <input type="text" name="alamat" value="{{ $users->alamat }}" class="form-control" placeholder="Alamat">
                </div>
            </div>s
            <div class="row">
                <div class="form-group col-6">
                    <label for="telpon" class="form-label">Nomor Telepon</label>
                    <input type="number" name="telpon" value="{{ $users->telpon }}" class="form-control" placeholder="Nomor Telepon">
                </div>
                <div class="form-group col-6">
                    <label for="status" class="form-label">Status</label>
                    <select name="status" class="form-control" required>
                        <option selected disabled>-- Pilih Status --</option>
                        <option value="aktif" @if ($users->status == 'aktif') selected @endif>Aktif</option>
                        <option value="tidak aktif" @if ($users->status == 'tidak aktif') selected @endif>Tidak Aktif</option>
                    </select>
                </div>
            </div>
            <div class="row">
                <div class="form-group col-6">
                    <label for="username" class="form-label">Username</label>
                    <input type="text" name="username" value="{{ $users->username }}" class="form-control" placeholder="Username">
                </div>
                <div class="form-group col-6">
                    <label for="akses" class="form-label" required>Akses</label>
                    <select name="akses" class="form-control">
                        <option selected disabled>-- Pilih Hak Akses --</option>
                        <option value="admin" @if ($users->akses == 'admin') selected @endif>Admin</option>
                        <option value="kasir" @if ($users->akses == 'kasir') selected @endif>Kasir</option>
                        <option value="manager" @if ($users->akses == 'manager') selected @endif>Manager</option>
                    </select>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12 text-center">
                    <button type="submit" class="btn btn-warning btn-sm">Edit</button>
                    <a href="{{ route('user.index') }}" class="btn btn-danger btn-sm">Back</a>
                </div>
            </div>
        </form>
    </div>
</div>
@endsection
