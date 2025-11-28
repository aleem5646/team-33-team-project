@extends('layout')
@section('title','Product Detail')

@section('content')
<div class="max-w-[900px] mx-auto p-5 font-sans">
    <div id="cartMessage" class="hidden bg-[#d4edda] text-[#155724] p-2.5 rounded-md mb-[15px]">✅ Item added to cart!</div>

    <div class="flex gap-5 mb-[30px]">
        <div class="flex-1 bg-[#dee1d4] border border-[#ccc] rounded-lg p-5 shadow-[0_2px_6px_rgba(0,0,0,0.1)] flex items-center justify-center">
            <!-- Here we will add the pictures of the items. -->
            <img src="{{ asset(' ' ) }}" alt="Solara Wooden Flask" class="max-w-full rounded-md"> 
        </div>

        <div class="flex-[2]">
            <h1 class="mb-2.5">Solara Wooden Flask</h1>
            <p class="text-[#69714a] text-xl font-bold mb-2.5">£9.99</p>
            <p class="text-[#d4af37] mb-[15px]">★★★★☆ (296 reviews)</p>

            <div class="mb-5">
                <h3><b>Information</b></h3>
                <p>Eco-friendly wooden flask. Keeps drinks hot or cold.</p>
            </div>
            
            <div class="mb-5">
                <h3><b>Description</b></h3>
                <p>Made from sustainable wood. Leak-proof and stylish.</p>
            </div>

            <div class="mb-5">
                <label for="quantity" class="block mt-[15px] font-bold">Quantity:</label>
                <input type="number" id="quantity" name="quantity" value="1" min="1" class="w-[60px] p-2 mt-[5px] border border-[#ccc] rounded-[5px]">
            </div>

            <div class="mb-5">
                <label class="block mt-[15px] font-bold">Estimated Carbon Impact:</label>
                <p>0 ± -</p>
            </div>

            <form id="cartForm" method="POST" action="{{ route('cart.add') }}">
                @csrf
                <input type="hidden" name="product_id" value="1">
                <input type="hidden" id="selected_variant" name="selected_variant" value="oak">
                <button type="submit" class="mt-5 bg-[#69714a] text-white px-4 py-2 border-none rounded-md cursor-pointer hover:bg-[#55603a]">Add to Cart</button>
            </form>
        </div>
    </div>

    <div class="border-t border-[#ccc] mt-[30px] pt-5">
        <h3><b>Reviews</b></h3>
        <p><span class="text-[#d4af37] mb-[15px]">★★★★☆</span> - <span class="text-black">Love the design!</span></p>
        <p><span class="text-[#d4af37] mb-[15px]">★★★★★</span> - <span class="text-black">Keeps my tea hot for hours.</span></p>
    </div>
</div>

<script>
    document.getElementById('cartForm').addEventListener('submit', function(e) {
        e.preventDefault();
        const msg = document.getElementById('cartMessage');
        msg.style.display = 'block';
        setTimeout(() => { msg.style.display = 'none'; }, 3000);
        this.submit(); 
    });
</script>
@endsection
