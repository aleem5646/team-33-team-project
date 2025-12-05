@extends('layouts.customer-layout')
@section('title','Home')

@section('content')

<main class="w-[90%] max-w-[1200px] mx-auto py-10 font-sans">
    
    <div class="flex justify-around gap-6">
        
        <div class="flex-1 bg-gray-100 text-center overflow-hidden rounded shadow">
            <img src="{{ asset('imgs/homepageimage1.jpg') }}"
                 alt="Ethically Sourced Goods"
                 class="w-full h-auto object-cover min-h-[250px] transition-transform duration-300 hover:scale-105">
            
            <div class="p-4 font-bold">
                Ethically Sourced Goods!
            </div>
        </div>

        <div class="flex-1 bg-gray-100 text-center overflow-hidden rounded shadow">
            <img src="{{ asset('imgs/homepageimage2.jpg') }}"
                 alt="Sustainable Living"
                 class="w-full h-auto object-cover min-h-[250px] transition-transform duration-300 hover:scale-105">
            
            <div class="p-4 font-bold">
                Sustainable Living!
            </div>
        </div>

        <div class="flex-1 bg-gray-100 text-center overflow-hidden rounded shadow">
            <img src="{{ asset('imgs/homepageimage3.jpg') }}"
                 alt="Low Carbon Shipping"
                 class="w-full h-auto object-cover min-h-[250px] transition-transform duration-300 hover:scale-105">
            
            <div class="p-4 font-bold">
                Low Carbon Shipping!
            </div>
        </div>

    </div>

    <div class="mt-10 text-center">
        <a href="{{ route('products.index') }}"
           class="inline-block bg-[#92b09a] text-white px-8 py-3 rounded-full uppercase font-bold tracking-wide transition duration-300 hover:bg-[#7a9480]">
            Shop Now
        </a>
    </div>

</main>

@endsection
