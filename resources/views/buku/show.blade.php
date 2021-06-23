@extends('layouts.app')

@section('title', 'Detail Buku')

@section('content')
<div class="container-fluid">
    <div class="content-header">
        <h4 class="text-center">Detail Buku</h4>
        <hr>
    </div>

    <div class="back mb-3">
        <a href="{{ route('buku.index') }}" class="btn btn-danger">Back</a>
    </div>

    <div class="content-body">
        <div class="row">
            <div class="form-group col-4">
                <label>Judul Buku</label>
                <input type="text" name="judul" value="{{ $buku->judul }}" class="form-control" disabled>
            </div>

            <div class="form-group col-4">
                <label>Nomor ISBN</label>
                <input type="number" name="noisbn" value="{{ $buku->noisbn }}" class="form-control" disabled>
            </div>

            <div class="form-group col-4">
                <label>Penulis Buku</label>
                <input type="text" name="penulis" value="{{ $buku->penulis }}" class="form-control" disabled>
            </div>
        </div>

        <div class="row">
            <div class="form-group col-3">
                <label>Penerbit Buku</label>
                <input type="text" name="penerbit" value="{{ $buku->penerbit }}" class="form-control" disabled>
            </div>

            <div class="form-group col-1">
                <label>Tahun</label>
                <input type="number" name="tahun" value="{{ $buku->tahun }}" class="form-control" disabled>
            </div>

            <div class="form-group col-1">
                <label>Stok</label>
                <input type="number" name="stok" value="{{ $buku->stok }}" class="form-control" disabled>
            </div>

            <div class="form-group col-2">
                <label>Harga Pokok</label>
                <input type="number" name="harga_pokok" value="{{ $buku->harga_pokok }}" class="form-control" disabled>
            </div>

            <div class="form-group col-1">
                <label>Harga Jual</label>
                <input type="number" name="harga_jual" value="{{ $buku->harga_jual }}" class="form-control" disabled>
            </div>

            <div class="form-group col-2">
                <label>PPN <i>*dalam persen</i></label>
                <input type="number" name="ppn" value="{{ $buku->ppn }}" class="form-control" disabled>
            </div>

            <div class="form-group col-2">
                <label>Diskon <i>*dalam persen</i></label>
                <input type="number" name="diskon" value="{{ $buku->diskon }}" class="form-control" disabled>
            </div>
        </div>
    </div>
</div>
@endsection
