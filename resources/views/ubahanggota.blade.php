@extends('master')

@section('konten')
<h3>Ubah Data Anggota</h3>
  @foreach($anggota as $s)
    <form method="post" action="{{route('updateanggota')}}">
      @csrf
      <input type="hidden" name="id_anggota" value="{{$s->id_anggota}}">
      <div class="form-group">
        <label>Nama Anggota</label>
        <input type="text" name="nama_anggota" value="{{$s->nama_anggota}}" class="form-control" placeholder="Nama Anggota" required="">
      </div>
      <div class="form-group">
        <label>Jenis Kelamin</label>
        <input type="text" name="jenis_kelamin" value="{{$s->jenis_kelamin}}" class="form-control" placeholder="Jenis Kelamin" required="">
      </div>
      <div class="form-group">
        <label>Alamat</label>
        <input type="text" name="alamat" value="{{$s->alamat}}" class="form-control" placeholder="alamat" required="">
      </div>
      <div class="form-group">
        <label>Email</label>
        <input type="email" name="email" value="{{$s->email}}" class="form-control" placeholder="email" required="">
      </div>
      <div class="form-group">
        <label>No. Telp</label>
        <input type="text" name="no_telp" value="{{$s->no_telp}}" class="form-control" placeholder="No. telp" required="">
      </div>
      <div class="form-group text-right">
        <button type="submit" class="btn btn-primary"><i class="fa fa-save"></i> Update Data</button>
      </div>
    </form>
  @endforeach
@endsection