<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\BukuModel;

class BukuController extends Controller
{
    public function tampilbuku()
    {
        $buku = BukuModel::select('*')
                ->get();       
        return view('tampilbuku', ['buku' => $buku]);
    }

    public function tambahbuku()
    {
        return view('tambahbuku');
    }

    public function simpanbuku(Request $request)
    {
        /*$anggota = AnggotaModel::create([
            'nama_anggota' => $request->nama_anggota,
            'jenis_kelamin' => $request->jenis_kelamin,
            'alamat' => $request->alamat,
            'email' => $request->email,
            'no_telp' => $request->no_telp
        ]);
        */
        $buku = BukuModel::insert([
            'id_buku' => $request->id_buku,
            'judul' => $request->judul,
            'pengarang' => $request->pengarang,
            'penerbit' => $request->penerbit,
            'tahun_terbit' => $request->tahun_terbit,
        ]);

        return redirect()->route('tampilbuku')->with('msg','Data Berhasil di Simpan');
    }
    
    public function ubahbuku($id_buku)
    {
        $buku = BukuModel::select('*')
             ->where('id_buku', $id_buku)
             ->get();

        return view('ubahbuku', ['buku' => $buku]);
    }
    
    public function updatebuku(Request $request)
    {
        $buku = BukuModel::where('id_buku', $request->id_buku)->update([
                'id_buku' => $request->id_buku,
                'judul' => $request->judul,
                'pengarang' => $request->pengarang,
                'penerbit' => $request->penerbit,
                'tahun_terbit' => $request->tahun_terbit,
                ]);
        
        return redirect()->route('tampilbuku');
    }

    public function hapusbuku($id_buku)
    {
        $anggota = BukuModel::where('id_buku', $id_buku)
              ->delete();

        return redirect()->route('tampilbuku');
    }
}

