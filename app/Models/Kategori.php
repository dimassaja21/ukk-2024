<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kategori extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function peminjaman()
    {
        return $this->hasMany(Peminjaman::class);
    }

    public function buku()
    {
        return $this->hasMany(Buku::class);
    }
}
