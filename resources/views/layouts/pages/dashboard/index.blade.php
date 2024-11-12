@extends('layouts.main')


@section('header')
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Dashboard</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                    <li class="breadcrumb-item active">Dashboard</li>
                </ol>
            </div>
        </div>
    </div>
@endsection
@section('content')
    <div class="row">
        <!-- Card Pending -->
        <div class="col-md-4">
            <div class="small-box bg-warning">
                <div class="inner">
                    <h3>{{ $pendingCount }}</h3>

                    <p>Pending</p>
                </div>
                <div class="icon">
                    <i class="fas fa-clock"></i>
                </div>
                <p class="small-box-footer">
                    Jumlah maintenance yang belum dikerjakan</p>
            </div>
        </div>


        <!-- Card Solved -->
        <div class="col-md-4">
            <div class="small-box bg-info">
                <div class="inner">
                    <h3>{{ $onProgressCount }}</h3>

                    <p>On Progress</p>
                </div>
                <div class="icon">
                    <i class="fas fa-spinner"></i>
                </div>
                <p class="small-box-footer">Jumlah maintenance yang sedang dikerjakan.</p>

            </div>
        </div>


        <!-- Card On Progress -->
        <div class="col-md-4">
            <div class="small-box bg-success">
                <div class="inner">
                    <h3>{{ $solvedCount }}</h3>

                    <p>Solved</p>
                </div>
                <div class="icon">
                    <i class="fas fa-check-circle"></i>
                </div>
                <p class="small-box-footer">Jumlah maintenance yang sudah selesai.
                </p>
            </div>

        </div>
    </div>
    @if ($latestSolvedMaintenance)
        <div class="row mt-2">
            <div class="col-md-12">
                <div class="alert alert-info" role="alert">
                    <strong>Update Terbaru:</strong> Maintenance barang
                    <strong>{{ $latestSolvedMaintenance->product->name }}</strong> telah diselesaikan.
                </div>
            </div>
        </div>
    @endif

    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h2>Top 10 Barang yang Sering di Maintenance</h2>
                </div>
                <div class="card-body">
                    <table id="example1" class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>Kode Barang</th>
                                <th>Nama Barang</th>
                                <th>Total Maintenance</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($productMaintenanceCount as $productM)
                                <tr>
                                    <td>{{ $productM->kode }}</td>
                                    <td>{{ $productM->name }} </td>
                                    <td>{{ $productM->maintenance_count }}</td>

                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>

            </div>
        </div>
    </div>
@endsection
