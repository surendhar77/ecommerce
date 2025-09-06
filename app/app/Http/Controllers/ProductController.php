<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Support\Facades\File;


class ProductController extends Controller
{
    public function index()
    {
        $products = Product::all();
        return view('products.index', compact('products'));
    }

    // public function show($id)
    // {
    //     $product = Product::findOrFail($id);
    //     return view('products.show', compact('product'));
    // }
    private function fetchProducts()
    {
        $path = public_path('api/detailedproducts.json');

        if (!File::exists($path)) {
            return collect();
        }

        $json = File::get($path);
        $data = json_decode($json, true);
        return collect($data['products'] ?? []);
        // return collect($data['items'][0] ?? []);
    }

    public function show($id)
    {
        $product = $this->fetchProducts()->where('id', $id)->first();

        // dd($product); // now it will return the product details
        // // dd($product);
        // dd($id);
        if (!$product) {
            abort(404, 'Product not found');
        }

        $usdToInr = 83;

        return view('products.show', compact('product', 'usdToInr'));
    }
}
