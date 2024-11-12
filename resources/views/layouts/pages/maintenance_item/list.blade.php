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
                    <th>Nama Barang</th>
                    <th>#</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($mainitems as $mainitem)
                    <tr>
                        <td>No</td>
                        <td>{{ $mainitem->item->name }}</td>
                        <td>
                            <div class="d-flex justify-content-end">

                                <form action="/mainitems/delete/{{ $mainitem->id }}" method="POST">
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
            {{ $mainitems->links() }}
        </div>
    </div>

</div>
