<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BukuModel extends Model
{
    use HasFactory;
    protected $table = 'table_buku';
    protected $primaryKey = 'id_buku';
    protected $fillable = ['judul', 'pengarang', 'penerbit', 'tahun_terbit'];
    const UPDATED_AT = null;
}
