<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pelanggan extends Model
{
    use HasFactory;

    protected $table = 'pelanggan';
    protected $fillable = ['nama', 'alamat', 'no_tlp'];


    public function pesan()
    {
        return $this->hasMany(Pesan::class);
    }
}
