<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Skripsi extends Model
{
    use HasFactory;
    protected $table = 'skripsis';

    protected $fillable = ['mahasiswas_id', 'judul', 'tahun', 'dosens_id', 'abstrak', 'kodeskripsis_id', 'status'];

    public function pengumpulan()
    {
        return $this->hasOne(Pengumpulan::class, 'skripsis_id');
    }

    public function mahasiswas()
{
    return $this->belongsTo(Mahasiswa::class, 'mahasiswas_id');
}

    public function dosens()
    {
    return $this->belongsTo(Dosen::class, 'dosens_id');
    }

    public function kodeskripsis()
    {
    return $this->belongsTo(Kodeskripsi::class, 'kodeskripsis_id');
    }

}
