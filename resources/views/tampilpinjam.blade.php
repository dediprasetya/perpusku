@extends('master')

@section('konten')
  <h4>Selamat Datang <b>{{Auth::user()->name}}</b>, Anda Login sebagai <b>{{Auth::user()->role}}</b>.</h4><br>

  <a class="btn btn-success" href="{{route('tampilpinjam')}}"><i class="fa fa-plus"></i> K<h3><center>Data Peminjaman Buku</center><h3></a>
    <h3><center>Sistem Perpustakaan Umum</center></h3>
    
    <a class="btn btn-success" href="{{route('tambahpinjam')}}"><i class="fa fa-plus"></i> Penambahan Peminjaman</a> 

    <p>
    <table class="table table-bordered table-striped">
        <thead>
            <tr>
                <td align="center">No</td>
                <td align="center">ID Pinjam</td>
                <td align="center">Nama Anggota</td>
                <td align="center">Judul Buku</td>
                <td align="center">Tanggal Pinjam</td>
                <td align="center">Tanggal Wajib Kembali</td>
                <td align="center">Tanggal Pengembalian</td>
                <td align="center">Denda</td>
                <td align="center">Status</td>
                <td align="center">Aksi</td>
            </tr>
        </thead>

        <tbody>
            @foreach ($pinjam as $index=>$p)
                <tr>
                    <td align="center" scope="row">{{ $index + $pinjam->firstItem() }}</td>
                    <td align="center">{{$p->id_pinjaman}}</td>
                    <td>{{$p->nama_anggota}}</td>
                    <td>{{$p->judul}}</td>
                    <td>{{$p->tanggal_pinjam}}</td>
                    <td>{{$p->tanggal_wajib_kembali}}</td>
                    <td>{{$p->tanggal_kembali}}</td>
                    <td>{{$p->denda}}</td>
                    <td>{{$p->status}}</td>
                    <td align="center">
                        <button type="button" class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#modalPinjamEdit{{$p->id}}"> 
                            Edit
                        </button>
                        |
                        <a href="/pinjam/kembali/{{$p->id_pinjaman}}" onclick="return confirm('Proses Pengembalian Buku?')">
                            <button class="btn-danger">
                                Pengembalian
                            </button>
                        </a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

    <!--awal pagination-->
    Halaman : {{ $pinjam->currentPage() }} <br />
    Jumlah Data : {{ $pinjam->total() }} <br />
    Data Per Halaman : {{ $pinjam->perPage() }} <br />

    {{ $pinjam->links() }}
    <!--akhir pagination-->Kelola Anggota</a><br><br>
  <a class="btn btn-success" href="{{route('tampilbuku')}}"><i class="fa fa-plus"></i> Kelola Buku</a>

  
@endsection