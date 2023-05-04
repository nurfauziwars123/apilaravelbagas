<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class LogModel extends Model
{
    use HasFactory;
    protected $table = 'tbl_log';
    protected $primaryKey = 'id_log';
    protected $fillable = [
        'waktu', 'aktivitas', 'id_user'
    ];
    /** 
     * 
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function writer(): BelongsTo
    {
        return $this->belongsTo(UserModel::class, 'id_user', 'id_user');
    }
}
