@extends('layouts.customer-layout')
@section('title', 'Edit Order')

@section('content')
<div class="container mx-auto px-4 py-8">
    <div class="max-w-2xl mx-auto bg-white dark:bg-gray-800 p-8 rounded-lg shadow-md border border-black/5">
        <h1 class="text-3xl font-bold text-black dark:text-white uppercase tracking-tight mb-8">Edit Order #{{ $order->orderId }}</h1>

        <form action="{{ route('admin.orders.update', $order->orderId) }}" method="POST" class="space-y-6">
            @csrf
            @method('PUT')

            <div>
                <label class="block text-sm font-bold uppercase text-gray-700 dark:text-gray-300 mb-2">Order Status</label>
                <select name="status" class="w-full border-2 border-black/10 rounded-lg px-4 py-2 focus:border-[#9ba389] outline-none dark:bg-gray-700 dark:text-white appearance-none cursor-pointer">
                    <option value="pending" {{ $order->status == 'pending' ? 'selected' : '' }}>Pending</option>
                    <option value="processing" {{ $order->status == 'processing' ? 'selected' : '' }}>Processing</option>
                    <option value="shipped" {{ $order->status == 'shipped' ? 'selected' : '' }}>Shipped</option>
                    <option value="completed" {{ $order->status == 'completed' ? 'selected' : '' }}>Completed</option>
                    <option value="cancelled" {{ $order->status == 'cancelled' ? 'selected' : '' }}>Cancelled</option>
                </select>
                @error('status') <p class="text-red-500 text-xs mt-1">{{ $message }}</p> @enderror
            </div>

            <div>
                <label class="block text-sm font-bold uppercase text-gray-700 dark:text-gray-300 mb-2">Shipping Address</label>
                <textarea name="shipping_address" rows="4" 
                    class="w-full border-2 border-black/10 rounded-lg px-4 py-2 focus:border-[#9ba389] outline-none dark:bg-gray-700 dark:text-white">{{ old('shipping_address', $order->shipping_address) }}</textarea>
                @error('shipping_address') <p class="text-red-500 text-xs mt-1">{{ $message }}</p> @enderror
            </div>

            <div class="flex justify-between pt-6">
                <a href="{{ route('admin.orders.index') }}" class="bg-gray-500 hover:bg-gray-600 text-white px-6 py-2 rounded-lg transition duration-300 uppercase font-bold tracking-widest text-sm">Cancel</a>
                <button type="submit" class="bg-[#9ba389] hover:bg-[#8a916a] text-white px-8 py-2 rounded-lg transition duration-300 uppercase font-bold tracking-widest text-sm shadow-md">Update Order</button>
            </div>
        </form>
    </div>
</div>
@endsection