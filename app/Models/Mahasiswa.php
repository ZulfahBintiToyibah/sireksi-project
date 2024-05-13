<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Support\Facades\DB;

class Mahasiswa extends Authenticatable
{
    use HasFactory;
    protected $table = "mahasiswas";

    protected $fillable = ['nim', 'nama', 'jenkel', 'prodis_id', 'password', 'no_telp', 'alamat', 'foto', 'role'];

    // public function prodis ()
    // {
    //     return $this->belongsTo(Prodi::class);
    // }

    public function prodis()
    {
    return $this->belongsTo(Prodi::class, 'prodis_id');

    }

    public function skripsis()
    {
        return $this->belongsTo(Skripsi::class);
    }

    public function pengumpulans()
    {
        return $this->hasMany(Pengumpulan::class);
    }
}