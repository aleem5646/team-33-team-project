@extends('layouts.customer-layout')

@section('title', 'Order Confirmed')

@section('content')
<div class="container mx-auto px-4 py-16 text-center">
    <div class="bg-white p-8 rounded-lg shadow-md max-w-2xl mx-auto border border-[#dee1d4]">
        <div class="mb-6 text-[#69714a]">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-24 w-24 mx-auto" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
            </svg>
        </div>
        
        <h1 class="text-4xl font-bold text-gray-800 mb-4">Thank You!</h1>
        <p class="text-xl text-gray-600 mb-8">Your order has been placed successfully.</p>
        
        <a href="{{ route('products.index') }}" class="inline-block bg-[#69714a] text-white font-bold py-3 px-8 rounded-md hover:bg-[#55603a] transition duration-300 uppercase tracking-wide">
            Continue Shopping
        </a>
    </div>
</div>
@endsection
