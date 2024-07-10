<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Daftar_Kerjasama extends Model
{
    use HasFactory;

    protected $table='daftar_kerjasama';
    protected $fillable = [
        'no_kontrak',
        'judul_mou',
        'mitra',
        'kegiatan',
        'tgl_kegiatan',
        'dokumen',
    ];
}
