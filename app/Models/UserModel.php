<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserModel extends Model
{
    use HasFactory;
    protected $table = 'users';
    protected $primaryKey = 'id_user';
    protected $fillable = ['tipe_user', 'nama', 'alamat', 'telpon', 'username', 'password'];
}
