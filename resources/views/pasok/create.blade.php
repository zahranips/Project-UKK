@extends('layouts.app')

@section('title', 'Input Pasok')

@section('content')
<div class="container-fluid">
    <div class="content-title">
        <h4 class="text-center">Input Pasok</h4>
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

        <form action="{{ route('pasok.store') }}" method="POST">
        @csrf
            <div class="col">
                <div class="form-group col-4">
                    <label for="id_disributor" class="form-label">Nama Distributor</label>
                    <select name="id_distributor" id="id_distributor" class="form-control">
                        <option selected disabled>-- Pilih Distributor --</option>
                        @foreach (App\Models\Distributor::all() as $distributor)
                            <option value="{{ $distributor->id }}">{{ $distributor->nama_distributor }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="form-group col-4">
                    <label for="id_buku" class="form-label">Judul Buku</label>
                    <select name="id_buku" id="id_buku" class="form-control">
                        <option selected disabled>-- Pilih Judul Buku --</option>
                        @foreach (App\Models\Buku::all() as $buku)
                            <option value="{{ $buku->id }}">{{ $buku->judul }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="form-group col-2">
                    <label for="jumlah" class="form-label">Jumlah</label>
                    <input type="number" name="jumlah" class="form-control" placeholder="Jumlah buku">
                </div>

                <div class="form-group col-2">
                    <label for="tanggal" class="form-label">Tanggal</label>
                    <input type="date" name="tanggal" class="form-control">
                </div>
            </div>
            <div class="row">
                <div class="col-12 m-4">
                    <button type="submit" class="btn btn-success btn-sm">Tambah</button>
                    <button type="reset" class="btn btn-secondary btn-sm">Reset</button>
                    <a href="{{ route('pasok.index') }}" class="btn btn-danger btn-sm">Back</a>
                </div>
            </div>
        </form>
    </div>
</div>
@endsection
