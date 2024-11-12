@extends('layouts.main')


@section('header')
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Maintenance</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                    <li class="breadcrumb-item active">Maintenance</li>
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
                        <a href="/maintenances/add" class="btn btn-primary"><i class="fa fa-plus"></i> Tambah
                            Maintenance</a>
                    </div>
                </div>
                <div class="card-body">
                    <table id="example1" class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>No Maintenance</th>
                                <th>Nama Barang</th>
                                <th>Reason</th>
                                <th>Start Date</th>
                                <th>End Date</th>
                                <th>Status</th>
                                <th>Priority</th>
                                <th>#</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($maintenances as $maintenance)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $maintenance->kode }}</td>
                                    <td>{{ $maintenance->product->name }}</td>
                                    <td>{{ Str::limit($maintenance->reason, 50) }}</td>
                                    <td>{{ \Carbon\Carbon::parse($maintenance->start_date)->format('d M Y') }} </td>
                                    <td>{{ \Carbon\Carbon::parse($maintenance->end_date)->format('d M Y') }} </td>
                                    <td>
                                        @if ($maintenance->status == 'OnProgress')
                                            <span class="p-2 badge bg-warning">{{ $maintenance->status }}</span>
                                        @elseif ($maintenance->status == 'Solved')
                                            <span class="p-2 badge bg-success">{{ $maintenance->status }}</span>
                                        @elseif ($maintenance->status == 'Pending')
                                            <span class="p-2 badge bg-secondary">{{ $maintenance->status }}</span>
                                        @else
                                            <span class="p-2 badge bg-dark">{{ $maintenance->status }}</span>
                                        @endif
                                    </td>
                                    <td>
                                        @if ($maintenance->priority == 'Medium')
                                            <i class="p-2 badge bg-warning">{{ $maintenance->priority }}</i>
                                        @elseif ($maintenance->priority == 'Low')
                                            <i class="p-2 badge bg-primary">{{ $maintenance->priority }}</i>
                                        @elseif ($maintenance->priority == 'High')
                                            <i class="p-2 badge bg-danger">{{ $maintenance->priority }}</i>
                                        @else
                                            <i class="text-dark">{{ $maintenance->priority }}</i>
                                        @endif
                                    </td>
                                    <td>
                                        <div class="d-flex justify-content-end">

                                            <a href="/maintenances/{{ $maintenance->id }}" class="btn btn-outline-primary"
                                                class="btn btn-outline-primary">Edit</a>
                                            <form action="/maintenances/delete/{{ $maintenance->id }}" method="POST">
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
                        {{ $maintenances->links() }}
                    </div>
                </div>

            </div>
        </div>
    </div>
@endsection
