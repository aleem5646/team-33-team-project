<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function show($id)
    {
        return view('pages.product-detail');
    }

    public function addToCart(Request $request)
    {
        return back()->with('status', 'Added to cart!');
    }
}
