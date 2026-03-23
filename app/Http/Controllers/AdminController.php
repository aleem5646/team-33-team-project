<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Order;
use App\Models\User;
use App\Models\OrderItem;
use Illuminate\Support\Facades\DB;

class AdminController extends Controller
{
    public function dashboard()
    {
        return view('admin.dashboard');
    }

    public function reports()
    {
        $totalSales = Order::sum('total_price');
        $totalOrders = Order::count();
        $totalCustomers = User::where('user_type', 'customer')->count();
        
        // Calculate CO2 saved: quantity * carbon_impact of the product
        $totalCO2Saved = OrderItem::join('product_variants', 'order_items.product_variantId', '=', 'product_variants.product_variantId')
            ->join('products', 'product_variants.productId', '=', 'products.productId')
            ->sum(DB::raw('order_items.quantity * products.carbon_impact'));

        $averageOrderValue = $totalOrders > 0 ? $totalSales / $totalOrders : 0;
        $totalItemsSold = OrderItem::sum('quantity');

        return view('admin.reports', compact(
            'totalSales', 
            'totalOrders', 
            'totalCustomers', 
            'totalCO2Saved', 
            'averageOrderValue',
            'totalItemsSold'
        ));
    }

    public function customers(Request $request)
    {
        $query = User::where('user_type', 'customer')
            ->withCount('orders');

        // Search by email
        if ($request->has('search')) {
            $search = $request->input('search');
            $query->where('email', 'LIKE', "%{$search}%");
        }

        // Filter by newest, oldest, or most orders
        $filter = $request->input('filter', 'newest');
        if ($filter === 'newest') {
            $query->orderBy('userId', 'desc'); 
        } elseif ($filter === 'oldest') {
            $query->orderBy('userId', 'asc');
        } elseif ($filter === 'orders_desc') {
            $query->orderBy('orders_count', 'desc');
        }

        $customers = $query->paginate(10);

        return view('admin.customers', compact('customers', 'filter'));
    }

    public function showCustomer($id)
    {
        // Placeholder for customer details page
        return redirect()->route('admin.dashboard')->with('info', 'Customer details page is coming soon.');
    }
}