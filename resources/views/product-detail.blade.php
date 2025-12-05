@extends('layouts.customer-layout')
@section('title', $product->name)

@section('content')

<div class="max-w-[900px] mx-auto p-5">

    <!-- Notification -->
    <div id="cartMessage" class="hidden bg-[#d4edda] text-[#155724] p-3 rounded-md mb-4">
        ✅ Item added to cart!
    </div>

    <div class="bg-white border border-[#ccc] rounded-lg shadow-md p-5">

        <div class="flex flex-col md:flex-row gap-5 mb-8">

            <!-- Left: Product Image -->
            <div class="flex-1 bg-[#dee1d4] rounded-lg p-5 flex items-center justify-center">
                <img src="{{ asset('imgs/' . $product->image) }}"
                     alt="{{ $product->name }}"
                     class="rounded-md object-contain w-[300px] h-auto">
            </div>

            <!-- Right: Product Info -->
            <div class="flex-1 flex flex-col">

                <!-- Product Name -->
                <h1 class="mb-2 text-2xl font-bold">{{ $product->name }}</h1>

                <!-- Product Price -->
                <p class="text-[#69714a] text-xl font-bold mb-2">£{{ number_format($product->price, 2) }}</p>

                <!-- Product Rating -->
                <p class="text-[#d4af37] mb-4">
                    @php
                        $averageRating = count($product->reviews) ? round(array_sum(array_column($product->reviews, 'rating')) / count($product->reviews)) : 0;
                    @endphp
                    {{ str_repeat('★', $averageRating) . str_repeat('☆', 5 - $averageRating) }}
                    ({{ count($product->reviews) }} reviews)
                </p>

                <!-- Product Information -->
                <div class="mb-5">
                    <h3 class="font-bold mb-1">Information</h3>
                    <p>{{ $product->information }}</p>
                </div>

                <!-- Product Description -->
                <div class="mb-5">
                    <h3 class="font-bold mb-1">Description</h3>
                    <p>{{ $product->description }}</p>
                </div>

                <!-- Quantity -->
                <div class="mb-5">
                    <label for="quantity" class="block mt-3 font-bold">Quantity:</label>
                    <input type="number"
                           id="quantity"
                           name="quantity"
                           value="1"
                           min="1"
                           class="w-[60px] p-2 mt-1 border border-[#ccc] rounded-md">
                </div>

                <!-- Estimated Carbon Impact -->
                <div class="mb-5">
                    <label class="block mt-3 font-bold">Estimated Carbon Impact:</label>
                    <p>{{ $product->carbon_impact }}</p>
                </div>

                <!-- Add to Cart Button -->
                <form id="cartForm" method="POST" action="{{ route('cart.add') }}">
                    @csrf
                    <input type="hidden" name="product_id" value="{{ $product->id }}">
                    <input type="hidden" id="selected_variant" name="selected_variant" value="default">

                    <button type="submit"
                            class="mt-5 text-white py-2 px-4 rounded-md"
                            style="background: #55603a; border: 2px solid black;">
                        Add to Cart
                    </button>
                </form>

            </div>
        </div>

        <!-- Reviews Section -->
        <div class="border-t border-[#ccc] pt-5">
            <h3 class="font-bold text-lg mb-3">Reviews</h3>
            @foreach($product->reviews as $review)
                <p>
                    <span class="text-[#d4af37]">{{ str_repeat('★', $review['rating']) . str_repeat('☆', 5 - $review['rating']) }}</span>
                    - <span class="text-black">{{ $review['comment'] }}</span>
                </p>
            @endforeach
        </div>

    </div>

</div>

<!-- Add to Cart Script -->
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
