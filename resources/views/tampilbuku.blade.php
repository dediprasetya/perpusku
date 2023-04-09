@extends('master')

@section('konten')
  <h3>Tampil Data Buku</h3>
  <a class="btn btn-success" href="{{route('tambahbuku')}}"><i class="fa fa-plus"></i> Tambah Buku</a>
  <br><br>
  <table class="table table-bordered table-hover">
    <tr>
      <th>ID Buku</th>
      <th>Judul Buku</th>
      <th>Pengarang</th>
      <th>Penerbit</th>
      <th>Tahun Terbit</th>
      <th>Status</th>
      <th>Aksi</th>
    </tr>
    @foreach($buku as $s) 
    <tr>
      <td>{{$s->id_buku}}</td>
      <td>{{$s->judul}}</td>
      <td>{{$s->pengarang}}</td>
      <td>{{$s->penerbit}}</td>
      <td>{{$s->tahun_terbit}}</td>
      <td>{{$s->status}}</td>
      <td>
        <a href="/buku/ubah/{{$s->id_buku}}" class="btn btn-warning btn-sm"><i class="fa fa-pencil"></i></a>
        <a href="/buku/hapus/{{$s->id_buku}}" onclick="return confirm('Apakah Anda Yakin Menghapus Data?');" class="btn btn-danger btn-sm"><i class="fa fa-trash"></i></a>
      </td>
    </tr>
    @endforeach
  </table>
@endsection