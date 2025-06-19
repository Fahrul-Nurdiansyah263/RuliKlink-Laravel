@extends('backend.v_layouts.app')

@section('content')
<div class="card shadow-sm">
    <div class="card-header bg-primary text-white d-flex justify-content-between align-items-center">
        <h5 class="mb-0">Daftar Pasien</h5>
        <form action="{{ route('backend.pasien.index') }}" method="GET" class="d-flex">
            <input type="text" name="cari" class="form-control me-2" placeholder="Cari nama/email" value="{{ request('cari') }}">
            <button class="btn btn-light" type="submit"><i class="bi bi-search"></i></button>
        </form>
    </div>

    <a href="{{ route('backend.pasien.create') }}">
        <button type="button" class="btn btn-primary mt-3 ms-3">
            <i class="fas fa-plus"></i> Tambah
        </button>
    </a>

    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-hover table-striped">
                <thead class="table-dark">
                    <tr>
                        <th width="5%" class="text-center">No.</th>
                        <th>Nama Pasien</th>
                        <th>Email Pasien</th>
                        <th>Nomor Antrean</th>
                        <th>Tanggal</th>
                        <th>Jam Praktek</th>
                        <th width="15%" class="text-center">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($pasien as $item)
                    <tr>
                        <td class="text-center">{{ $loop->iteration }}</td>
                        <td>
                            <div class="d-flex align-items-center">
                                <div>
                                    <h6 class="mb-0">{{ $item->nama_pasien }}</h6>
                                </div>
                            </div>
                        </td>
                        <td>
                            <span class="badge bg-secondary bg-opacity-10 text-dark">
                                <i class="bi bi-envelope me-1"></i> {{ $item->email_pasien }}
                            </span>
                        </td>
                        <td>
                            <span class="badge bg-warning text-dark">
                                #{{ $item->nomor_antrean }}
                            </span>
                        </td>
                        <td>
                            <span class="badge bg-light text-dark">
                                {{ \Carbon\Carbon::parse($item->tanggal)->format('d M Y') }}
                            </span>
                        </td>
                        <td>
                            <span class="badge bg-success bg-opacity-10 text-success">
                                <i class="bi bi-clock me-1"></i> {{ $item->jam }}
                            </span>
                        </td>
                        <td class="text-center">
                            <div class="btn-group" role="group">
                                <a href="{{ route('backend.pasien.edit', $item->id) }}" 
                                   class="btn btn-sm btn-outline-primary" 
                                   data-bs-toggle="tooltip" 
                                   title="Edit">
                                    <i class="bi bi-pencil-square"></i>
                                </a>
                                <form action="{{ route('backend.pasien.destroy', $item->id) }}" method="POST" class="form-hapus" data-nama="{{ $item->nama_pasien }}" style="display:inline;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-sm btn-outline-danger">
                                        <i class="bi bi-trash"></i>
                                    </button>
                                </form>
                            </div>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="7" class="text-center">Data pasien tidak ditemukan.</td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
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
                    text: "Kamu yakin akan menghapus ini?",
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
</script>
@endpush
