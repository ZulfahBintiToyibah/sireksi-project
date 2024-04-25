<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pengumpulan extends Model
{
    use HasFactory;
    protected $table = 'pengumpulans';

    protected $fillable = ['mahasiswas_id', 'skripsis_id', 'status_arsip'];

    public function skripsis()
    {
        return $this->belongsTo(Skripsi::class, 'skripsis_id');
    }

    public function mahasiswas()
{
    return $this->belongsTo(Mahasiswa::class);
}
}
