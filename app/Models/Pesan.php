<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pesan extends Model
{
    use HasFactory;

    // Kalau nama tabel kamu memang 'pesan' (bentuk tunggal), wajib dideklarasikan
    protected $table = 'pesan';

    // Mass assignment
    protected $fillable = [
        'pelanggan_id',
        'makanan_id',
        'minuman_id',
    ];

    // Relasi ke Pelanggan
    public function pelanggan()
    {
        return $this->belongsTo(Pelanggan::class);
    }

    // Relasi ke Makanan
    public function makanan()
    {
        return $this->belongsTo(Makanan::class);
    }

    // Relasi ke Minuman
    public function minuman()
    {
        return $this->belongsTo(Minuman::class);
    }
}
