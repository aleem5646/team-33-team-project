<?php

namespace App\Http\Controllers;

class AdminProductController extends Controller
{
    public function index()
    {
        // Load your static product array
        include resource_path('views/data/products.blade.php');

        // Pass it to the admin view
        return view('admin.product-list', [
            'products' => $products
        ]);
    }
}
