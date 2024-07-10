@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <div class="jumbotron text-center">
                        <h1 class="display-4">Selamat Datang di SIKU</h1>
                        <p class="lead">Sistem Informasi Kerjasama Universitas</p>
                        <hr class="my-4">
                        <p>Selamat datang kembali, {{ Auth::user()->name }}!</p>
                        <a class="btn btn-primary" href="daftar-kerjasama" role="button">Mulai Kerjasama</a>
                    </div><br>

                    <div class="row">
                        <div class="col-md-4">
                            <div class="card">
                                <div class="card-body">
                                    <h5 class="card-title">Tentang Kami</h5>
                                    <p class="card-text">Pelajari lebih lanjut tentang visi, misi, dan nilai-nilai yang kami pegang teguh dalam memperkuat kerjasama antar-universitas di platform kami.</p>
                                    <a href="about-us" class="btn btn-primary">Baca Selengkapnya</a>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="card">
                                <div class="card-body">
                                    <h5 class="card-title">Informasi Terbaru</h5>
                                    <p class="card-text">Dapatkan pembaruan terkini tentang berita, artikel, dan informasi penting lainnya. Pastikan Anda tidak ketinggalan hal-hal terbaru.</p>
                                    <a href="info" class="btn btn-primary">Lihat Informasi</a>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="card">
                                <div class="card-body">
                                    <h5 class="card-title">Bantuan & Dukungan</h5>
                                    <p class="card-text">Butuh bantuan? Kunjungi pusat bantuan kami atau hubungi tim dukungan untuk mendapatkan bantuan lebih lanjut.</p>
                                    <a href="contact" class="btn btn-primary">Dapatkan Bantuan</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
