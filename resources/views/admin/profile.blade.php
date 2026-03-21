@extends('layouts.customer-layout')

@section('title', 'Admin Profile')

@section('content')
<div class="w-full flex-grow">
    <div class="container mx-auto px-6 py-12 max-w-[1100px]">
        <h1 class="text-[28px] font-bold mb-8 text-black dark:text-white uppercase tracking-wide">ADMIN PROFILE</h1>

        <div class="grid grid-cols-1 md:grid-cols-3 gap-6 lg:gap-8 items-start">
            
            <div class="flex flex-col h-full">
                <a href="{{ route('profile.edit') }}" class="block w-full bg-[#969f82] dark:bg-gray-800 p-6 text-black dark:text-white flex flex-col items-center justify-center text-center h-[350px] hover:opacity-90 transition">
                    <h2 class="text-[18px] leading-[1.2] font-bold text-black dark:text-white uppercase mb-4">
                        ADMIN<br>INFORMATION
                    </h2>
                    <div class="font-normal text-[15px] space-y-1">
                        <p>{{ auth()->user()->getName() }}</p>
                        <p>{{ auth()->user()->email }}</p>
                        @if(auth()->user()->phone)
                            <p>{{ auth()->user()->phone }}</p>
                        @else
                            <p class="italic text-gray-700 dark:text-gray-300">No additional info provided.</p>
                        @endif
                    </div>
                </a>
                <a href="{{ route('logout') }}" class="w-full bg-[#3e4c24] text-white font-bold py-4 text-center transition uppercase hover:bg-[#2e3a1b]">
                    LOGOUT
                </a>
            </div>

            <div class="h-full">
                <a href="{{ route('admin.dashboard') }}" class="block w-full bg-[#969f82] dark:bg-gray-800 p-8 text-black dark:text-white flex flex-col justify-center items-center text-center h-[350px] hover:opacity-90 transition">
                    <p class="text-[18px] leading-[1.4] font-medium uppercase text-black dark:text-white">
                        ADMIN<br>
                        DASHBOARD
                    </p>
                </a>
            </div>

            <div class="h-full">
                <a href="{{ route('home') }}" class="block w-full bg-[#969f82] dark:bg-gray-800 p-8 text-black dark:text-white flex flex-col justify-center items-center text-center h-[350px] hover:opacity-90 transition">
                    <p class="text-[18px] leading-[1.4] font-medium uppercase text-black dark:text-white">
                        SWITCH TO CUSTOMER<br>
                        <span class="font-normal lowercase">(view web as customer)</span>
                    </p>
                </a>
            </div>

        </div>
    </div>
</div>

<div class="fixed bottom-6 right-6 z-50">
    <button class="bg-[#a3c9a8] dark:bg-green-700 border-2 border-black dark:border-gray-600 rounded-sm shadow-md flex items-center justify-center transition" style="width: 50px; height: 40px; border-bottom-right-radius: 12px;">
        <svg width="28" height="28" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="text-black dark:text-white">
            <line x1="4" y1="8" x2="20" y2="8"></line>
            <line x1="4" y1="14" x2="20" y2="14"></line>
            <line x1="4" y1="10" x2="20" y2="10"></line>
            <path d="M 24 20 L 20 20 L 22 24 Z" fill="currentColor" stroke="currentColor"></path>
        </svg>
    </button>
</div>
@endsection
