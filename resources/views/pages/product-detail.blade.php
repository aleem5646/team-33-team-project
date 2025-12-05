@extends('layouts.customer-layout')
@section('title', $product->name)

@section('content')

<div class="max-w-[900px] mx-auto p-5">

    <!-- Notification -->
    @if(session('status'))
        <div class="bg-[#d4edda] text-[#155724] p-3 rounded-md mb-4">
            ✅ {{ session('status') }}
        </div>
    @endif
    @if(session('error'))
        <div class="bg-red-100 text-red-700 p-3 rounded-md mb-4">
            ❌ {{ session('error') }}
        </div>
    @endif

    <div class="bg-white dark:bg-gray-800 border border-[#ccc] dark:border-gray-700 rounded-lg shadow-md p-5">

        <div class="flex flex-col md:flex-row gap-5 mb-8">

            <!-- Left: Product Image -->
            <div class="flex-1 bg-[#dee1d4] dark:bg-gray-700 rounded-lg p-5 flex items-center justify-center">
                <img src="{{ asset($product->image_url) }}"
                     alt="{{ $product->name }}"
                     class="rounded-md object-contain w-[300px] h-auto">
            </div>

            <!-- Right: Product Info -->
            <div class="flex-1 flex flex-col">

                <!-- Product Name -->
                <h1 class="mb-2 text-2xl font-bold dark:text-white">{{ $product->name }}</h1>

                <!-- Product Price -->
                <p class="text-[#69714a] dark:text-[#a3b18a] text-xl font-bold mb-2">£{{ number_format($product->price, 2) }}</p>

                <!-- Product Rating -->
                <p class="text-[#d4af37] mb-4">
                    @php
                        $averageRating = $product->reviews->count() ? round($product->reviews->avg('rating')) : 0;
                    @endphp
                    {{ str_repeat('★', $averageRating) . str_repeat('☆', 5 - $averageRating) }}
                    ({{ $product->reviews->count() }} reviews)
                </p>

                <!-- Product Information -->
                <div class="mb-5">
                    <h3 class="font-bold mb-1 dark:text-white">Information</h3>
                    <p class="dark:text-gray-300">{{ $product->information }}</p>
                    
                    @if($product->filters->count() > 0)
                        <div class="mt-3 flex flex-wrap gap-2">
                            @foreach($product->filters as $filter)
                                @php
                                    $bgClass = 'bg-gray-200 text-gray-800';
                                    if(strtolower($filter->name) == 'low carbon') $bgClass = 'bg-green-100 text-green-800 border border-green-200';
                                    if(strtolower($filter->name) == 'fair trade') $bgClass = 'bg-blue-100 text-blue-800 border border-blue-200';
                                @endphp
                                <span class="px-3 py-1 rounded-full text-xs font-semibold {{ $bgClass }}">
                                    {{ $filter->name }}
                                </span>
                            @endforeach
                        </div>
                    @endif
                </div>

                <!-- Product Description -->
                <div class="mb-5">
                    <h3 class="font-bold mb-1 dark:text-white">Description</h3>
                    <p class="dark:text-gray-300">{{ $product->description }}</p>
                </div>

                <!-- Add to Cart Form -->
                <form id="cartForm" method="POST" action="{{ route('cart.add') }}">
                    @csrf
                    <input type="hidden" name="product_id" value="{{ $product->productId }}">
                    <input type="hidden" id="selected_variant" name="selected_variant" value="default">

                    <!-- Quantity -->
                    <div class="mb-5">
                        <label for="quantity" class="block mt-3 font-bold dark:text-white">Quantity:</label>
                        <input type="number"
                               id="quantity"
                               name="quantity"
                               value="1"
                               min="1"
                               class="w-[60px] p-2 mt-1 border border-[#ccc] dark:border-gray-600 rounded-md dark:bg-gray-700 dark:text-white">
                    </div>

                    <!-- Carbon Impact -->
                    @if($product->carbon_impact)
                        <div class="mb-5">
                            <h3 class="font-bold mb-1 dark:text-white">Estimated Carbon Impact</h3>
                            <p class="text-green-700 font-semibold">
                                <span id="carbon-display">{{ $product->carbon_impact }}</span> kg CO2e
                            </p>
                            <p class="text-xs text-gray-500 mt-1">
                                Total Impact: <span id="total-carbon-display">{{ $product->carbon_impact }}</span> kg CO2e
                            </p>
                        </div>
                    @endif

                    <script>
                        document.addEventListener('DOMContentLoaded', function() {
                            const quantityInput = document.getElementById('quantity');
                            const carbonDisplay = document.getElementById('carbon-display');
                            const totalCarbonDisplay = document.getElementById('total-carbon-display');
                            
                            // Extract numeric value from string (e.g., "2 ± 0.5" -> 2)
                            const baseImpactStr = "{{ $product->carbon_impact }}";
                            const baseImpact = parseFloat(baseImpactStr) || 0;

                            function updateCarbon() {
                                const qty = parseInt(quantityInput.value) || 1;
                                const total = (baseImpact * qty).toFixed(2);
                                
                                // If the string has a ± part, we might want to keep it or just show the calculated base
                                // For simplicity, we show the calculated total based on the base number
                                totalCarbonDisplay.textContent = total + (baseImpactStr.includes('±') ? ' ± ' + (parseFloat(baseImpactStr.split('±')[1]) * qty).toFixed(2) : '');
                            }

                            quantityInput.addEventListener('input', updateCarbon);
                            quantityInput.addEventListener('change', updateCarbon);
                        });
                    </script>

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
            <h3 class="font-bold text-lg mb-3 dark:text-white">Reviews</h3>
            @foreach($product->reviews as $review)
                <p>
                    <span class="text-[#d4af37]">{{ str_repeat('★', $review->rating) . str_repeat('☆', 5 - $review->rating) }}</span>
                    - <span class="text-black dark:text-gray-300">{{ $review->review }}</span>
                </p>
            @endforeach
        </div>

    </div>

</div>



@endsection
