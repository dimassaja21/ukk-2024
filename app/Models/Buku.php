<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Buku extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function peminjaman()
    {
    return $this->hasMany(Peminjaman::class);
    }

    public function kategori()
    {
        return $this->belongsTo(Kategori::class);
    }
}
