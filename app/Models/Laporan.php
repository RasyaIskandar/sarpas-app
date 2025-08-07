<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Laporan extends Model
{
     use HasFactory;

    protected $fillable = [
        'user_id', 'nama_barang', 'deskripsi', 'media', 'status', 'tanggal_lapor',
    ];

     protected $casts = [
        'tanggal_lapor' => 'datetime',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
