@extends('master')

@section('konten')
<h3>Ubah Data Anggota</h3>
  @foreach($buku as $s)
    <form method="post" action="{{route('updatebuku')}}">
      @csrf
      <input type="hidden" name="id_buku" value="{{$s->id_buku}}">
      <div class="form-group">
        <label>Judul Buku</label>
        <input type="text" name="judul" value="{{$s->judul}}" class="form-control" placeholder="Judul Buku" required="">
      </div>
      <div class="form-group">
        <label>Pengarang</label>
        <input type="text" name="pengarang" value="{{$s->pengarang}}" class="form-control" placeholder="Pengarang" required="">
      </div>
      <div class="form-group">
        <label>Penerbit</label>
        <input type="text" name="penerbit" value="{{$s->penerbit}}" class="form-control" placeholder="penerbit" required="">
      </div>
      <div class="form-group">
        <label>Tahun Terbit</label>
        <input type="text" name="tahun_terbit" value="{{$s->tahun_terbit}}" class="form-control" placeholder="Tahun Terbit" required="">
      </div>
      <div class="form-group text-right">
        <button type="submit" class="btn btn-primary"><i class="fa fa-save"></i> Update Data</button>
      </div>
    </form>
  @endforeach
@endsection