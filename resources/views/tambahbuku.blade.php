@extends('master')

@section('konten')
<h3>Form Input Buku</h3>
<form method="post" action="{{route('simpanbuku')}}">
  @csrf
  <div class="form-group">
    <label>Judul Buku</label>
    <input type="text" name="judul" class="form-control" placeholder="judul" required="">
  </div>
  <div class="form-group">
    <label>Pengarang</label>
    <textarea name="pengarang" rows="3" class="form-control" placeholder="Pengarang" required=""></textarea>
  </div>
  <div class="form-group">
    <label>Penerbit</label>
    <textarea name="penerbit" rows="3" class="form-control" placeholder="penerbit" required=""></textarea>
  </div>
  <div class="form-group">
    <label>Tahun Terbit</label>
    <input type="text" name="tahun_terbit" class="form-control" placeholder="tahun_terbit" required="">
  </div>
  <div class="form-group text-right">
    <button type="submit" class="btn btn-primary"><i class="fa fa-save"></i> Simpan Data</button>
  </div>
</form>
@endsection

