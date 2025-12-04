@extends('layouts.customer-layout')

@section('title', 'Basket')

@section('content')
<div class="container mx-auto px-4 py-10">
    <h1 class="text-3xl font-bold mb-8 text-center">Your Basket</h1>

    @if(session('success'))
        <div class="bg-green-100 text-green-800 p-3 mb-4 border border-green-200 rounded">
            {{ session('success') }}
        </div>
    @endif

    @if(session('error'))
        <div class="bg-red-100 text-red-800 p-3 mb-4 border border-red-200 rounded">
            {{ session('error') }}
        </div>
    @endif

    @if(!$basket || $basket->items->isEmpty())
        <div class="text-center py-10">
            <p class="text-xl text-gray-600">Your basket is empty.</p>
            <a href="{{ route('home') }}" class="mt-4 inline-block bg-[#4a5b46] text-white px-6 py-2 rounded hover:bg-[#3a4837] transition">Continue Shopping</a>
        </div>
    @else
        <div class="flex flex-col lg:flex-row gap-8">
            <!-- Left Column: Basket Items -->
            <div class="lg:w-2/3">
                @foreach($basket->items as $item)
                    <div class="flex flex-col sm:flex-row items-center gap-6 border-b border-gray-200 py-6">
                        <!-- Product Image -->
                        <div class="w-32 h-32 flex-shrink-0">
                            <img src="{{ $item->productVariant->product->image_url ?? 'https://via.placeholder.com/150' }}" 
                                 alt="{{ $item->productVariant->product->name }}" 
                                 class="w-full h-full object-cover rounded-md">
                        </div>

                        <!-- Product Details -->
                        <div class="flex-grow text-center sm:text-left">
                            <h3 class="text-lg font-bold text-[#4a5b46]">{{ $item->productVariant->product->name }}</h3>
                            <p class="text-gray-600">{{ $item->productVariant->name }}</p>
                            <p class="text-lg font-semibold mt-1">£{{ number_format($item->productVariant->price, 2) }}</p>
                        </div>

                        <!-- Quantity & Remove -->
                        <div class="flex flex-col items-center gap-3">
                            <form action="{{ route('basket.update', $item->basket_itemId) }}" method="POST" class="flex items-center">
                                @csrf
                                <div class="flex items-center border border-gray-300 rounded">
                                    <button type="button" onclick="decrementQuantity({{ $item->basket_itemId }})" class="px-3 py-1 text-gray-600 hover:bg-gray-100">-</button>
                                    <input type="number" name="quantity" id="quantity-{{ $item->basket_itemId }}" value="{{ $item->quantity }}" min="1" 
                                           class="w-12 text-center border-none focus:ring-0 p-1 appearance-none" onchange="this.form.submit()">
                                    <button type="button" onclick="incrementQuantity({{ $item->basket_itemId }})" class="px-3 py-1 text-gray-600 hover:bg-gray-100">+</button>
                                </div>
                            </form>

                            <form action="{{ route('basket.remove', $item->basket_itemId) }}" method="POST">
                                @csrf
                                <button type="submit" class="text-xs bg-[#8f9e8b] text-white px-3 py-1 rounded hover:bg-[#7a8a76] transition uppercase tracking-wider">
                                    Remove from Cart
                                </button>
                            </form>
                        </div>
                    </div>
                @endforeach
            </div>

            <!-- Right Column: Summary -->
            <div class="lg:w-1/3">
                <div class="bg-[#f9f9f9] p-6 rounded-lg shadow-sm border border-gray-200">
                    <div class="mb-4">
                        <label class="block text-sm font-bold text-gray-700 mb-2">GIFT CARD:</label>
                        <input type="text" class="w-full p-2 border border-gray-300 rounded focus:outline-none focus:border-[#4a5b46]">
                    </div>
                    
                    <div class="mb-4">
                        <label class="block text-sm font-bold text-gray-700 mb-2">DISCOUNT CODE:</label>
                        <input type="text" class="w-full p-2 border border-gray-300 rounded focus:outline-none focus:border-[#4a5b46]">
                    </div>

                    <div class="mb-4 flex items-center justify-between">
                        <label class="block text-sm font-bold text-gray-700">TOTAL:</label>
                        <div class="w-1/2 p-2 bg-white border border-gray-300 rounded text-right font-bold">
                            £{{ number_format($subtotal, 2) }}
                        </div>
                    </div>

                    <div class="mb-6 flex items-center justify-between">
                        <label class="block text-sm font-bold text-gray-700">ESTIMATED CARBON IMPACT:</label>
                        <div class="w-1/3 p-2 bg-white border border-gray-300 rounded text-right text-green-600 font-semibold">
                            -2.5kg
                        </div>
                    </div>

                    <button class="w-full bg-[#3e4c3b] text-white font-bold py-3 px-4 rounded hover:bg-[#2e3c2b] transition duration-300 uppercase">
                        Submit Order
                    </button>
                </div>
            </div>
        </div>
    @endif
</div>

<script>
    function incrementQuantity(itemId) {
        const input = document.getElementById('quantity-' + itemId);
        input.value = parseInt(input.value) + 1;
        input.form.submit();
    }

    function decrementQuantity(itemId) {
        const input = document.getElementById('quantity-' + itemId);
        if (parseInt(input.value) > 1) {
            input.value = parseInt(input.value) - 1;
            input.form.submit();
        }
    }
</script>
@endsection
