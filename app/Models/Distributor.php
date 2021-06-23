<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Distributor extends Model
{
    use HasFactory;
    protected $table = 'tbl_distributor';

    protected $fillable = [
       'nama_distributor', 'alamat', 'telpon'
    ];

    public function Pasok()
    {
        return $this->hasMany(Pasok::class);
    }
}
