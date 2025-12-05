<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Product;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::all();
        return view('pages.products', compact('products'));
    }

    public function show($id)
    {
        return view('pages.product-detail');
    }

    public function addToCart(Request $request)
    {
        return back()->with('status', 'Added to cart!');
    }
}
