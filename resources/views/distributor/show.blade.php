@extends('layouts.app')

@section('title', 'Detail Distributor')

@section('content')
<div class="container-fluid">
    <div class="content-header">
        <h4 class="text-center">Detail Distributor</h4>
        <hr>
    </div>

    <div class="back mb-3">
        <a href="{{ route('distributor.index') }}" class="btn btn-danger">Back</a>
    </div>

    <div class="content-body">
        <div class="row">
            <div class="form-group col-12">
                <label>Nama Distributor</label>
                <input type="text" name="nama_distributor" value="{{ $distributor->nama_distributor }}" class="form-control" disabled>
            </div>
        </div>

        <div class="row">
            <div class="form-group col-12">
                <label>Alamat</label>
                <textarea name="alamat" id="alamat" cols="30" rows="5" class="form-control" disabled>{{ $distributor->alamat }}</textarea>
            </div>
        </div>

        <div class="row">
            <div class="form-group col-12">
                <label>Nomor Telepon</label>
                <input type="number" name="telpon" value="{{ $distributor->telpon }}" class="form-control" disabled>
            </div>
        </div>
    </div>
</div>
@endsection
