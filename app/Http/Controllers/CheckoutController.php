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

        // Clear the cart session
        session()->forget('cart');

        return redirect()->route('order.confirmation');
    }

    public function confirmation()
    {
        return view('pages.order-confirmation');
    }
}
