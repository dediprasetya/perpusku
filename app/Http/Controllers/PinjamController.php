<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\AnggotaModel;
use App\Models\BukuModel;
use App\Models\PinjamModel;
use Illuminate\Support\Carbon;
use App\Http\Controllers\Controller;
use App\Http\Controllers\NotifController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Model;


class PinjamController extends Controller
{

    public function tampilpinjam()
    {

        //method untuk tampil data peminjaman

        $pinjam = PinjamModel::orderby('id_pinjaman', 'ASC')
        ->paginate(5);
         
        $anggota = AnggotaModel::all();
        $buku = BukuModel::all();

        return view('tampilpinjam',['pinjam'=>$pinjam,'anggota'=>$anggota,'buku'=>$buku]);
    }
        //return view('halaman/view_pinjam',['pinjam'=>$datapinjam]);
        //return view('tampilpinjam', ['pinjam' => $pinjam]);
        /*$anggota = PinjamModel::select('*')
                ->get();       
        return view('tampilpinjam', ['pinjam' => $pinjam]);
        */
    //}

    public function tambahpinjam()
    {
        $anggota = AnggotaModel::all();
        $buku = BukuModel::all();
        return view('tambahpinjam',['anggota'=>$anggota,'buku'=>$buku]);
    }

    public function simpanpinjam(Request $request)
    {


        $this->validate($request, [
            'nama_anggota' => 'required',
            'judul' => 'required'
        ]);

        //$cekbuku = BukuModel::select('*')
           // ->where('judul', $request->judul,)
            //->get('status');

        //if ($cekbuku =='Instock'){
    
        $pinjam = PinjamModel::create([
            'nama_anggota' => $request->nama_anggota,
            'judul' => $request->judul,
            'tanggal_pinjam' => Carbon::now()->toDateString(),
            'tanggal_wajib_kembali'=> Carbon::now()->addDay(7)->toDateString(),
        ]);

        $buku = BukuModel::where('judul',$request->judul)->update(['status'=> 'dipinjam']);

            //Proses update tabel buku
            //$buku = BukuModel::findOrFail($request->judul); 
            //$buku->status = 'dipinjam';
            //$buku->save();

        return redirect()->route('tampilpinjam'); 
        //}else{
            //return redirect()->route('tampilpinjam'); 
        //}       
            
    }

    public function kembalipinjam($id_pinjaman)
    {

        
        $pinjam = PinjamModel::select('*')
            ->where('id_pinjaman', $id_pinjaman)
            ->get();
    
        return view('kembalipinjam', ['pinjam' => $pinjam]);
    }
        
        //public function updateanggota(Request $request)
        //
            //$anggota = AnggotaModel::where('id_anggota', $request->id_anggota)->update([
                    //'nama_anggota' => $request->nama_anggota,
                    //'jenis_kelamin' => $request->jenis_kelamin,
                    //'alamat' => $request->alamat,
                    ////'email' => $request->email,
                    //'no_telp' => $request->no_telp
                    //]);
            
           // return redirect()->route('tampilanggota');
        /*$anggota = AnggotaModel::insert([
            'id_anggota' => $request->id_anggota,
            'nama_anggota' => $request->nama_anggota,
            'jenis_kelamin' => $request->jenis_kelamin,
            'alamat' => $request->alamat,
            'email' => $request->email,
            'no_telp' => $request->no_telp
        ]);

        return redirect()->route('tampilanggota')->with('msg','Data Berhasil di Simpan');
        */
    //}
    public function ajukankembali(Request $request) {

        if (Carbon::create($request->tanggal_kembali)->greaterThan($request->tanggal_wajib_kembali)) {

            $denda = Carbon::create($request->tanggal_kembali)->diffInDays($request->tanggal_wajib_kembali);
            $denda *= 1000;
            $data = $denda;
                
            //} 
            
            $anggota = PinjamModel::where('id_pinjaman', $request->id_pinjaman)->update([
                'nama_anggota' => $request->nama_anggota,
                'judul' => $request->judul,
                'tanggal_pinjam' => $request->tanggal_pinjam,
                'tanggal_wajib_kembali' => $request->tanggal_wajib_kembali,
                'tanggal_kembali' => $request->tanggal_kembali,
                'denda'=> $data,
                'status'=> 'Proses peminjaman selesai',
                ]);

                //$status = PinjamModel::findOrFail($request->id_pinjaman); 
                //$status->status = 'Proses peminjaman selesai';
                //$status->denda->$this->data;
                //$status->save();
            
            /*DB::beginTransaction();
            $pinjam = PinjamModel::select('*')
                ->where('id_pinjaman', $request->id_pinjaman)
                ->get();
            $pinjaman = PinjamModel::findorFail($pinjam);
            $pinjaman->nama_anggota = $request->nama_anggota;
            $pinjaman->judul = $request->judul;
            $pinjaman->tanggal_pinjam = $request->tanggal_pinjam;
            $pinjaman->tanggal_wajib_kembali = $request->tanggal_wajib_kembali;
            $pinjaman->tanggal_kembali = $request->tanggal_kembali;
            $pinjaman->denda = $data;
            $pinjaman->status = "Proses Peminjaman Selesai";
            $pinjaman->save();
            DB::commit();

            //DB::beginTransaction();
            //update data tanggal pengembalian
            //$dataPinjaman->denda = $this->data;
            //$buku = BukuModel::findOrFail($request->judul);
            //$buku->status = 'In Stock';
        // $buku->save();
            //DB::commit();
            */
            $buku = BukuModel::where('judul',$request->judul)->update(['status'=> 'In Stock']);
            return redirect()->route('tampilpinjam')->with('msg','Data Berhasil di Simpan');
            
        }
        else {
            $anggota = PinjamModel::where('id_pinjaman', $request->id_pinjaman)->update([
                'nama_anggota' => $request->nama_anggota,
                'judul' => $request->judul,
                'tanggal_pinjam' => $request->tanggal_pinjam,
                'tanggal_wajib_kembali' => $request->tanggal_wajib_kembali,
                'tanggal_kembali' => $request->tanggal_kembali,
                'denda'=> null,
                'status'=> 'Proses peminjaman selesai',
                ]);
                $buku = BukuModel::where('judul',$request->judul)->update(['status'=> 'Instock']);
                return redirect()->route('tampilpinjam')->with('msg','Data Berhasil di Simpan');
        }
    }    

}
