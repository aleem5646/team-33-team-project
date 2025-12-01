<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Order;
use App\Models\ReturnModel;
use App\Models\OrderItem;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class ReturnController extends Controller
{
    public function index()
    {
        return view('pages.return');
    }

    public function checkOrder(Request $request)
    {
        $request->validate([
            'order_number' => 'required|integer|exists:orders,orderId'
        ]);

        $order = Order::with('items.productVariant.product')->find($request->order_number);

        if (!$order) {
            return response()->json(['valid' => false, 'message' => 'Order not found.'], 404);
        }

        // Format items for the frontend
        $items = $order->items->map(function($item) {
            $productName = $item->productVariant->product->name ?? 'Unknown Product';
            $variantName = $item->productVariant->value ?? '';
            
            return [
                'id' => $item->order_itemId,
                'name' => $productName . ($variantName ? " ($variantName)" : ''),
                'price' => $item->price,
                'quantity' => $item->quantity
            ];
        });

        return response()->json([
            'valid' => true,
            'items' => $items
        ]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'order_item_id' => 'required|exists:order_items,order_itemId',
            'comment' => 'required|string|max:1000',
            'file' => 'nullable|file|mimes:jpg,jpeg,png,pdf|max:2048',
            'terms' => 'accepted',
        ]);

        $imagePath = null;
        if ($request->hasFile('file')) {
            $imagePath = $request->file('file')->store('returns', 'public');
        }

        ReturnModel::create([
            'order_itemId' => $request->order_item_id,
            'userId' => Auth::id(), // Nullable if guest
            'reason' => $request->comment,
            'image_path' => $imagePath,
            'status' => 'Requested',
        ]);

        return redirect()->back()->with('status', 'Return request submitted successfully!');
    }
}
