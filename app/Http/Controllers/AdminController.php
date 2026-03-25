<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Product;
use App\Models\Category;
use App\Models\ProductVariant;
use App\Models\User;
use App\Models\Order;
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
        if ($request->has('search') && !empty($request->input('search'))) {
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

    public function orders(Request $request)
    {
        $query = Order::query();

        // Search by order ID
        if ($request->has('search') && !empty($request->input('search'))) {
            $search = $request->input('search');
            $query->where('orderId', 'LIKE', "%{$search}%");
        }

        // Filter by newest, oldest
        $filter = $request->input('filter', 'newest');
        if ($filter === 'newest') {
            $query->orderBy('created_at', 'desc');
        } elseif ($filter === 'oldest') {
            $query->orderBy('created_at', 'asc');
        }

        $orders = $query->paginate(10);

        return view('admin.orders', compact('orders', 'filter'));
    }

    public function editCustomer($id)
    {
        $customer = User::findOrFail($id);
        return view('admin.edit-customer', compact('customer'));
    }

    public function updateCustomer(Request $request, $id)
    {
        $customer = User::findOrFail($id);
        $request->validate([
            'first_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email,' . $id . ',userId',
            'address_line' => 'nullable|string|max:255',
            'city' => 'nullable|string|max:255',
            'postcode' => 'nullable|string|max:20',
            'country' => 'nullable|string|max:255',
        ]);

        $customer->update($request->all());
        return redirect()->route('admin.customers.index')->with('success', 'Customer updated successfully.');
    }

    public function editOrder($id)
    {
        $order = Order::findOrFail($id);
        return view('admin.edit-order', compact('order'));
    }

    public function updateOrder(Request $request, $id)
    {
        $order = Order::findOrFail($id);
        $request->validate([
            'status' => 'required|string|in:pending,processing,shipped,completed,cancelled',
            'shipping_address' => 'required|string|max:500',
        ]);

        $order->update($request->only(['status', 'shipping_address']));
        return redirect()->route('admin.orders.index')->with('success', 'Order updated successfully.');
    }

    public function products(Request $request)
    {
        $query = Product::with('category', 'variants');

        if ($request->has('search') && !empty($request->input('search'))) {
            $search = $request->input('search');
            $query->where('name', 'LIKE', "%{$search}%");
        }

        $products = $query->paginate(10);
        return view('admin.products', compact('products'));
    }

    public function createProduct()
    {
        $categories = Category::all();
        return view('admin.create-product', compact('categories'));
    }

    public function storeProduct(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255|unique:products,name',
            'categoryId' => 'required|exists:categories,categoryId',
            'price' => 'required|numeric|min:0',
            'description' => 'nullable|string',
            'carbon_impact' => 'nullable|numeric',
        ]);

        $data = $request->all();
        // Set a default image URL if none is provided
        if (!isset($data['image_url'])) {
            $data['image_url'] = 'imgs/Solara_Logo.png'; 
        }

        Product::create($data);
        return redirect()->route('admin.products.index')->with('success', 'Product created successfully.');
    }

    public function editProduct($id)
    {
        $product = Product::with('variants')->findOrFail($id);
        $categories = Category::all();
        return view('admin.edit-product', compact('product', 'categories'));
    }

    public function updateProduct(Request $request, $id)
    {
        $product = Product::findOrFail($id);
        $request->validate([
            'name' => 'required|string|max:255|unique:products,name,' . $id . ',productId',
            'categoryId' => 'required|exists:categories,categoryId',
            'price' => 'required|numeric|min:0',
            'description' => 'nullable|string',
            'carbon_impact' => 'nullable|numeric',
        ]);

        $product->update($request->all());

        // Update stock for variants if provided
        if ($request->has('variants')) {
            foreach ($request->input('variants') as $variantId => $data) {
                ProductVariant::where('product_variantId', $variantId)
                    ->where('productId', $id)
                    ->update(['count' => $data['count']]);
            }
        }

        return redirect()->route('admin.products.index')->with('success', 'Product updated successfully.');
    }

    public function destroyProduct($id)
    {
        $product = Product::findOrFail($id);
        $product->delete();
        return redirect()->route('admin.products.index')->with('success', 'Product deleted successfully.');
    }

    public function showCustomer($id)
    {
        // Placeholder for customer details page
        return redirect()->route('admin.dashboard')->with('info', 'Customer details page is coming soon.');
    }
}