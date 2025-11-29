@extends('layouts.customer-layout')
@section('title','About')

@section('content')

<div class="w-[90%] max-w-[1200px] mx-auto py-10">
    <div class="flex justify-between gap-5 mt-10 max-[900px]:flex-col">
        
        <div class="flex-1 h-[380px] bg-[#969f82] flex justify-center items-center rounded text-center p-5 text-xl font-semibold text-black transition-all duration-300 hover:scale-[1.03] hover:shadow-[0_3px_8px_rgba(0,0,0,0.2)] max-[900px]:h-[260px]">
            ABOUT US
        </div>

        <div class="flex-1 h-[380px] bg-[#969f82] flex justify-center items-center rounded text-center p-5 text-xl font-semibold text-black transition-all duration-300 hover:scale-[1.03] hover:shadow-[0_3px_8px_rgba(0,0,0,0.2)] max-[900px]:h-[260px]">
            OUR MISSION
        </div>

        <div class="flex-1 h-[380px] bg-[#969f82] flex justify-center items-center rounded text-center p-5 text-xl font-semibold text-black transition-all duration-300 hover:scale-[1.03] hover:shadow-[0_3px_8px_rgba(0,0,0,0.2)] max-[900px]:h-[260px]">
            HOW MUCH THE<br>COMMUNITY HAS<br>HELPED
        </div>

    </div>
</div>

<script>
    console.log("About page script loaded.");
</script>

@endsection