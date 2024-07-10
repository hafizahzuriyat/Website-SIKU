<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Pagination\Paginator;
use App\Models\Daftar_Kerjasama;
use Session;

class DaftarKerjasamaController extends Controller
{
    public function index()
    {
        $data = Daftar_Kerjasama::paginate(5);
        return view('daftar', compact('data'));
    }

    public function simpan(Request $request)
    {
        $this->validate($request, [
            'dokumen' => 'mimes:pdf',
        ]
    );

        $dokumen = $request->file('dokumen');
        $nama_dokumen = 'FT'.date('Ymdhis').'.'.$request->file('dokumen')->getClientOriginalExtension();
        $dokumen->move('dokumen/',$nama_dokumen);

        $data = new Daftar_Kerjasama();
            $data->no_kontrak=$request->no_kontrak;
            $data->judul_mou=$request->judul_mou;
            $data->mitra=$request->mitra;
            $data->kegiatan=$request->kegiatan;
            $data->tgl_berlaku=$request->tgl_berlaku;
            $data->dokumen=$nama_dokumen;
            
        $data->save();
        Session::flash('sukses','Data berhasil di simpan!');
        return back();
    }

    public function edit(Request $request, int $no_kontrak)
    {
        $data = Daftar_Kerjasama::where('no_kontrak', $no_kontrak);

        $data->update([
            'no_kontrak' => $request->no_kontrak,
            'judul_mou' => $request->judul_mou,
            'mitra' => $request->mitra,
            'kegiatan' => $request->kegiatan,
            'tgl_berlaku' => $request->tgl_berlaku,
            'dokumen' => $request->dokumen,
        ]);

        Session::flash('sukses','Data berhasil di update!');
        return back();
    }

    public function delete(Request $request, int $no_kontrak)
    {
        $data = Daftar_Kerjasama::where('no_kontrak', $no_kontrak);
        $data->delete();

        Session::flash('sukses','Data berhasil di hapus!');
        return back();
    }

    public function cari(Request $request)
    {
        $query = $request->input('query');
        $data = Daftar_Kerjasama::where('judul_mou', 'like', '%'.$query.'%')->orWhere('no_kontrak', 'like', '%'.$query.'%')->orWhere('mitra', 'like', '%'.$query.'%')->get();
        return view('daftar', compact('data'));
    }

}
