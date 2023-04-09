@extends('master')

@section('konten')
                    <h3>Input Data Peminjaman</h3><br>                
                    <form name="formpinjamtambah" id="formpinjamtambah" action="{{route('simpanpinjam')}} " method="post" enctype="multipart/form-data">
                    @csrf
                    <p>
                    <div class="form-group row">
                        <label for="idsiswa" class="col-sm-4 col-form-label">NAMA ANGGOTA</label>
                        <div class="col-sm-8">
                            <select type="text" class="form-control" id="nama_anggota" name="nama_anggota" placeholder="Pilih Nama anggota">
                                <option></option>
                                @foreach($anggota as $s)
                                    <option value="{{ $s->nama_anggota }}">{{ $s->nama_anggota }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                    <p>
                    <div class="form-group row">
                        <label for="idbuku" class="col-sm-4 col-form-label">Judul Buku</label>
                        <div class="col-sm-8">
                            <select type="text" class="form-control" id="id_buku" name="judul" placeholder="Pilih Judul Buku">
                                <option></option>
                                @foreach($buku as $bk)
                                    <option value="{{ $bk->judul }}">{{ $bk->judul }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                    <p>
                    <div class="modal-footer">
                        <button type="button" name="tutup" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                        <button type="submit" name="pinjamtambah" class="btn btn-success">Tambah</button>
                    </div>
                </form>
            <!-- Akhir Modal tambah data Peminjaman -->
@endsection