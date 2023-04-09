@extends('master')

@section('konten')
            @foreach($pinjam as $s)
                    <h3>Input Data Pengembalian</h3><br>                
                    <form action="{{route('ajukankembali')}}" method="post" enctype="multipart/form-data">
                    @csrf
                    <p>
                    <div class="form-group row">
                        <label for="nama anggota" class="col-sm-4 col-form-label">NAMA ANGGOTA</label>
                        <div class="col-sm-8">
                        <input type="text" name="nama_anggota" value="{{$s->nama_anggota}}" class="form-control" placeholder="Nama Anggota" required="">
                        </div>
                    </div>
                    <p>
                    <div class="form-group row">
                        <label for="judul buku" class="col-sm-4 col-form-label">JUDUL BUKU</label>
                        <div class="col-sm-8">
                        <input type="text" name="judul" value="{{$s->judul}}" class="form-control" placeholder="Judul Buku" required="">
                        </div>
                    </div>
                    <p>
                    <div class="form-group row">
                        <label for="TANGGAL WAJIB KEMBALI" class="col-sm-4 col-form-label">TANGGAL PINJAM</label>
                        <div class="col-sm-8">
                        <input type="date" name="tanggal_pinjam" value="{{$s->tanggal_pinjam}}" class="form-control" placeholder="Judul Buku" required="">
                        </div>
                    </div>
                    <p>
                    <div class="form-group row">
                        <label for="TANGGAL WAJIB KEMBALI" class="col-sm-4 col-form-label">TANGGAL WAJIB KEMBALI</label>
                        <div class="col-sm-8">
                        <input type="date" name="tanggal_wajib_kembali" value="{{$s->tanggal_wajib_kembali}}" class="form-control" placeholder="Judul Buku" required="">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="TANGGAL PENGEMBALIAN" class="col-sm-4 col-form-label">TANGGAL PENGEMBALIAN</label>
                        <div class="col-sm-8">
                        <input type="date" name="tanggal_kembali" value="{{$s->tanggal_kembali}}" class="form-control" placeholder="Judul Buku" required="">
                        </div>
                    </div>
                    <p>
                    <div class="modal-footer">
                        <button type="button" name="tutup" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                        <button type="submit" name="pinjamtambah" class="btn btn-success">Ajukan Pengambalian</button>
                    </div>
                </form>
                <!-- Akhir Modal tambah data Peminjaman -->
            @endforeach
@endsection