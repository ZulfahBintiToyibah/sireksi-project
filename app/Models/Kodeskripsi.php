<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kodeskripsi extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    public function skripsis()
    {
        return $this->hasMany(Skripsi::class);
    }
}