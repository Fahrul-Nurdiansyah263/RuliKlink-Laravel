@extends('backend.v_layouts.app')

@section('content')
<div class="container-fluid">
    <div class="card shadow mb-4">
        <div class="card-header py-3 d-flex justify-content-between align-items-center">
            <h6 class="m-0 font-weight-bold text-primary">Daftar Pasien Terhapus</h6>
        </div>
        <div class="card-body">
            @if(session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
            @endif

            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Nama Pasien</th>
                            <th>Tanggal Dihapus</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($pasien as $row)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $row->nama_pasien }}</td> 
                            <td>{{ $row->deleted_at->format('d-m-Y H:i:s') }}</td>
                            <td>
                                <div class="btn-group" role="group" style="gap: 5px">
                                    <form action="{{ route('backend.pasien.restore', $row->id) }} " class="form-restore" style="display: inline;">
                                        <button type="submit" class="btn btn-sm btn-success">
                                            <i class="fas fa-trash-restore"></i> Restore
                                        </button>
                                    </form>

                                    <form action="{{ route('backend.pasien.forceDelete', $row->id) }}" class="form-hapus"  method="POST" style="display:inline;">
                                        @csrf 
                                        <button type="submit" class="btn btn-sm btn-danger" >
                                            <i class="fas fa-trash"></i> Hapus Permanen
                                        </button>
                                    </form>
                                     
                                </div>
                            </td>
                        </tr>
                        
                        
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection

@push('scripts')
<script>
    document.addEventListener('DOMContentLoaded', function () {
        const forms = document.querySelectorAll('.form-hapus');

        forms.forEach(form => {
            form.addEventListener('submit', function (e) {
                e.preventDefault();

                Swal.fire({
                    title: "Are you sure?",
                    text: "Kamu akan menghapus permanen data ini!",
                    icon: "warning",
                    showCancelButton: true,
                    confirmButtonColor: "#3085d6",
                    cancelButtonColor: "#d33",
                    confirmButtonText: "Yes, delete it!"
                }).then((result) => {
                    if (result.isConfirmed) {
                        Swal.fire({
                            title: "Deleted!",
                            text: "Your file has been deleted.",
                            icon: "success",
                            timer: 1200,
                            showConfirmButton: false
                        }).then(() => {
                            form.submit();
                        });
                    }
                });
            });
        });
    });

    document.addEventListener('DOMContentLoaded', function () {
        const forms = document.querySelectorAll('.form-restore');

        forms.forEach(form => {
            form.addEventListener('submit', function (e) {
                e.preventDefault();

                Swal.fire({
                    title: "Are you sure?",
                    text: "Kamu akan memulihkan data ini?",
                    icon: "warning",
                    showCancelButton: true,
                    confirmButtonColor: "#1a8754",
                    cancelButtonColor: "#d33",
                    confirmButtonText: "Yes, Pulihkan!"
                }).then((result) => {
                    if (result.isConfirmed) {
                        Swal.fire({
                            title: "Dipulihkan!",
                            text: "Data berhasil Dipulihkan",
                            icon: "success",
                            timer: 1200,
                            showConfirmButton: false
                        }).then(() => {
                            form.submit();
                        });
                    }
                });
            });
        });
    });
</script>
@endpush