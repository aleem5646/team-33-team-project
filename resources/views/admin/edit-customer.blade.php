@extends('layouts.customer-layout')
@section('title', 'Edit Customer')

@section('content')
<div class="container mx-auto px-4 py-8">
    <div class="max-w-2xl mx-auto bg-white dark:bg-gray-800 p-8 rounded-lg shadow-md border border-black/5">
        <h1 class="text-3xl font-bold text-black dark:text-white uppercase tracking-tight mb-8">Edit Customer</h1>

        <form action="{{ route('admin.customers.update', $customer->userId) }}" method="POST" class="space-y-6">
            @csrf
            @method('PUT')

            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <div>
                    <label class="block text-sm font-bold uppercase text-gray-700 dark:text-gray-300 mb-2">First Name</label>
                    <input type="text" name="first_name" value="{{ old('first_name', $customer->first_name) }}" 
                        class="w-full border-2 border-black/10 rounded-lg px-4 py-2 focus:border-[#9ba389] outline-none dark:bg-gray-700 dark:text-white">
                    @error('first_name') <p class="text-red-500 text-xs mt-1">{{ $message }}</p> @enderror
                </div>
                <div>
                    <label class="block text-sm font-bold uppercase text-gray-700 dark:text-gray-300 mb-2">Last Name</label>
                    <input type="text" name="last_name" value="{{ old('last_name', $customer->last_name) }}" 
                        class="w-full border-2 border-black/10 rounded-lg px-4 py-2 focus:border-[#9ba389] outline-none dark:bg-gray-700 dark:text-white">
                    @error('last_name') <p class="text-red-500 text-xs mt-1">{{ $message }}</p> @enderror
                </div>
            </div>

            <div>
                <label class="block text-sm font-bold uppercase text-gray-700 dark:text-gray-300 mb-2">Email</label>
                <input type="email" name="email" value="{{ old('email', $customer->email) }}" 
                    class="w-full border-2 border-black/10 rounded-lg px-4 py-2 focus:border-[#9ba389] outline-none dark:bg-gray-700 dark:text-white">
                @error('email') <p class="text-red-500 text-xs mt-1">{{ $message }}</p> @enderror
            </div>

            <div>
                <label class="block text-sm font-bold uppercase text-gray-700 dark:text-gray-300 mb-2">Address</label>
                <input type="text" name="address_line" value="{{ old('address_line', $customer->address_line) }}" 
                    class="w-full border-2 border-black/10 rounded-lg px-4 py-2 focus:border-[#9ba389] outline-none dark:bg-gray-700 dark:text-white">
            </div>

            <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                <div>
                    <label class="block text-sm font-bold uppercase text-gray-700 dark:text-gray-300 mb-2">City</label>
                    <input type="text" name="city" value="{{ old('city', $customer->city) }}" 
                        class="w-full border-2 border-black/10 rounded-lg px-4 py-2 focus:border-[#9ba389] outline-none dark:bg-gray-700 dark:text-white">
                </div>
                <div>
                    <label class="block text-sm font-bold uppercase text-gray-700 dark:text-gray-300 mb-2">Postcode</label>
                    <input type="text" name="postcode" value="{{ old('postcode', $customer->postcode) }}" 
                        class="w-full border-2 border-black/10 rounded-lg px-4 py-2 focus:border-[#9ba389] outline-none dark:bg-gray-700 dark:text-white">
                </div>
                <div>
                    <label class="block text-sm font-bold uppercase text-gray-700 dark:text-gray-300 mb-2">Country</label>
                    <input type="text" name="country" value="{{ old('country', $customer->country) }}" 
                        class="w-full border-2 border-black/10 rounded-lg px-4 py-2 focus:border-[#9ba389] outline-none dark:bg-gray-700 dark:text-white">
                </div>
            </div>

            <div class="flex justify-between pt-6">
                <a href="{{ route('admin.customers.index') }}" class="bg-gray-500 hover:bg-gray-600 text-white px-6 py-2 rounded-lg transition duration-300 uppercase font-bold tracking-widest text-sm">Cancel</a>
                <button type="submit" class="bg-[#9ba389] hover:bg-[#8a916a] text-white px-8 py-2 rounded-lg transition duration-300 uppercase font-bold tracking-widest text-sm shadow-md">Update Customer</button>
            </div>
        </form>
    </div>
</div>
@endsection