@extends('layouts.customer-layout')
@section('title','Return Item')

@section('content')
<div class="max-w-[900px] mx-auto p-5 font-sans">
    {{-- Form --}}
    @if(session('status'))
        <p class="text-green-600">{{ session('status') }}</p>
    @endif

    <form method="POST" action="{{ route('returns.submit') }}" class="bg-[#f9f9f9] p-5 rounded-lg mb-[30px] flex justify-between gap-5">
        @csrf

        {{-- Left side: text fields --}}
        <div class="flex-[2]">
            <label for="order_number" class="block mt-[15px] font-bold">Return An Item</label>
            <input type="text" name="order_number" id="order_number" required placeholder="Order Number *" class="w-full p-2.5 mt-[5px] border border-[#ccc] rounded-[5px]">

            <label for="comment" class="block mt-[15px] font-bold">Reason for Return</label>
            <textarea name="comment" id="comment" rows="5" required placeholder="Comment *" class="w-full p-2.5 mt-[5px] border border-[#ccc] rounded-[5px]"></textarea>

            <label class="block mt-5 font-bold">
                <input type="checkbox" name="terms" required class="mr-2.5">
                I confirm I have read all the terms.
            </label>

            <button type="submit" class="mt-5 bg-[#69714a] text-white px-5 py-2.5 border-none rounded-md cursor-pointer">Submit Return</button>
        </div>

        {{-- Right side: upload box --}}
        <div class="flex-1 bg-[#dee1d4] border border-[#ccc] rounded-lg p-5 shadow-[0_2px_6px_rgba(0,0,0,0.1)] min-h-[250px] flex flex-col items-center justify-center">
            <label class="block mt-[15px] font-bold mb-[15px]"><strong>Upload File</strong> <em>(optional)</em></label> 
            <button type="button" class="bg-[#989d7f] text-white px-5 py-2.5 border-none rounded-md cursor-pointer">Browse</button> 
        </div>
    </form>
</div>

@endsection
