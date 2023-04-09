@extends('master')

@section('konten')
<h3>Form Input Anggota</h3>
<form method="post" action="{{route('simpananggota')}}">
  @csrf
  <div class="form-group">
    <label>Nama Anggota</label>
    <input type="text" name="nama_anggota" class="form-control" placeholder="Nama Anggota" required="">
  </div>
  <div class="form-group">
    <label>Jenis Kelamin</label>
    <select class="form-control" id="jenis_kelamin" name="jenis_kelamin">
            <option value="Laki-laki">Laki-Laki</option>
            <option value="Perempuan">Perempuan</option>
    </select>
  </div>
  <div class="form-group">
    <label>Alamat</label>
    <textarea name="alamat" rows="3" class="form-control" placeholder="Alamat" required=""></textarea>
  </div>
  <div class="form-group">
    <label>Email</label>
    <textarea name="email" rows="3" class="form-control" placeholder="Email" required=""></textarea>
  </div>
  <div class="form-group">
    <label>No. Telp</label>
    <input type="text" name="no_telp" class="form-control" placeholder="No. Telp" required="">
  </div>
  <div class="form-group text-right">
    <button type="submit" class="btn btn-primary"><i class="fa fa-save"></i> Simpan Data</button>
  </div>
</form>
@endsection

