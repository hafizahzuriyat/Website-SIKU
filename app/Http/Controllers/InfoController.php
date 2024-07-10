<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class InfoController extends Controller
{
    public function info()
    {
        // Data informasi terbaru 
        $infoTerbaru = [
            'judul' => 'Penting: Pembaruan Tentang Kerjasama Universitas',
            'konten' => 'Kami dengan gembira ingin mengumumkan bahwa Universitas Harapan Bangsa telah berhasil menjalin kerjasama baru dengan beberapa universitas ternama di luar negeri. Kerjasama ini membuka peluang baru bagi mahasiswa untuk mengikuti program pertukaran pelajar dan kolaborasi riset yang akan memperluas wawasan dan pengalaman mereka. Kami sangat bersemangat dengan kesempatan ini dan berharap dapat terus memperkuat jaringan kerjasama internasional kami.',
            'tanggal' => now()->format('d-m-Y'),
        ];        

        return view('info', compact('infoTerbaru'));
    }
}
