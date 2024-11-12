@extends('layouts.main')


@section('header')
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Items</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                    <li class="breadcrumb-item active">Item</li>
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
                        <a href="/items/add" class="btn btn-primary"><i class="fa fa-plus"></i> Tambah Item</a>
                    </div>
                </div>
                <div class="card-body">
                    <table id="example1" class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Nama Item</th>
                                <th>Description</th>
                                <th>#</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($items as $item)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $item->name }} </td>
                                    <td>{{ Str::limit($item->description, 150) }}</td>
                                    <td>
                                        <div class="d-flex justify-content-end">
                                            <form action="/items/delete/{{ $item->id }}" method="POST">
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
                        {{ $items->links() }}
                    </div>
                </div>

            </div>
        </div>
    </div>
@endsection
