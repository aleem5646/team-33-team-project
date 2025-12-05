@extends('layouts.customer-layout')

@section('title', 'Products')

@section('content')
<div class="container mx-auto px-4 py-10">
    <h1 class="text-3xl font-bold text-center mb-10 uppercase">Our Products</h1>

    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-8">
        @forelse($products as $product)
            <div class="bg-white rounded-lg shadow-md overflow-hidden hover:shadow-lg transition-shadow duration-300 border border-gray-200">
                <a href="{{ route('product.show', $product->productId) }}">
                    <img src="{{ $product->image_url ?? asset('imgs/placeholder.jpg') }}" 
                         alt="{{ $product->name }}" 
                         class="w-full h-64 object-cover">
                </a>
                <div class="p-6">
                    <h3 class="text-xl font-bold mb-2 text-gray-900">
                        <a href="{{ route('product.show', $product->productId) }}" class="hover:text-[#3e4c24]">
                            {{ $product->name }}
                        </a>
                    </h3>
                    <p class="text-gray-600 mb-4 line-clamp-2">{{ $product->description }}</p>
                    <div class="flex justify-between items-center">
                        <span class="text-lg font-bold text-[#3e4c24]">£{{ number_format($product->price, 2) }}</span>
                        <form action="{{ route('cart.add') }}" method="POST">
                            @csrf
                            <input type="hidden" name="product_id" value="{{ $product->productId }}">
                            <button type="submit" class="bg-[#3e4c24] text-white px-4 py-2 rounded hover:bg-[#2e3a1b] transition">
                                Add to Cart
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        @empty
            <div class="col-span-full text-center py-10">
                <p class="text-gray-500 text-lg">No products found.</p>
            </div>
        @endforelse
    </div>
</div>
@endsection
