@extends('layouts.customer-layout')
@section('title','Home')

@section('content')

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home </title>

    <!-- Inline CSS Styles -->
    <style>
        * {
            box-sizing: border-box;
        }

        .container {
            width: 90%;
            max-width: 1200px;
            margin: 0 auto;
            padding: 20px 0;
        }

        a {
            text-decoration: none;
            color: inherit;
        }

        /* Main Content Styles */
        .main-content {
            padding: 40px 0;
            font-family: sans-serif;
        }

        .product-grid {
            display: flex;
            justify-content: space-around;
            gap: 20px;
        }

        .product-card {
            flex: 1;
            background-color: #f9f9f9;
            text-align: center;
            overflow: hidden;
            border-radius: 5px;
            box-shadow: 0 2px 4px rgba(0,0,0,0.1);
        }

        .product-img {
            width: 100%;
            height: auto;
            display: block;
            object-fit: cover; 
            min-height: 250px;
        }

        .product-caption {
            padding: 15px;
            font-weight: bold;
        }

        .shop-button {
            margin-top: 40px;
            text-align: center;
        }

        .shop-button a {
            display: inline-block;
            background-color: #92b09a; /* Earthy Green */
            color: white;
            padding: 12px 30px;
            border-radius: 25px;
            text-transform: uppercase;
            font-weight: bold;
            letter-spacing: 1px;
            transition: background-color 0.3s;
        }

        .shop-button a:hover {
            background-color: #7a9480;
        }
    </style>
</head>
<body>
    
    <main class="main-content container">
        <div class="product-grid">
            <div class="product-card">
                <img src="{{ asset('imgs/homepageimage1.jpg') }}" alt="Ethically Sourced Goods" class="product-img">
                <div class="product-caption">
                    Ethically Sourced Goods!
                </div>
            </div>
            <div class="product-card">
                <img src="{{ asset('imgs/homepageimage2.jpg') }}" alt="Sustainable Living" class="product-img">
                <div class="product-caption">
                    Sustainable Living!
                </div>
            </div>
            <div class="product-card">
                <img src="{{ asset('imgs/homepageimage3.jpg') }}" alt="Low Carbon Shipping" class="product-img">
                <div class="product-caption">
                    Low Carbon Shipping!
                </div>
            </div>
        </div>

        <div class="shop-button">
            <a href="#">SHOP NOW</a>
        </div>
    </main>
   
    

    <script>
        console.log("Homepage script loaded.");
    </script>

</body>
</html>

@endsection