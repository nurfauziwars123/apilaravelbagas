<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class TransaksiModel extends Model
{
    use HasFactory;
    protected $table = 'tbl_transaksi';
    protected $primaryKey = 'id_transaksi';
    protected $fillable = [
        'no_transaksi', 'tgl_transaksi', 'total_bayar', 'id_user', 'id_barang'
    ];
    /** 
     * 
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function writer(): BelongsTo
    {
        return $this->belongsTo(UserModel::class, 'id_user', 'id_user');
    }

    /** 
     * 
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function writer2(): BelongsTo
    {
        return $this->belongsTo(BarangModel::class, 'id_barang', 'id_barang');
    }
}
