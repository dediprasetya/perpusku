<?php

namespace App\Models;
use App\Models\AnggotaModel;
use App\Models\BukuModel;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PinjamModel extends Model
{
    use HasFactory;
    protected $table = 'table_pinjaman';
    protected $primaryKey = 'id_pinjaman';
    protected $fillable = ['nama_anggota','judul','tanggal_pinjam','tanggal_wajib_kembali','tanggal_kembali'];
    const UPDATED_AT = null;
    const CREATED_AT = null;
    public function anggota()
    {
        return $this->belongsTo(AnggotaModel::class, 'nama_anggota');
    }
    /**
     * Get the user that owns the Peminjaman
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */


    public function buku()
    {
        return $this->belongsTo(BukuModel::class, 'judul');
    }




}
