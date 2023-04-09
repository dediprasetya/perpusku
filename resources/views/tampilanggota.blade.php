@extends('master')

@section('konten')
<h3>Tampil Data Anggota</h3>
<a class="btn btn-success" href="{{route('tambahanggota')}}"><i class="fa fa-plus"></i> Tambah Anggota</a>
<br><br>
<table class="table table-bordered table-hover">
  <tr>
    <th>#ID</th>
    <th>Nama Anggota</th>
    <th>Jenis Kelamin</th>
    <th>Alamat</th>
    <th>Email</th>
    <th>No. Telp</th>
    <th>Aksi</th>
  </tr>
  @foreach($anggota as $s) 
  <tr>
    <td>{{$s->id_anggota}}</td>
    <td>{{$s->nama_anggota}}</td>
    <td>{{$s->jenis_kelamin}}</td>
    <td>{{$s->alamat}}</td>
    <td>{{$s->email}}</td>
    <td>{{$s->no_telp}}</td>
    <td>
      <a href="/anggota/ubah/{{$s->id_anggota}}" class="btn btn-warning btn-sm"><i class="fa fa-pencil"></i></a>
      <a href="/anggota/hapus/{{$s->id_anggota}}" onclick="return confirm('Apakah Anda Yakin Menghapus Data?');" class="btn btn-danger btn-sm"><i class="fa fa-trash"></i></a>
    </td>
  </tr>
  @endforeach
</table>
@endsection