@extends('layouts.layoutstyle')

@section('content')

<div class="home-gallery">

    <div class="item">
        <img src="/images/brushes.jpg">
        <p>Ethically Sourced Goods!</p>
    </div>

    <div class="item">
        <img src="/images/cup.jpg">
        <p>Sustainable Living!</p>
    </div>

    <div class="item">
        <img src="/images/bottle.jpg">
        <p>Low Carbon Shipping!</p>
    </div>

</div>

<div class="shop-btn">
    <a href="/products">SHOP NOW</a>
</div>

@endsection
