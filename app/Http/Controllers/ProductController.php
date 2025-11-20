<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function show($id)
    {
        // For now, just return the static product view
        return view('product-detail');
    }

    public function addToCart(Request $request)
    {
        // Later you can add real cart logic here
        return back()->with('status', 'Added to cart!');
    }
}
