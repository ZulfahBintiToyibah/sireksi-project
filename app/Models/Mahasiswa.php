<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Mahasiswa extends Model
{
    use HasFactory;
    protected $table = "mahasiswas";

    protected $fillable = ['nim', 'nama', 'jenkel', 'prodis_id', 'password', 'no_telp', 'alamat', 'foto'];

    public function prodis ()
    {
        return $this->belongsTo(Prodi::class);
    }
}