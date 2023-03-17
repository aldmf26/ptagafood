<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\harga;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index()
    {
        $data = [
            'title' => 'Product',
            'product' => Product::with('kategori')->get(),
        ];



        return view("produk.index", $data);
    }

    public function store(Request $request)
    {
        //
    }

    public function show(Product $product)
    {
        //
    }


    public function update(Request $request, Product $product)
    {
        //
    }

    public function destroy(Product $product)
    {
        //
    }
}
