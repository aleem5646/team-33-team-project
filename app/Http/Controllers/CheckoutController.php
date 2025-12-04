<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CheckoutController extends Controller
{
    public function showForm()
    {
        return view('checkout');
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

        return back()->with('status', 'Order confirmed!');
    }
}
