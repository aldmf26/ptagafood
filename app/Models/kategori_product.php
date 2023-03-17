<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class kategori_product extends Model
{
    use HasFactory;
    protected $table = 'kategori_product';
    protected $fillable = [
        'nm_kategori_product', 'id_lokasi'
    ];
}
