@extends('layouts.customer-layout')

@section('title', 'Edit Profile')

@section('content')
<div class="container mx-auto px-4 py-10">
    <div class="max-w-2xl mx-auto bg-[#969f82] p-8 rounded shadow-md text-black">
        <h2 class="text-xl font-bold mb-6 text-center uppercase border-b border-black pb-2">Edit Profile</h2>

        @if(session('success'))
            <div class="bg-green-100 text-green-800 p-3 mb-4 rounded">
                {{ session('success') }}
            </div>
        @endif

        <form action="{{ route('profile.update') }}" method="POST" class="space-y-4">
            @csrf
            @method('PUT')

            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                <div>
                    <label class="block font-bold mb-1">First Name</label>
                    <input type="text" name="first_name" value="{{ old('first_name', $user->first_name) }}" class="w-full p-2 rounded border border-[#3e4c24] bg-white" required>
                </div>
                <div>
                    <label class="block font-bold mb-1">Last Name</label>
                    <input type="text" name="last_name" value="{{ old('last_name', $user->last_name) }}" class="w-full p-2 rounded border border-[#3e4c24] bg-white" required>
                </div>
            </div>

            <div>
                <label class="block font-bold mb-1">Email</label>
                <input type="email" name="email" value="{{ old('email', $user->email) }}" class="w-full p-2 rounded border border-[#3e4c24] bg-white" required>
            </div>

            <div>
                <label class="block font-bold mb-1">Phone</label>
                <input type="text" name="phone" value="{{ old('phone', $user->phone) }}" class="w-full p-2 rounded border border-[#3e4c24] bg-white">
            </div>

            <div>
                <label class="block font-bold mb-1">Address</label>
                <input type="text" name="address_line" value="{{ old('address_line', $user->address_line) }}" class="w-full p-2 rounded border border-[#3e4c24] bg-white">
            </div>

            <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
                <div>
                    <label class="block font-bold mb-1">City</label>
                    <input type="text" name="city" value="{{ old('city', $user->city) }}" class="w-full p-2 rounded border border-[#3e4c24] bg-white">
                </div>
                <div>
                    <label class="block font-bold mb-1">Postcode</label>
                    <input type="text" name="postcode" value="{{ old('postcode', $user->postcode) }}" class="w-full p-2 rounded border border-[#3e4c24] bg-white">
                </div>
                <div>
                    <label class="block font-bold mb-1">Country</label>
                    <input type="text" name="country" value="{{ old('country', $user->country) }}" class="w-full p-2 rounded border border-[#3e4c24] bg-white">
                </div>
            </div>

            <div class="flex justify-between items-center mt-6">
                <a href="{{ route('profile') }}" class="text-black underline hover:text-gray-700">Cancel</a>
                <button type="submit" class="bg-[#3e4c24] text-white font-bold py-2 px-6 rounded hover:bg-[#2e3a1b] transition uppercase shadow-md">
                    Save Changes
                </button>
            </div>
        </form>
    </div>
</div>
@endsection
