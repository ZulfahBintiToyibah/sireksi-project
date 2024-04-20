<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Skripsi extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function mahasiswas()
{
    return $this->belongsTo(Mahasiswa::class);
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
