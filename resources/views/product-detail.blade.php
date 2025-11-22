@extends('layouts.customer-layout')
@section('title','Product Detail')

@section('content')
<style>
    .container { max-width: 900px; margin: 0 auto; padding: 20px; font-family: Arial, sans-serif; }
    .product-section { display: flex; gap: 20px; margin-bottom: 30px; }
    .product-left { 
        flex: 1; background: #dee1d4; border: 1px solid #ccc; border-radius: 8px; 
        padding: 20px; box-shadow: 0 2px 6px rgba(0,0,0,0.1); 
        display: flex; align-items: center; justify-content: center;
    }
    .product-left img { max-width: 100%; border-radius: 6px; }
    .product-right { flex: 2; }
    h1 { margin-bottom: 10px; }
    .price { color: #69714a; font-size: 20px; font-weight: bold; margin-bottom: 10px; }
    .rating { color: #d4af37; margin-bottom: 15px; }
    label { display: block; margin-top: 15px; font-weight: bold; }
    input[type="number"] { width: 60px; padding: 8px; margin-top: 5px; border: 1px solid #ccc; border-radius: 5px; }
    .add-btn { margin-top: 20px; background: #69714a; color: white; padding: 8px 16px; border: none; border-radius: 6px; cursor: pointer; }
    .add-btn:hover { background: #55603a; }
    .reviews { border-top: 1px solid #ccc; margin-top: 30px; padding-top: 20px; }
    .notification { display: none; background: #d4edda; color: #155724; padding: 10px; border-radius: 6px; margin-bottom: 15px; }
    .section-block { margin-bottom: 20px; }
</style>

<div class="container">
    <div id="cartMessage" class="notification">✅ Item added to cart!</div>

    <div class="product-section">
        <div class="product-left">
            <!-- Here we will add the pictures of the items. -->
            <img src="{{ asset(' ' ) }}" alt="Solara Wooden Flask"> 
        </div>

        <div class="product-right">
            <h1>Solara Wooden Flask</h1>
            <p class="price">£9.99</p>
            <p class="rating">★★★★☆ (296 reviews)</p>

            <div class="section-block">
                <h3><b>Information</b></h3>
                <p>Eco-friendly wooden flask. Keeps drinks hot or cold.</p>
            </div>
            
            <div class="section-block">
                <h3><b>Description</b></h3>
                <p>Made from sustainable wood. Leak-proof and stylish.</p>
            </div>

            <div class="section-block">
                <label for="quantity">Quantity:</label>
                <input type="number" id="quantity" name="quantity" value="1" min="1">
            </div>

            <div class="section-block">
                <label>Estimated Carbon Impact:</label>
                <p>0 ± -</p>
            </div>

            <form id="cartForm" method="POST" action="{{ route('cart.add') }}">
                @csrf
                <input type="hidden" name="product_id" value="1">
                <input type="hidden" id="selected_variant" name="selected_variant" value="oak">
                <button type="submit" class="add-btn">Add to Cart</button>
            </form>
        </div>
    </div>

    <div class="reviews">
        <h3><b>Reviews</b></h3>
        <p><span class="rating">★★★★☆</span> - <span style="color:black;">Love the design!</span></p>
        <p><span class="rating">★★★★★</span> - <span style="color:black;">Keeps my tea hot for hours.</span></p>
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
