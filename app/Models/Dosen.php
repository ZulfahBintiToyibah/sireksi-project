<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Dosen extends Model
{
    use HasFactory;
    protected $table = "dosens";

    protected $fillable = ['nip','nama', 'prodis_id'];

    public function prodis()
    {
        return $this->belongsTo(Prodi::class);
    }
    
    public function skripsis()
    {
        return $this->hasMany(Skripsi::class);
    }
} 