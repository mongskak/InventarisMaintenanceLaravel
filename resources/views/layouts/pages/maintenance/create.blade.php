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
    <div class="row">
        <div class="col-6">
            <div class="card">
                <div class="card-body">
                    <form action="/maintenances/create" method="POST">
                        @csrf
                        @method('POST')

                        <div class="mb-3">
                            <label for="name" class="form-label">Nama Barang</label>

                            <select name="product_id" class="form-control">
                                @foreach ($products as $product)
                                    <option value="{{ $product->id }}">{{ $product->name }}</option>
                                @endforeach
                            </select>

                        </div>
                        <div class="mb-3">
                            <label for="reason" class="form-label">Reason</label>
                            <textarea type="text" class="form-control" id="reason" name="reason" rows="3"></textarea>
                        </div>
                        <div class="row">
                            <div class="col-6">

                                <div class="mb-3">
                                    <label for="start_date" class="form-label">Start Date</label>
                                    <input type="date" class="form-control" id="start_date" name="start_date"></input>
                                </div>
                                <div class="mb-3">
                                    <label for="end_date" class="form-label">End Date</label>
                                    <input type="date" class="form-control" id="end_date" name="end_date"></input>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="mb-3">
                                    <label for="description" class="form-label">Status</label>

                                    <select name="status" class="form-control">
                                        <option value="Pending">Pending
                                        </option>
                                        <option value="On Progress">
                                            On
                                            Progress</option>
                                        <option value="Solved">Solved
                                        </option>
                                    </select>
                                </div>
                                <div class="mb-3">
                                    <label for="description" class="form-label">Priority</label>
                                    <select name="priority" class="form-control">
                                        <option value="Low">Low</option>
                                        <option value="Medium">Medium
                                        </option>
                                        <option value="High">High
                                        </option>


                                    </select>

                                </div>
                            </div>
                        </div>

                        <a href="/maintenances" class="btn btn-outline-primary mr-3" type="submit">Kembali</a>
                        <button class="btn btn-primary" type="submit">Simpan</button>
                </div>


                </form>
            </div>
        </div>
    </div>
@endsection
