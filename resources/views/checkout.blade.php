@extends('layouts.customer-layout')
@section('title','Checkout')

@section('content')


<div class="max-w-[1000px] mx-auto p-5 font-sans">
    <div class="flex gap-[30px] mt-5 mb-10 items-stretch flex-col md:flex-row">
        
        <!-- Left side: Form -->
        <div class="flex-[2]">
            <form id="checkoutForm" method="POST" action="{{ route('order.confirm') }}">
                @csrf

                <label for="email" class="block mt-[15px] font-bold dark:text-white">Email*</label>
                <input type="email" id="email" name="email" value="{{ Auth::user()->email ?? '' }}" readonly class="w-full p-[10px] mt-[5px] border border-[#ccc] rounded-md bg-gray-100 dark:bg-gray-700 dark:text-white dark:border-gray-600 cursor-not-allowed" required>

                <label class="block mt-[15px] font-bold dark:text-white">Shipping Address</label>
                <div class="flex gap-[5px]">
                    <div class="flex-1">
                        <input type="text" name="first_name" placeholder="First name" required class="w-full p-[10px] mt-[5px] border border-[#ccc] rounded-md dark:bg-gray-700 dark:text-white dark:border-gray-600">
                    </div>
                    <div class="flex-1">
                        <input type="text" name="last_name" placeholder="Last name" required class="w-full p-[10px] mt-[5px] border border-[#ccc] rounded-md dark:bg-gray-700 dark:text-white dark:border-gray-600">
                    </div>
                </div>

                <input type="text" name="address" placeholder="Address" required class="w-full p-[10px] mt-[5px] border border-[#ccc] rounded-md dark:bg-gray-700 dark:text-white dark:border-gray-600">
                <input type="text" name="apartment" placeholder="Apartment, suite, etc. (optional)" class="w-full p-[10px] mt-[5px] border border-[#ccc] rounded-md dark:bg-gray-700 dark:text-white dark:border-gray-600">
                
                <div class="flex gap-[5px]">
                    <div class="flex-1">
                        <input type="text" name="city" placeholder="City" required class="w-full p-[10px] mt-[5px] border border-[#ccc] rounded-md dark:bg-gray-700 dark:text-white dark:border-gray-600">
                    </div>
                    <div class="flex-1">
                        <input type="text" name="postcode" placeholder="Postcode" required class="w-full p-[10px] mt-[5px] border border-[#ccc] rounded-md dark:bg-gray-700 dark:text-white dark:border-gray-600">
                    </div>
                </div>

                <input type="tel" name="phone" placeholder="Phone number (optional)" pattern="[0-9]*" inputmode="numeric" oninput="this.value = this.value.replace(/[^0-9]/g, '')" class="w-full p-[10px] mt-[5px] border border-[#ccc] rounded-md dark:bg-gray-700 dark:text-white dark:border-gray-600">

                <div class="mt-5 flex items-center">
                    <input type="checkbox" id="terms" name="terms" required class="mr-2">
                    <label for="terms" class="m-0 font-normal dark:text-white">I confirm I have read all the terms.</label>
                </div>

                <button type="submit" class="mt-[25px] bg-[#69714a] text-white py-[10px] px-[20px] border-none rounded-md cursor-pointer hover:bg-[#55603a]" @if($total <= 0) disabled style="background-color: #ccc; cursor: not-allowed;" @endif>Confirm Order</button>
            </form>
        </div>

        <!-- Right side: Order Summary -->
        <div class="flex-1 p-5 rounded-lg shadow-md bg-[#dee1d4] dark:bg-gray-800 dark:text-white">
            <h3 class="mb-[15px]">Summary of the Order</h3>
            @foreach($cart as $item)
                <div class="flex justify-between mb-[10px]">
                    <span>{{ $item['name'] }} (x{{ $item['quantity'] }})</span>
                    <span>£{{ number_format($item['price'] * $item['quantity'], 2) }}</span>
                </div>
            @endforeach
            
            <div class="flex justify-between mb-[10px]">
                <span>Shipping</span>
                <span>£0.00</span>
            </div>
            <div class="border-t border-[#ccc] pt-[10px] font-bold">
                <span>Total</span>
                <span>£{{ number_format($total, 2) }}</span>
            </div>
        </div>
    </div>
</div>


@endsection
