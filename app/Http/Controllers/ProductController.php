<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\harga;
use App\Models\kategori_product;
use App\Models\resep;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ProductController extends Controller
{
    public function index()
    {
        $data = [
            'title' => 'Product',
            'product' => Product::with('kategori')->orderBy('id_product', 'DESC')->get(),
            'kategori' => kategori_product::where('id_lokasi', '1')->get(),
            'point' => DB::table('point')->get(),
            'station' => DB::table('station')->get(),
        ];
        return view("produk.index", $data);
    }

    public function store(Request $request)
    {
        if ($request->hasFile('image')) {
            $request->file('image')->move('img/produk/', $request->file('image')->getClientOriginalName());
            $foto = $request->file('image')->getClientOriginalName();
        } else {
            $foto = 'default_product.png';
        }
        $data = [
            'sku' => $request->sku,
            'nm_product' => $request->nm_produk,
            'id_type' => $request->id_type,
            'id_kategori' => $request->id_kategori,
            'id_point' => $request->id_point,
            'id_station' => $request->id_station,
            'image' => $foto,
            'is_active' => '1',
            'id_lokasi' => '1'
        ];
        $product = Product::create($data);
        $id_product = $product->id;

        for ($x = 0; $x < count($request->harga); $x++) {
            $data = [
                'id_products' => $id_product,
                'harga' => $request->harga[$x],
                'id_distribusi' => $request->id_distibusi[$x],
            ];
            harga::create($data);
        }

        for ($x = 0; $x < count($request->id_bahan); $x++) {
            if (!empty($request->id_bahan[$x])) {
                $data = [
                    'id_produk' => $id_product,
                    'id_bahan' => $request->id_bahan[$x],
                    'qty' => $request->qty_resep[$x],
                    'id_satuan_resep' => $request->id_satuan_resep[$x],
                ];
                resep::create($data);
            }
        }



        return redirect()->route('produk');
    }

    public function tambah_harga(Request $r)
    {
        $data = [
            'count' => $r->count,
        ];
        return view('produk.tbh_harga', $data);
    }
    public function tambah_resep(Request $r)
    {
        $data = [
            'count' => $r->count,
        ];
        return view('produk.tbh_resep', $data);
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
