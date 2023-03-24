<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    protected $table = 'products';
    protected $fillable = [
        'nm_product', 'sku', 'id_kategori', 'jenis', 'is_active', 'id_lokasi', 'image', 'id_station', 'monitoring'
    ];
    public function kategori()
    {
        return $this->belongsTo(kategori_product::class, 'id_kategori', 'id_kategori_products');
    }
}
