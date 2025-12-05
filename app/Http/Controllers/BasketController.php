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

        $totalCarbonImpact = 0;

        foreach ($cart as $item) {
            $subtotal += $item['price'] * $item['quantity'];
            
            // Calculate carbon impact
            // Assuming carbon_impact is stored in the session cart item, or we need to fetch it from DB if not present
            // Since we just added it to DB, it might not be in the session cart if the item was added before the change
            // But for new items it should be there if we update the addToCart logic.
            // Let's check ProductController::addToCart to see if we are saving it.
            
            // Actually, let's fetch the product to be safe and get the latest carbon impact
            $product = \App\Models\Product::find($item['id']);
            if ($product && $product->carbon_impact) {
                // Parse the numeric part (e.g., "2 ± 0.5" -> 2)
                $impactStr = $product->carbon_impact;
                $impactVal = (float) $impactStr; // PHP's float casting takes the leading number
                $totalCarbonImpact += $impactVal * $item['quantity'];
            }
        }

        return view('pages.basket', compact('cart', 'subtotal', 'totalCarbonImpact'));
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
