@extends('backend.v_layouts.app')

@section('content')
<div class="card shadow-sm">
    <div class="card-header bg-primary text-white">
        <h5 class="mb-0">Tambah Pasien Baru</h5>
    </div>
    <div class="card-body">
        <form action="{{ route('backend.pasien.store') }}" method="POST" class="form-create">
            @csrf

            <div class="mb-3">
                <label for="nama_pasien" class="form-label">Nama Pasien</label>
                <input type="text" name="nama_pasien" id="nama_pasien" class="form-control" required>
            </div>

            <div class="mb-3">
                <label for="email_pasien" class="form-label">Email Pasien</label>
                <input type="email" name="email_pasien" id="email_pasien" class="form-control" required>
            </div>

            <div class="mb-3">
                <label for="tanggal" class="form-label">Tanggal</label>
                <input type="date" name="tanggal" id="tanggal" class="form-control" required>
            </div>

            <div class="mb-3">
                <label for="jam" class="form-label">Jam</label>
                <input type="text" name="jam" id="jam" class="form-control" value="07:30 - 19:00" readonly>
            </div>


            <div class="d-flex justify-content-end">
                <a href="{{ route('backend.pasien.index') }}" class="btn btn-secondary me-2">Batal</a>
                <button type="submit" class="btn btn-primary">Simpan</button>
            </div>
        </form>
    </div>
</div>
@endsection

@push('scripts')
<script>
    document.addEventListener('DOMContentLoaded', function () {
        const forms = document.querySelectorAll('.form-create');

        forms.forEach(form => {
            form.addEventListener('submit', function (e) {
                e.preventDefault();

               
                const requiredInputs = form.querySelectorAll('input[required], textarea[required], select[required]');
                let isValid = true;
                let firstInvalidField = null;

                
                requiredInputs.forEach(input => {
                    if (!input.value.trim()) {
                        isValid = false;
                        if (!firstInvalidField) {
                            firstInvalidField = input;
                        }
                    }
                });

                if (!isValid) {
                    Swal.fire({
                        icon: 'error',
                        title: 'Oops...',
                        text: 'Ada kolom yang belum diisi!',
                    }).then(() => {
                        if (firstInvalidField) {
                            firstInvalidField.focus();
                        }
                    });
                    return;
                }

                Swal.fire({
                    title: "Apakah kamu yakin?",
                    text: "Data akan dibuat dan disimpan!",
                    icon: "question",
                    showCancelButton: true,
                    confirmButtonColor: "#3085d6",
                    cancelButtonColor: "#d33",
                    confirmButtonText: "Ya, simpan!",
                    cancelButtonText: "Batal"
                }).then((result) => {
                    if (result.isConfirmed) {
                        Swal.fire({
                            title: "Berhasil!",
                            text: "Data berhasil dibuat.",
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
