<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Basket;
use App\Models\BasketItem;
use App\Models\ProductVariant;
use Illuminate\Support\Facades\Auth;

class BasketController extends Controller
{
    /**
     * Display the user's basket.
     */
    public function index()
    {
        $user = Auth::user();
        
        if (!$user) {
            return redirect()->route('login')->with('error', 'Please login to view your basket.');
        }

        $basket = Basket::where('userId', $user->userId)->with(['items.productVariant.product'])->first();

        // Calculate totals
        $subtotal = 0;
        if ($basket) {
            foreach ($basket->items as $item) {
                $subtotal += $item->productVariant->price * $item->quantity;
            }
        }

        return view('pages.basket', compact('basket', 'subtotal'));
    }

    /**
     * Add an item to the basket.
     */
    public function add(Request $request)
    {
        $request->validate([
            'product_variant_id' => 'required|exists:product_variants,product_variantId',
            'quantity' => 'required|integer|min:1',
        ]);

        $user = Auth::user();
        if (!$user) {
            return redirect()->route('login')->with('error', 'Please login to add items to your basket.');
        }

        // Get or create basket for user
        $basket = Basket::firstOrCreate(['userId' => $user->userId]);

        // Check if item already exists in basket
        $basketItem = BasketItem::where('basketId', $basket->basketId)
                                ->where('product_variantId', $request->product_variant_id)
                                ->first();

        if ($basketItem) {
            $basketItem->quantity += $request->quantity;
            $basketItem->save();
        } else {
            BasketItem::create([
                'basketId' => $basket->basketId,
                'product_variantId' => $request->product_variant_id,
                'quantity' => $request->quantity,
            ]);
        }

        return redirect()->route('basket.index')->with('success', 'Item added to basket!');
    }

    /**
     * Remove an item from the basket.
     */
    public function remove($itemId)
    {
        $user = Auth::user();
        if (!$user) {
            return redirect()->route('login');
        }

        $basket = Basket::where('userId', $user->userId)->first();
        
        if ($basket) {
            BasketItem::where('basketId', $basket->basketId)
                      ->where('basket_itemId', $itemId)
                      ->delete();
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

        $user = Auth::user();
        if (!$user) {
            return redirect()->route('login');
        }

        $basket = Basket::where('userId', $user->userId)->first();

        if ($basket) {
            $basketItem = BasketItem::where('basketId', $basket->basketId)
                                    ->where('basket_itemId', $itemId)
                                    ->first();
            
            if ($basketItem) {
                $basketItem->quantity = $request->quantity;
                $basketItem->save();
            }
        }

        return redirect()->route('basket.index')->with('success', 'Basket updated.');
    }
}
