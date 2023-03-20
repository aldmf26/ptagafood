<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class resep extends Model
{
    use HasFactory;
    protected $table = 'resep';
    protected $fillable = [
        'id_produk', 'qty', 'id_satuan_resep', 'id_produk', 'id_bahan'
    ];
}
