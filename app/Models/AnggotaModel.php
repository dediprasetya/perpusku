<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AnggotaModel extends Model
{
    use HasFactory;
    protected $table = 'table_anggota';
    protected $primaryKey = 'id_anggota';
    protected $fillable = ['nama_anggota', 'jenis_kelamin', 'alamat', 'email', 'no_telp'];
    const UPDATED_AT = null;
}
