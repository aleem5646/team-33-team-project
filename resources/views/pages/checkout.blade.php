@extends('layouts.customer-layout')
@section('title','Checkout')

@section('content')

<div class="max-w-[1000px] mx-auto p-5 font-sans">

    <div class="flex gap-8 mt-5 mb-10 items-stretch">

        <!-- Left side: Form -->
        <div class="flex-[2]">
            <form id="checkoutForm" method="POST" action="{{ route('order.confirm') }}">
                @csrf

                <label for="email" class="block mt-4 font-bold">Email*</label>
                <input type="email"
                       id="email"
                       name="email"
                       placeholder="name@example.com"
                       required
                       class="w-full p-2 mt-1 border border-[#ccc] rounded-md">

                <label class="block mt-4 font-bold">Shipping Address</label>

                <div class="flex gap-2">
                    <div class="flex-1">
                        <input type="text"
                               name="first_name"
                               placeholder="First name"
                               required
                               class="w-full p-2 mt-1 border border-[#ccc] rounded-md">
                    </div>
                    <div class="flex-1">
                        <input type="text"
                               name="last_name"
                               placeholder="Last name"
                               required
                               class="w-full p-2 mt-1 border border-[#ccc] rounded-md">
                    </div>
                </div>

                <input type="text"
                       name="address"
                       placeholder="Address"
                       required
                       class="w-full p-2 mt-4 border border-[#ccc] rounded-md">

                <input type="text"
                       name="apartment"
                       placeholder="Apartment, suite, etc. (optional)"
                       class="w-full p-2 mt-4 border border-[#ccc] rounded-md">

                <div class="flex gap-2 mt-4">
                    <div class="flex-1">
                        <input type="text"
                               name="city"
                               placeholder="City"
                               required
                               class="w-full p-2 border border-[#ccc] rounded-md">
                    </div>
                    <div class="flex-1">
                        <input type="text"
                               name="postcode"
                               placeholder="Postcode"
                               required
                               class="w-full p-2 border border-[#ccc] rounded-md">
                    </div>
                </div>

                <input type="tel"
                       name="phone"
                       placeholder="Phone number (optional)"
                       class="w-full p-2 mt-4 border border-[#ccc] rounded-md">

                <div class="flex items-center mt-5">
                    <input type="checkbox" id="terms" name="terms" required class="mr-2">
                    <label for="terms" class="font-normal">I confirm I have read all the terms.</label>
                </div>

                <!-- Confirm Order Button -->
                <button type="submit"
                        class="mt-6 text-white py-2 px-4 rounded-md transition"
                        style="background:#2f6f3e !important; display:inline-block !important;">
                    Confirm Order
                </button>

            </form>
        </div>

        <!-- Right side: Order Summary -->
        <div class="flex-1 bg-[#dee1d4] p-5 rounded-lg shadow-md">
            <h3 class="font-bold mb-4 text-lg">Summary of the Order</h3>

            <div class="flex justify-between mb-2">
                <span>Item Name</span>
                <span>£0.00</span>
            </div>

            <div class="flex justify-between mb-2">
                <span>Quantity</span>
                <span>0</span>
            </div>

            <div class="flex justify-between mb-2">
                <span>Shipping</span>
                <span>£0.00</span>
            </div>

            <div class="flex justify-between border-t border-[#ccc] pt-3 font-bold mt-3">
                <span>Total</span>
                <span>£0.00</span>
            </div>
        </div>

    </div>
</div>

<!-- Thank You Popup -->
<div id="thankYouPopup"
     class="hidden fixed top-1/2 left-1/2 -translate-x-1/2 -translate-y-1/2 bg-[#d4edda] text-[#155724] p-5 rounded-lg shadow-lg z-[1000] text-center">
    🎉 Thank you! Your order has been confirmed.
</div>

<script>
document.getElementById('checkoutForm').addEventListener('submit', function(e) {
    e.preventDefault();

    const popup = document.getElementById('thankYouPopup');
    popup.classList.remove('hidden');

    setTimeout(() => { popup.classList.add('hidden'); }, 3000);

    this.submit();
});
</script>

@endsection
