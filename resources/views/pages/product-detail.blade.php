@extends('layouts.customer-layout')
@section('title','Product Detail')

@section('content')

<div class="max-w-[900px] mx-auto p-5">

    <!-- Notification -->
    <div id="cartMessage"
         class="hidden bg-[#d4edda] text-[#155724] p-3 rounded-md mb-4">
        ✅ Item added to cart!
    </div>

    <!-- Product Section -->
    <div class="flex gap-5 mb-8">

        <!-- Left: Product Image -->
        <div class="flex-1 bg-[#dee1d4] border border-[#ccc] rounded-lg p-5 shadow-md flex items-center justify-center">
            <img src="{{ asset('imgs/homepageimage3.jpg') }}"
                 alt=""
                 class="rounded-md object-contain w-[180px] max-w-none"
                 style="width: 180px; max-width: none; height: auto;">
        </div>

        <!-- Right: Product Info -->
        <div class="flex-[2] flex flex-col">

            <h1 class="mb-2 text-2xl font-bold">Solara Wooden Flask</h1>

            <p class="text-[#69714a] text-xl font-bold mb-2">£9.99</p>

            <p class="text-[#d4af37] mb-4">★★★★☆ (296 reviews)</p>

            <div class="mb-5">
                <h3 class="font-bold mb-1">Information</h3>
                <p>Eco-friendly wooden flask. Keeps drinks hot or cold.</p>
            </div>

            <div class="mb-5">
                <h3 class="font-bold mb-1">Description</h3>
                <p>Made from sustainable wood. Leak-proof and stylish.</p>
            </div>

            <div class="mb-5">
                <label for="quantity" class="block mt-3 font-bold">Quantity:</label>
                <input type="number"
                       id="quantity"
                       name="quantity"
                       value="1"
                       min="1"
                       class="w-[60px] p-2 mt-1 border border-[#ccc] rounded-md">
            </div>

            <div class="mb-5">
                <label class="block mt-3 font-bold">Estimated Carbon Impact:</label>
                <p>0 ± -</p>
            </div>

            <!-- Add to Cart Button -->
            <form id="cartForm" method="POST" action="{{ route('cart.add') }}">
                @csrf
                <input type="hidden" name="product_id" value="1">
                <input type="hidden" id="selected_variant" name="selected_variant" value="oak">

                <button type="submit"
                 class="mt-5 text-white py-2 px-4 rounded-md"
                   style="background: #55603a !important; display: inline-block !important; border: 2px solid black !important;">
                     Add to Cart
                </button>

            </form>

        </div>
    </div>

    <!-- Reviews -->
    <div class="border-t border-[#ccc] mt-8 pt-5">
        <h3 class="font-bold text-lg mb-3">Reviews</h3>

        <p>
            <span class="text-[#d4af37]">★★★★☆</span>
            - <span class="text-black">Love the design!</span>
        </p>

        <p>
            <span class="text-[#d4af37]">★★★★★</span>
            - <span class="text-black">Keeps my tea hot for hours.</span>
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
