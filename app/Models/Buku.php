<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Buku extends Model
{
    use HasFactory;
    protected $table = 'tbl_buku';

    protected $fillable = [
        'judul', 'noisbn', 'penulis', 'penerbit', 'tahun', 'stok', 'harga_pokok', 'harga_jual', 'ppn', 'diskon'
    ];

    public function Pasok()
    {
        return $this->hasMany(Buku::class);
    }
}
