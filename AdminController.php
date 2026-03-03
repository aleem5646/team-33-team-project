<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function dashboard()
    {
        return view('admin.dashboard');
    }

    public function customers(Request $request)
    {
        $search = trim((string) $request->input('search', ''));
        $sort = $request->input('sort', 'most_recent');

        $customersQuery = User::query()
            ->where('user_type', 'customer')
            ->withCount('orders');

        if ($search !== '') {
            $customersQuery->where(function ($query) use ($search) {
                $query->where('first_name', 'like', "%{$search}%")
                    ->orWhere('last_name', 'like', "%{$search}%")
                    ->orWhereRaw("CONCAT(first_name, ' ', last_name) like ?", ["%{$search}%"])
                    ->orWhere('email', 'like', "%{$search}%");
            });
        }

        if ($sort === 'oldest') {
            $customersQuery->orderBy('userId', 'asc');
        } else {
            $customersQuery->orderBy('userId', 'desc');
        }

        $customers = $customersQuery->paginate(10)->withQueryString();

        return view('admin.customers.index', compact('customers', 'search', 'sort'));
    }

    public function showCustomer(User $customer)
    {
        abort_if($customer->user_type !== 'customer', 404);

        $customer->loadCount('orders');

        return view('admin.customers.show', compact('customer'));
    }
}
