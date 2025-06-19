@extends('backend.v_layouts.app')

@section('content')
<div class="card shadow-sm">
    <div class="card-header bg-primary text-white">
        <h5 class="mb-0">{{ $judul ?? 'Edit Pasien' }}</h5>
    </div>
    <div class="card-body">
        <form action="{{ route('backend.pasien.update', $edit->id) }}" method="POST" class="form-edit">
            @csrf
            @method('PUT')

            <div class="mb-3">
                <label for="nama_pasien" class="form-label">Nama Pasien</label>
                <input type="text" name="nama_pasien" id="nama_pasien"
                       class="form-control @error('nama_pasien') is-invalid @enderror"
                       value="{{ old('nama_pasien', $edit->nama_pasien) }}">
                @error('nama_pasien')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="email_pasien" class="form-label">Email Pasien</label>
                <input type="email" name="email_pasien" id="email_pasien"
                       class="form-control @error('email_pasien') is-invalid @enderror"
                       value="{{ old('email_pasien', $edit->email_pasien) }}">
                @error('email_pasien')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="tanggal" class="form-label">Tanggal</label>
                <input type="date" name="tanggal" id="tanggal"
                       class="form-control @error('tanggal') is-invalid @enderror"
                       value="{{ old('tanggal', $edit->tanggal) }}">
                @error('tanggal')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="jam" class="form-label">Jam</label>
                <input type="text" name="jam" id="jam" class="form-control" value="07:30 - 19:00" readonly>
            </div>

            <div class="d-flex justify-content-end">
                <a href="{{ route('backend.pasien.index') }}" class="btn btn-secondary me-2">Batal</a>
                <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
            </div>
        </form>
    </div>
</div>
@endsection

@push('scripts')
<script>
    document.addEventListener('DOMContentLoaded', function() {
        const form = document.querySelector('.form-edit');

        form.addEventListener('submit', function (e) {
            e.preventDefault(); 

            Swal.fire({
                title: "Apakah kamu ingin menyimpan perubahan?",
                icon: "question",
                showDenyButton: true,
                showCancelButton: true,
                confirmButtonText: "Simpan",
                denyButtonText: "Jangan Simpan",
                cancelButtonText: "Batal"
            }).then((result) => {
                if (result.isConfirmed) {
                    form.submit(); 
                } else if (result.isDenied) {
                    Swal.fire("Perubahan tidak disimpan", "", "info");
                }
            });
        });
    });
</script>
@endpush
