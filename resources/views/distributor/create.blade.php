@extends('layouts.app')

@section('title', 'Input Distributor')

@section('content')
<div class="container-fluid">
    <div class="content-title">
        <h4 class="text-center">Input Distributor</h4>
        <hr>
    </div>

    <div class="content-body">
        @if ($errors->any())
            <div class="alert alert-danger">
                <h4>Error : </h4>
                <ul>
                    @foreach ($errors->all() as $item)
                        <li>{{ $item }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        
        <form action="{{ route('distributor.store') }}" method="POST">
        @csrf
            <div class="row">
                <div class="form-group col-12">
                    <label for="nama_distributor" class="form-label">Nama Distributor</label>
                    <input type="text" name="nama_distributor" class="form-control" placeholder="Nama Distributor">
                </div>
            </div>
            <div class="row">
                <div class="form-group col-12">
                    <label for="alamat" class="form-label">Alamat</label>
                    <textarea name="alamat" id="alamat" cols="30" rows="3" class="form-control" placeholder="Alamat"></textarea>
                </div>
            </div>

            <div class="row">
                <div class="form-group col-12">
                    <label for="telpon" class="form-label">Nomor Telepon</label>
                    <input type="number" name="telpon" class="form-control" placeholder="Nomor Telepon">
                </div>
            </div>

            <div class="row">
                <div class="col-md-12 text-center">
                    <button type="submit" class="btn btn-success btn-sm">Tambah</button>
                    <button type="reset" class="btn btn-secondary btn-sm">Reset</button>
                    <a href="{{ route('distributor.index') }}" class="btn btn-danger btn-sm">Back</a>
                </div>
            </div>
        </form>
    </div>
</div>
@endsection
