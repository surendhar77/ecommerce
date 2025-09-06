<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $path = public_path('api/detailedproducts.json');
        $jsonData = json_decode(file_get_contents($path), true);

        $products = $jsonData['products']; // access the 'products' array

        return view('home', compact('products'));
    }
}
