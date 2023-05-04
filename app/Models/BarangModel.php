<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BarangModel extends Model
{
    use HasFactory;
    protected $table = 'tbl_barang';
    protected $primaryKey = 'id_barang';
    protected $fillable = [
        'kode_barang', 'nama_barang', 'expired_date', 'jumlah_barang', 'satuan', 'harga_satuan', 'image'
    ];
}
