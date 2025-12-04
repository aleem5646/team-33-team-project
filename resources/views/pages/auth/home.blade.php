@extends('layouts.customer-layout')
@section('title','Home')

@section('content')

    <main class="py-10 font-sans w-[90%] max-w-[1200px] mx-auto">
        <div class="flex justify-around gap-5">
            <div class="flex-1 bg-[#f9f9f9] text-center overflow-hidden rounded-[5px] shadow-[0_2px_4px_rgba(0,0,0,0.1)] group">
                <img src="{{ asset('imgs/homepageimage1.jpg') }}" alt="Ethically Sourced Goods" class="w-full h-auto block object-cover min-h-[250px] transition-transform duration-300 group-hover:scale-105">
                <div class="p-[15px] font-bold">
                    Ethically Sourced Goods!
                </div>
            </div>
            <div class="flex-1 bg-[#f9f9f9] text-center overflow-hidden rounded-[5px] shadow-[0_2px_4px_rgba(0,0,0,0.1)] group">
                <img src="{{ asset('imgs/homepageimage2.jpg') }}" alt="Sustainable Living" class="w-full h-auto block object-cover min-h-[250px] transition-transform duration-300 group-hover:scale-105">
                <div class="p-[15px] font-bold">
                    Sustainable Living!
                </div>
            </div>
            <div class="flex-1 bg-[#f9f9f9] text-center overflow-hidden rounded-[5px] shadow-[0_2px_4px_rgba(0,0,0,0.1)] group">
                <img src="{{ asset('imgs/homepageimage3.jpg') }}" alt="Low Carbon Shipping" class="w-full h-auto block object-cover min-h-[250px] transition-transform duration-300 group-hover:scale-105">
                <div class="p-[15px] font-bold">
                    Low Carbon Shipping!
                </div>
            </div>
        </div>

        <div class="mt-10 text-center">
            <a href="#" class="inline-block bg-[#92b09a] text-white px-[30px] py-[12px] rounded-[25px] uppercase font-bold tracking-[1px] transition-colors duration-300 hover:bg-[#7a9480]">SHOP NOW</a>
        </div>
    </main>
   
    <script>
        console.log("Homepage script loaded.");
    </script>

@endsection

