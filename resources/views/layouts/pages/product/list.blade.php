@extends('layouts.main')


@section('header')
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Barang</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                    <li class="breadcrumb-item active">Barang</li>
                </ol>
            </div>
        </div>
    </div>
@endsection
@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <div class="d-flex justify-content-end">
                        <a href="/products/add" class="btn btn-primary"><i class="fa fa-plus"></i> Tambah Barang</a>
                    </div>
                </div>
                <div class="card-body">
                    <table id="example1" class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Kode Barang</th>
                                <th>Nama Barang</th>
                                <th>Description</th>
                                <th>Serial Number</th>
                                <th>#</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($products as $product)
                                <tr>
                                    <td>No</td>
                                    <td>{{ $product->kode }}</td>
                                    <td>{{ $product->name }} </td>
                                    <td>{{ Str::limit($product->description, 150) }}</td>
                                    <td>{{ $product->serial_number }}</td>
                                    <td>
                                        <div class="d-flex justify-content-end">

                                            <a href="/products/{{ $product->id }}" class="btn btn-outline-primary"
                                                class="btn btn-outline-primary">Edit</a>
                                            <form action="/products/delete/{{ $product->id }}" method="POST">
                                                @csrf
                                                @method('DELETE')
                                                <button class="btn btn-danger ml-3">Hapus</button>
                                            </form>
                                        </div>


                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                    <div class="mt-5">
                        {{ $products->links() }}
                    </div>
                </div>

            </div>
        </div>
    </div>
@endsection
