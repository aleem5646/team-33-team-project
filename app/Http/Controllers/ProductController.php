<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Category;

class ProductController extends Controller
{
    public function index(Request $request)
    {
        $query = Product::with('category');

        // Search Logic
        if ($request->filled('search')) {
            $search = $request->input('search');
            $query->where(function($q) use ($search) {
                $q->where('name', 'like', "%{$search}%")
                  ->orWhere('description', 'like', "%{$search}%");
            });
        }

        // Category Filter Logic
        if ($request->filled('category')) {
            $query->where('categoryId', $request->input('category'));
        }

        // Attribute Filter Logic (Fair Trade, Low Carbon)
        if ($request->filled('filters')) {
            $filters = $request->input('filters');
            $query->whereHas('filters', function($q) use ($filters) {
                $q->whereIn('product_filters.filterId', $filters);
            });
        }

        // Sorting Logic
        if ($request->filled('sort')) {
            $sort = $request->input('sort');
            if ($sort === 'price_asc') {
                $query->orderBy('price', 'asc');
            } elseif ($sort === 'price_desc') {
                $query->orderBy('price', 'desc');
            }
        }

        $products = $query->paginate(9)->withQueryString();

        return view('pages.auth.product-listing', compact('products'));
    }

    public function show($id)
    {
        $product = Product::with(['category', 'reviews', 'filters'])->where('productId', $id)->firstOrFail();
        return view('pages.product-detail', compact('product'));
    }

    public function addToCart(Request $request)
    {
        if (!auth()->check()) {
            return redirect()->route('login')->with('error', 'Please login to add items to cart.');
        }

        $productId = $request->input('product_id');
        $quantity = $request->input('quantity', 1);

        $product = Product::find($productId);

        if (!$product) {
            return back()->with('error', 'Product not found!');
        }

        $cart = session()->get('cart', []);

        if (isset($cart[$productId])) {
            $cart[$productId]['quantity'] += $quantity;
        } else {
            $cart[$productId] = [
                'id' => $product->productId,
                'name' => $product->name,
                'price' => $product->price,
                'image' => $product->image_url, 
                'quantity' => $quantity,
                'variant' => 'default' // Placeholder
            ];
        }

        session()->put('cart', $cart);

        return back()->with('status', 'Added to cart!');
    }
}