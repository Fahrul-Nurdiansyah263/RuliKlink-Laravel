@extends('backend.v_layouts.app')

@section('content')
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body border-top">
                <div class="alert alert-success" role="alert">
                    <h4 class="alert-heading">Selamat Datang, {{ Auth::user()->nama ?? Auth::user()->name }}</h4>
                    Anda login sebagai <b>Admin</b> Sistem Informasi Klinik.
                    <br><br>
                    Halaman ini merupakan dashboard utama untuk mengelola data pasien.
                    <hr>
                    <p class="mb-0">Semoga hari Anda menyenangkan! Tetap semangat memberikan pelayanan terbaik kepada pasien.</p>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
