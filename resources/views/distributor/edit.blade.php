@extends('layouts.app')

@section('title', 'Edit Distributor')

@section('content')
<div class="container-fluid">
    <div class="content-title">
        <h4 class="text-center">Edit Distributor</h4>
        <hr>
    </div>
    <div class="content-body">
        <form action="{{ route('distributor.update', $distributor->id) }}" method="POST">
            @csrf
            @method('PUT')
                <div class="row">
                    <div class="form-group col-12">
                        <label for="nama_distributor" class="form-label">Nama Distributor</label>
                        <input type="text" name="nama_distributor" value="{{ $distributor->nama_distributor }}" class="form-control" placeholder="Nama Distributor">
                    </div>
                </div>
                <div class="row">
                    <div class="form-group col-12">
                        <label for="alamat" class="form-label">Alamat</label>
                        <textarea name="alamat" id="alamat" cols="30" rows="5" class="form-control" placeholder="Alamat">{{ $distributor->alamat }}</textarea>
                    </div>
                </div>
                <div class="row">
                    <div class="form-group col-12">
                        <label for="telpon" class="form-label">Nomor Telepon</label>
                        <input type="number" name="telpon" value="{{ $distributor->telpon }}" class="form-control">
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12 text-center">
                        <button type="submit" class="btn btn-warning btn-sm">Edit</button>
                        <a href="{{ route('distributor.index') }}" class="btn btn-danger btn-sm">Back</a>
                    </div>
                </div>
        </form>
    </div>
</div>
@endsection
