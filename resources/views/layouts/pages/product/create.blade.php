@extends('layouts.main')


@section('header')
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Tambah Barang</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                    <li class="breadcrumb-item active">Tambah Barang</li>
                </ol>
            </div>
        </div>
    </div>
@endsection
@section('content')
    <div class="row"></div>
    <div class="col-6">
        <div class="card">
            <div class="card-body">
                <form action="/products/create" method="POST">
                    @csrf
                    @method('POST')
                    <div class="mb-3">
                        <label for="name" class="form-label">Nama Barang</label>
                        <input type="text" class="form-control" name="name" id="name">
                    </div>
                    <div class="mb-3">
                        <label for="kode" class="form-label">Kode</label>
                        <input type="text" class="form-control" id="kode" name="kode"></input>
                    </div>
                    <div class="mb-3">
                        <label for="serial_number" class="form-label">Serial Number</label>
                        <input type="text" class="form-control" id="serial_number" name="serial_number"></input>
                    </div>
                    <div class="mb-3">
                        <label for="description" class="form-label">Description</label>
                        <textarea class="form-control" id="description" name="description" rows="3"></textarea>
                    </div>
                    <a href="/products" class="btn btn-outline-primary mr-3" type="submit">Kembali</a>
                    <button class="btn btn-primary" type="submit">Simpan</button>

                </form>
            </div>
        </div>
    </div>
    </div>
@endsection
