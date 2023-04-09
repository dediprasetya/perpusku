<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\AnggotaModel;

class AnggotaController extends Controller
{
    public function tampilanggota()
    {
        $anggota = AnggotaModel::select('*')
                ->get();       
        return view('tampilanggota', ['anggota' => $anggota]);
    }

    public function tambahanggota()
    {
        return view('tambahanggota');
    }

    public function simpananggota(Request $request)
    {
        /*$anggota = AnggotaModel::create([
            'nama_anggota' => $request->nama_anggota,
            'jenis_kelamin' => $request->jenis_kelamin,
            'alamat' => $request->alamat,
            'email' => $request->email,
            'no_telp' => $request->no_telp
        ]);
        */
        $anggota = AnggotaModel::insert([
            'id_anggota' => $request->id_anggota,
            'nama_anggota' => $request->nama_anggota,
            'jenis_kelamin' => $request->jenis_kelamin,
            'alamat' => $request->alamat,
            'email' => $request->email,
            'no_telp' => $request->no_telp
        ]);

        return redirect()->route('tampilanggota')->with('msg','Data Berhasil di Simpan');
    }
    
    public function ubahanggota($id_anggota)
    {
        $anggota = AnggotaModel::select('*')
             ->where('id_anggota', $id_anggota)
             ->get();

        return view('ubahanggota', ['anggota' => $anggota]);
    }
    
    public function updateanggota(Request $request)
    {
        $anggota = AnggotaModel::where('id_anggota', $request->id_anggota)->update([
                'nama_anggota' => $request->nama_anggota,
                'jenis_kelamin' => $request->jenis_kelamin,
                'alamat' => $request->alamat,
                'email' => $request->email,
                'no_telp' => $request->no_telp
                ]);
        
        return redirect()->route('tampilanggota');
    }

    public function hapusanggota($id_anggota)
    {
        $anggota = AnggotaModel::where('id_anggota', $id_anggota)
              ->delete();

        return redirect()->route('tampilanggota');
    }
}