@extends('layouts.customer-layout')
@section('title','Product Detail')

@section('content')
<div class="max-w-[900px] mx-auto p-5 font-sans">

    {{-- Notification --}}
    <div id="cartMessage" class="hidden bg-[#d4edda] text-[#155724] p-3 rounded-md mb-4">
        ✅ Item added to cart!
    </div>

    {{-- Product Section --}}
    <div class="flex gap-5 mb-[30px]">

        {{-- Left: Image --}}
        <div class="flex-1 bg-[#dee1d4] border border-[#ccc] rounded-lg p-5 shadow-[0_2px_6px_rgba(0,0,0,0.1)] flex items-center justify-center">
            <img src="{{ asset('imgs/homepageimage3.jpg') }}" alt="" class="max-w-full rounded-md">
        </div>

        {{-- Right: Details --}}
        <div class="flex-[2]">
            <h1 class="text-2xl font-semibold mb-2">Solara Wooden Flask</h1>
            <p class="text-[#69714a] text-xl font-bold mb-2">£9.99</p>
            <p class="text-[#d4af37] mb-4">★★★★☆ (296 reviews)</p>

            {{-- Information --}}
            <div class="mb-5">
                <h3 class="font-bold mb-1">Information</h3>
                <p>Eco-friendly wooden flask. Keeps drinks hot or cold.</p>
            </div>

            {{-- Description --}}
            <div class="mb-5">
                <h3 class="font-bold mb-1">Description</h3>
                <p>Made from sustainable wood. Leak-proof and stylish.</p>
            </div>

            {{-- Quantity --}}
            <div class="mb-5">
                <label for="quantity" class="block font-bold mb-1">Quantity:</label>
                <input 
                    type="number" 
                    id="quantity" 
                    name="quantity" 
                    value="1" 
                    min="1"
                    class="w-[60px] p-2 border border-[#ccc] rounded-md"
                >
            </div>

            {{-- Carbon Impact --}}
            <div class="mb-5">
                <label class="block font-bold mb-1">Estimated Carbon Impact:</label>
                <p>0 ± -</p>
            </div>

            {{-- Add to Cart --}}
            <form id="cartForm" method="POST" action="{{ route('cart.add') }}">
                @csrf
                <input type="hidden" name="product_id" value="1">
                <input type="hidden" id="selected_variant" name="selected_variant" value="oak">

                <button 
                    type="submit" 
                    class="mt-4 bg-[#69714a] text-white px-4 py-2 rounded-md cursor-pointer hover:bg-[#55603a]"
                >
                    Add to Cart
                </button>
            </form>
        </div>
    </div>

    {{-- Reviews --}}
    <div class="border-t border-[#ccc] mt-[30px] pt-5">
        <h3 class="font-bold mb-3">Reviews</h3>

        <p>
            <span class="text-[#d4af37]">★★★★☆</span> -
            <span class="text-black">Love the design!</span>
        </p>

        <p>
            <span class="text-[#d4af37]">★★★★★</span> -
            <span class="text-black">Keeps my tea hot for hours.</span>
        </p>
    </div>
</div>

<script>
    document.getElementById('cartForm').addEventListener('submit', function(e) {
        e.preventDefault();
        const msg = document.getElementById('cartMessage');
        msg.classList.remove('hidden');
        setTimeout(() => { msg.classList.add('hidden'); }, 3000);
        this.submit();
    });
</script>
@endsection
