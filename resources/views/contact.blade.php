@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <div class="card-header" style="background-color: #F5F5F5; color: black;">Informasi Kontak</div>

                <div class="card-body">

                    <ul class="list-unstyled" style="font-size: 16px; text-align: center;">
                        <li style="margin-bottom: 10px;">
                            <i class="fa fa-envelope" style="font-size: 24px; margin-right: 10px;"></i> <span style="vertical-align: middle;">Email: info@uhb.ac.id</span>
                        </li>
                        <li style="margin-bottom: 10px;">
                            <i class="fa fa-phone" style="font-size: 24px; margin-right: 10px;"></i> <span style="vertical-align: middle;">Telp: (0281) 6843493</span>
                        </li>
                        <li>
                            <i class="fa fa-map-marker" style="font-size: 24px; margin-right: 10px;"></i> Alamat:
                            <ul style="list-style-type: none; padding-left: 0;">
                                <li style="margin-bottom: 5px;">
                                    <strong>Kampus 1:</strong> Jl. Raden Patah NO. 100, Ledug, Kecamatan Kembaran, Kabupaten Banyumas, Jawa Tengah - Republik Indonesia
                                </li>
                                <li>
                                    <strong>Kampus 2:</strong> Jl. Wahid Hasyim No. 274 A, Karangklesem, Kecamatan Purwokerto Selatan, Kabupaten Banyumas, Jawa Tengah - Republik Indonesia
                                </li>
                            </ul>
                        </li>
                    </ul>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection