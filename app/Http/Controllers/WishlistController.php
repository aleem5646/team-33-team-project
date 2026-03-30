<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class WishlistController extends Controller
{
    public function index()
    {
        include resource_path('views/data/products.blade.php');

        // Example placeholder wishlist IDs
        $wishlist = [1, 4, 12];

        return view('pages.wishlist', compact('products', 'wishlist'));
    }

    public function toggle($productId)
    {
        return back()->with('success', 'Wishlist updated.');
    }

    public function remove($productId)
    {
        return back()->with('success', 'Item removed from wishlist.');
    }
}
