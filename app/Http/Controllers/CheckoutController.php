<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CheckoutController extends Controller
{
    public function showForm()
    {
        $cart = session()->get('cart', []);
        $total = 0;
        foreach ($cart as $item) {
            $total += $item['price'] * $item['quantity'];
        }

        return view('checkout', compact('cart', 'total'));
    }

    public function confirmOrder(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'first_name' => 'required',
            'last_name' => 'required',
            'address' => 'required',
            'city' => 'required',
            'postcode' => 'required',
            'terms' => 'accepted',
        ]);

        $cart = session()->get('cart', []);
        if (empty($cart)) {
            return redirect()->back()->with('error', 'Your cart is empty.');
        }

        $total = 0;
        foreach ($cart as $item) {
            $total += $item['price'] * $item['quantity'];
        }

        // Create Order
        $order = \App\Models\Order::create([
            'userId' => \Illuminate\Support\Facades\Auth::id(),
            'shipping_address' => $request->address . ', ' . $request->city . ', ' . $request->postcode,
            'transactionId' => \Illuminate\Support\Str::uuid(), // Dummy transaction ID
            'total_price' => $total,
            'status' => 'pending',
        ]);

        // Create Order Items
        foreach ($cart as $id => $item) {
            // Find the default variant for this product
            // Since we are using hardcoded products in session, we need to find the corresponding variant in DB.
            // We seeded them with ProductSeeder.
            $variant = \App\Models\ProductVariant::where('productId', $id)->first();

            if ($variant) {
                \App\Models\OrderItem::create([
                    'orderId' => $order->orderId,
                    'product_variantId' => $variant->product_variantId,
                    'quantity' => $item['quantity'],
                    'price' => $item['price'],
                ]);
            }
        }

        // Clear the cart session
        session()->forget('cart');

        return redirect()->route('order.confirmation');
    }

    public function confirmation()
    {
        return view('pages.order-confirmation');
    }
}
