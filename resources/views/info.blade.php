@extends('layouts.app')

@section('content')
    <div class="container mt-3">
        <h1 class="mb-4">Informasi Terbaru</h1>
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">{{ $infoTerbaru['judul'] }}</h4>
                <p class="card-text">{{ $infoTerbaru['konten'] }}</p>
                <p class="card-text"><strong>Tanggal:</strong> {{ $infoTerbaru['tanggal'] }}</p>
            </div>
        </div>
    </div>
@endsection