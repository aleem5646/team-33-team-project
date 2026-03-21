<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;

class CustomerController extends Controller
{
    public function show($id)
    {
        $customer = User::query()
            ->where('user_type', 'customer')
            ->with(['orders' => fn ($query) => $query->latest('created_at')])
            ->withCount('orders')
            ->findOrFail($id);

        $orders = $customer->orders;
        $customerStats = [
            'total_orders' => $customer->orders_count,
            'total_spent' => (float) $orders->sum('total_price'),
            'last_order_date' => optional($orders->first()?->created_at),
        ];

        $customerAddresses = collect();

        if (filled($customer->address_line) || filled($customer->city) || filled($customer->postcode) || filled($customer->country)) {
            $customerAddresses->push([
                'street' => $customer->address_line,
                'city' => $customer->city,
                'state' => $customer->country,
                'zip' => $customer->postcode,
            ]);
        }

        return view('admin.customers.show', compact('customer', 'customerStats', 'customerAddresses'));
    }
}