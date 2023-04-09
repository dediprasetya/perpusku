@extends('master')

@section('konten')
  <h4>Selamat Datang <b>{{Auth::user()->name}}</b>, Anda Login sebagai <b>{{Auth::user()->role}}</b>.</h4><br>

  <a class="btn btn-success" href="{{route('tampilanggota')}}"><i class="fa fa-plus"></i> Kelola Anggota</a><br><br>
  <a class="btn btn-success" href="{{route('tampilbuku')}}"><i class="fa fa-plus"></i> Kelola Buku</a>
  <a class="btn btn-success" href="{{route('tampilpinjam')}}"><i class="fa fa-plus"></i> Kelola Peminjaman</a>
@endsection