@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">Daftar Kerjasama</div>

                <div class="card-body">
                    @if(Session::has('sukses'))
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                            {{ Session::get('sukses') }}
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                    @endif
                    <div class="d-flex justify-content-between align-items-center">
                        <div class="btn-group" role="group" aria-label="Basic example">
                            <button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#modalTambahData">
                                <i class="fa fa-plus"></i>
                            </button>
                            <button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#modalTambahData">
                                Tambah Data
                            </button>
                        </div>
                        <div class="btn-group" role="group" aria-label="Search">
                            <form action="{{ url('cari-daftar')}}" method="GET" class="form-inline">
                                <div class="input-group">
                                    <input type="text" name="query" class="form-control mr-sm-2" placeholder="Cari daftar kerjasama">
                                    <div class="input-group-append">
                                        <button type="submit" class="btn btn-outline-primary my-2 my-sm-0">
                                            <i class="fa fa-search"></i>
                                        </button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>

                    <div class="table-responsive"><br>
                        <table class="table table-responsive table-hover table-striped table-bordered">
                            <thead>
                                <tr>
                                    <th class="text-center">NO</th>
                                    <th class="text-center">No Kontrak</th>
                                    <th class="text-center">Judul MOU</th>
                                    <th class="text-center">Mitra</th>
                                    <th class="text-center">Kegiatan</th>
                                    <th class="text-center">Tanggal Berlaku</th>
                                    <th class="text-center">Dokumen</th>
                                    <th class="text-center">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $no = 1; ?>
                                @foreach($data as $row)
                                <tr>
                                    <td align="center">{{ $no }}</td>
                                    <td align="center">{{ $row->no_kontrak }}</td>
                                    <td align="center">{{ $row->judul_mou }}</td>
                                    <td align="center">{{ $row->mitra }}</td>
                                    <td align="center">{{ $row->kegiatan }}</td>
                                    <td align="center">{{ $row->tgl_berlaku }}</td>
                                    <td align="center">
                                        <a href="dokumen/{{$row->dokumen}}"><button class="btn btn-warning" type="button">Download</button>
                                    </td>
                                    <td align="center">
                                        <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#modalEditData<?= $no; ?>"><i class="fas fa-pencil-alt"></i> Edit</button>
                                        <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#modalHapusData<?= $no; ?>"><i class="fa fa-trash"></i> Hapus</button>
                                    </td>

                                    <div class="modal fade" id="modalEditData<?= $no; ?>" aria-hidden="true" aria-labelledby="exampleModalToggleLabel1" tabindex="-1">
                                            <div class="modal-dialog modal-dialog-centered modal-lg">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="exampleModalToggleLabel1">Edit Data Kerjasama</h5>
                                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <form action="{{ url('daftar-kerjasama-edit')}}/{{ $row->no_kontrak }}" method="POST">
                                                            @csrf
                                                            @method('PUT')
                                                            <div class="mb-3">
                                                                <label for="no_kontrak" class="form-label">No Kontrak</label>
                                                                <input type="number" class="form-control" id="no_kontrak" name="no_kontrak" value="{{ $row->no_kontrak }}">
                                                            </div>
                                                            <div class="mb-3">
                                                                <label for="judul_mou" class="form-label">Judul MOU</label>
                                                                <input type="text" class="form-control" id="judul_mou" name="judul_mou" value="{{ $row->judul_mou }}">
                                                            </div>
                                                            <div class="mb-3">
                                                                <label for="mitra" class="form-label">Mitra</label>
                                                                <input type="text" class="form-control" id="mitra" name="mitra" value="{{ $row->mitra }}">
                                                            </div>
                                                            <div class="mb-3">
                                                                <label for="kegiatan" class="form-label">Kegiatan</label>
                                                                <input type="text" class="form-control" id="kegiatan" name="kegiatan" value="{{ $row->kegiatan }}">
                                                            </div>
                                                            <div class="mb-3">
                                                                <label for="tgl_berlaku" class="form-label">Tanggal Berlaku</label>
                                                                <input type="text" class="form-control" id="tgl_berlaku" name="tgl_berlaku" value="{{ $row->tgl_berlaku }}">
                                                            </div>
                                                            <div class="mb-3">
                                                                <label for="dokumen" class="form-label">Dokumen</label>
                                                                <input type="file" class="form-control" id="dokumen" name="dokumen" accept=".pdf" required value="{{ $row->dokumen }}">
                                                            </div>

                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                                                        <button type="submit" class="btn btn-primary" data-bs-dismiss="modal" aria-label="Close">Simpan</button>
                                                    </div>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="modal fade" id="modalHapusData<?= $no; ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                            <div class="modal-dialog">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h1 class="modal-title fs-5" id="exampleModalLabel">Hapus Data Kerjasama</h1>
                                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <form action="{{ url('daftar-kerjasama-hapus')}}/{{ $row->no_kontrak }}" method="POST">
                                                            @csrf
                                                            @method('DELETE')
                                                            Apakah Anda yakin menghapus data kerjasama?
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                                                        <button type="submit" class="btn btn-danger" data-bs-target="#modalHapusData">Hapus</button>
                                                    </div>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    
                                </tr>
                                <?php $no++; ?>
                                @endforeach
                            </tbody>
                        </table>
                        {{ $data->links('pagination::bootstrap-4') }}
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- modal tambah data -->
    <div class="modal fade" id="modalTambahData" aria-hidden="true" aria-labelledby="exampleModalToggleLabel1" tabindex="-1">
        <div class="modal-dialog modal-dialog-centered modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalToggleLabel1">Tambah Data</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="{{ url('daftar-kerjasama-simpan')}}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="mb-3">
                            <label for="no_kontrak" class="form-label">No Kontrak</label>
                            <input type="number" class="form-control" id="no_kontrak" name="no_kontrak">
                        </div>
                        <div class="mb-3">
                            <label for="judul_mou" class="form-label">Judul MOU</label>
                            <input type="text" class="form-control" id="judul_mou" name="judul_mou">
                        </div>
                        <div class="mb-3">
                            <label for="mitra" class="form-label">Mitra</label>
                            <input type="text" class="form-control" id="mitra" name="mitra">
                        </div>
                        <div class="mb-3">
                            <label for="kegiatan" class="form-label">Kegiatan</label>
                            <input type="text" class="form-control" id="kegiatan" name="kegiatan">
                        </div>
                        <div class="mb-3">
                            <label for="tgl_berlaku" class="form-label">Tanggal Berlaku</label>
                            <input type="text" class="form-control" id="tgl_berlaku" name="tgl_berlaku">
                        </div>
                        <div class="mb-3">
                            <label for="dokumen" class="form-label">Dokumen</label>
                            <input type="file" class="form-control" id="dokumen" name="dokumen" accept=".pdf" required>
                            <small class="form-text text-muted">*Format file yang didukung: .pdf</small>
                        </div> 
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                    <button type="submit" class="btn btn-success" data-bs-dismiss="modal" aria-label="Close">Simpan</button>
                </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection