<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProfileController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        
        $orders = $user->orders()->with('items.productVariant.product')->orderBy('created_at', 'desc')->get(); 
        
        $sustainabilityScore = 0;
        foreach ($orders as $order) {
            foreach ($order->items as $item) {
                // Access product via productVariant
                if ($item->productVariant && $item->productVariant->product && $item->productVariant->product->carbon_impact) {
                    $impactVal = (float) $item->productVariant->product->carbon_impact;
                    $sustainabilityScore += $impactVal * $item->quantity;
                }
            }
        }

        return view('pages.profile', compact('user', 'orders', 'sustainabilityScore'));
    }
    public function edit()
    {
        $user = Auth::user();
        return view('pages.edit-profile', compact('user'));
    }

    public function update(Request $request)
    {
        $user = Auth::user();

        $request->validate([
            'first_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'email' => 'required|email|max:255|unique:users,email,' . $user->userId . ',userId',
            'phone' => 'nullable|string|max:20',
            'address_line' => 'nullable|string|max:255',
            'city' => 'nullable|string|max:255',
            'postcode' => 'nullable|string|max:20',
            'country' => 'nullable|string|max:255',
        ]);

        $user->update($request->all());

        return redirect()->route('profile')->with('success', 'Profile updated successfully!');
    }
}
