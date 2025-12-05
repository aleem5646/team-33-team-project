<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class BasketController extends Controller
{
    /**
     * Display the user's basket.
     */
    public function index()
    {
        $cart = session()->get('cart', []);
        $subtotal = 0;

        foreach ($cart as $item) {
            $subtotal += $item['price'] * $item['quantity'];
        }

        // Convert array to object for view compatibility if needed, or just pass array
        // The view currently expects $basket->items collection. 
        // We will adapt the view to handle the array directly.
        
        return view('pages.basket', compact('cart', 'subtotal'));
    }

    /**
     * Add an item to the basket.
     * Note: This is now largely handled by ProductController@addToCart for the product page form.
     * But we keep this if needed for other add actions.
     */
    public function add(Request $request)
    {
        // ... (Logic similar to ProductController if needed, but for now we rely on ProductController)
        return redirect()->route('basket.index');
    }

    /**
     * Remove an item from the basket.
     */
    public function remove($itemId)
    {
        $cart = session()->get('cart', []);

        if (isset($cart[$itemId])) {
            unset($cart[$itemId]);
            session()->put('cart', $cart);
        }

        return redirect()->route('basket.index')->with('success', 'Item removed from basket.');
    }

    /**
     * Update item quantity.
     */
    public function update(Request $request, $itemId)
    {
        $request->validate([
            'quantity' => 'required|integer|min:1',
        ]);

        $cart = session()->get('cart', []);

        if (isset($cart[$itemId])) {
            $cart[$itemId]['quantity'] = $request->input('quantity');
            session()->put('cart', $cart);
        }

        return redirect()->route('basket.index')->with('success', 'Basket updated.');
    }
}
