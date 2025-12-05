@extends('layouts.customer-layout')

@section('title', 'My Profile')

@section('content')
<div class="container mx-auto px-4 py-10">
    <div class="flex flex-col lg:flex-row gap-8 justify-center">
        

        <div class="lg:w-1/3 bg-[#969f82] p-8 rounded shadow-md text-black h-fit min-h-[400px]">
            <h2 class="text-xl font-bold mb-6 text-center uppercase border-b border-black pb-2">Profile Info</h2>
            
            <div class="space-y-4">
                <div>
                    <span class="font-bold block">NAME:</span>
                    <p>{{ $user->getName() }}</p>
                </div>
                
                <div>
                    <span class="font-bold block">EMAIL:</span>
                    <p>{{ $user->email }}</p>
                </div>
                
                <div>
                    <span class="font-bold block">ADDRESS:</span>
                    <p>{{ $user->address_line ?? 'N/A' }}</p>
                    <p>{{ $user->city ?? '' }} {{ $user->postcode ?? '' }}</p>
                    <p>{{ $user->country ?? '' }}</p>
                </div>
            </div>
        </div>


        <div class="lg:w-1/3 bg-[#969f82] p-8 rounded shadow-md text-black h-fit min-h-[400px]">
            <h2 class="text-xl font-bold mb-6 text-center uppercase border-b border-black pb-2">Order History List</h2>
            
            <div class="space-y-4 overflow-y-auto max-h-[300px] pr-2">
                @if($orders->isEmpty())
                    <p class="text-center italic">No orders found.</p>
                @else
                    @foreach($orders as $order)
                        <div class="bg-[#8f9877] p-3 rounded border border-black/10">
                            <p class="font-bold">Order #{{ $order->orderId }}</p>
                            <p class="text-sm">Date: {{ $order->created_at->format('d M Y') }}</p>
                            <p class="text-sm">Total: £{{ number_format($order->total_amount, 2) }}</p>
                            <p class="text-sm">Status: {{ ucfirst($order->status) }}</p>
                        </div>
                    @endforeach
                @endif
            </div>
        </div>


        <div class="lg:w-1/4 flex flex-col gap-4">
            <a href="#" class="bg-[#3e4c24] text-white font-bold py-4 px-6 rounded text-center hover:bg-[#2e3a1b] transition uppercase shadow-md">
                Edit Profile
            </a>
            
            <a href="#" class="bg-[#3e4c24] text-white font-bold py-8 px-6 rounded text-center hover:bg-[#2e3a1b] transition uppercase shadow-md flex items-center justify-center h-[150px]">
                How Much You Have Helped/ Sustainability Impact
            </a>
            
            <a href="{{ route('logout') }}" class="bg-[#3e4c24] text-white font-bold py-4 px-6 rounded text-center hover:bg-[#2e3a1b] transition uppercase shadow-md mt-auto">
                Logout
            </a>
        </div>

    </div>

    <div class="text-center mt-8">
        <p class="text-gray-700">
            To return an item click <a href="{{ route('returns.form') }}" class="underline font-bold hover:text-[#3e4c24]">here</a>.
        </p>
    </div>
</div>
@endsection
