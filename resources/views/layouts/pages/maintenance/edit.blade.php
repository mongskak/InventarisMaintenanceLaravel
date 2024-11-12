@extends('layouts.main')


@section('header')
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Tambah Maintenance</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                    <li class="breadcrumb-item active">Tambah Maintenance</li>
                </ol>
            </div>
        </div>
    </div>
@endsection
@section('content')
    @if (session('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ session('success') }}
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    @endif
    <div class="row">
        <div class="col-6">
            <div class="card">
                <div class="card-body">
                    <form action="/maintenances/edit/{{ $maintenanceById->id }}" method="POST">
                        @csrf
                        @method('PUT')

                        <div class="mb-3">
                            <label for="name" class="form-label">Nama Barang</label>

                            <select name="product_id" class="form-control" value={{ $maintenanceById->product_id }}>
                                @foreach ($products as $product)
                                    <option value="{{ $product->id }}"
                                        {{ $product->id == $maintenanceById->product_id ? 'selected' : '' }}>
                                        {{ $product->name }}</option>
                                @endforeach
                            </select>

                        </div>
                        <div class="mb-3">
                            <label for="reason" class="form-label">Reason</label>
                            <textarea type="text" class="form-control" id="reason" name="reason" rows="3">{{ $maintenanceById->reason }}</textarea>
                        </div>
                        <div class="row">
                            <div class="col-6">

                                <div class="mb-3">
                                    <label for="start_date" class="form-label">Start Date</label>
                                    <input type="date" class="form-control" id="start_date" name="start_date"
                                        value="{{ $maintenanceById->start_date }}"></input>
                                </div>
                                <div class="mb-3">
                                    <label for="description" class="form-label">Status</label>
                                    <select name="status" class="form-control">
                                        <option value="Pending"
                                            {{ $maintenanceById->status == 'Pending' ? 'selected' : '' }}>Pending
                                        </option>
                                        <option value="OnProgress"
                                            {{ $maintenanceById->status == 'OnProgress' ? 'selected' : '' }}>
                                            On
                                            Progress</option>
                                        <option value="Solved"
                                            {{ $maintenanceById->status == 'Solved' ? 'selected' : '' }}>
                                            Solved
                                        </option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="mb-3">
                                    <label for="end_date" class="form-label">End Date</label>
                                    <input type="date" class="form-control" id="end_date" name="end_date"
                                        value="{{ $maintenanceById->end_date }}"></input>
                                </div>

                                <div class="mb-3">
                                    <label for="description" class="form-label">Priority</label>
                                    <select name="priority" class="form-control">
                                        <option value="Low" {{ $maintenanceById->priority == 'Low' ? 'selected' : '' }}>
                                            Low</option>
                                        <option value="Medium"
                                            {{ $maintenanceById->priority == 'Medium' ? 'selected' : '' }}>Medium
                                        </option>
                                        <option value="High"
                                            {{ $maintenanceById->priority == 'High' ? 'selected' : '' }}>
                                            High
                                        </option>


                                    </select>

                                </div>
                            </div>
                        </div>

                        <a href="/maintenances" class="btn btn-outline-primary mr-3" type="submit">Kembali</a>
                        <button class="btn btn-primary" type="submit">Update</button>
                </div>


                </form>
            </div>
        </div>
        <div class="col-6">
            <div class="card">
                <div class="card-body">

                    <form action="/maintenanceitem/create" method="POST">
                        @csrf
                        @method('POST')

                        <div class="mb-3">
                            <label for="name" class="form-label">Pilih Item</label>
                            <input type="hidden" name="maintenance_id" value="{{ $maintenanceById->id }}">

                            <select name="item_id" class="form-control" value="{{ $maintenanceById->item_id }}">
                                @foreach ($items as $item)
                                    <option value="{{ $item->id }}">{{ $item->name }}</option>
                                @endforeach
                            </select>

                        </div>
                        <button class="btn btn-primary" type="submit">Add</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <div>
        <div class="card">
            <div class="card-header">
                <div class="d-flex justify-content-start">
                    List Items
                </div>
            </div>
            <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Nama Barang</th>
                            <th>#</th>
                        </tr>
                    </thead>
                    <tbody>

                        @foreach ($mainitems as $mainitem)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $mainitem->items->name }}</td>
                                <td>
                                    <div class="d-flex justify-content-end">

                                        <form action="/maintenanceitem/delete/{{ $mainitem->id }}" method="POST">
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
                @if ($mainitems->isEmpty())
                    <p class="p-2">Belum ada item yang di pilih.</p>
                @endif
                <div class="mt-5">
                    {{ $mainitems->links() }}
                </div>
            </div>

        </div>

    </div>
@endsection
