@extends('layouts.customer-layout')
@section('title','Customer Management')

@section('content')
<div class="container mx-auto px-4 py-8">
    <div class="flex flex-col md:flex-row justify-between items-start md:items-center mb-8 gap-4">
        <div>
            <h1 class="text-3xl font-bold text-black dark:text-white uppercase tracking-tight">Customer Management</h1>
        </div>

        <div class="flex flex-col md:flex-row items-center gap-4 w-full md:w-auto">
            <!-- Search Bar -->
            <form action="{{ route('admin.customers.index') }}" method="GET" class="relative w-full md:w-auto">
                <input type="text" name="search" value="{{ request('search') }}" placeholder="Search customers..." 
                    class="w-full md:w-64 border-2 border-black/20 rounded-lg px-4 py-2 focus:outline-none focus:border-[#9ba389] transition-colors dark:bg-gray-800 dark:text-white">
                @if(request('filter'))
                    <input type="hidden" name="filter" value="{{ request('filter') }}">
                @endif
            </form>

            <!-- Filter Dropdown -->
            <form action="{{ route('admin.customers.index') }}" method="GET" class="flex items-center w-full md:w-auto">
                <div class="bg-[#f1fdba] dark:bg-[#9ba389] px-4 py-2 rounded-lg flex items-center gap-2 border border-black/10 w-full md:w-auto">
                    <span class="font-bold uppercase text-sm text-black dark:text-white">Filter:</span>
                    <select name="filter" onchange="this.form.submit()" class="bg-transparent font-bold uppercase text-sm focus:outline-none cursor-pointer text-black dark:text-white appearance-none">
                        <option value="newest" {{ $filter == 'newest' ? 'selected' : '' }} class="bg-white text-black">Most Recent</option>
                        <option value="oldest" {{ $filter == 'oldest' ? 'selected' : '' }} class="bg-white text-black">Oldest</option>
                        <option value="orders_desc" {{ $filter == 'orders_desc' ? 'selected' : '' }} class="bg-white text-black">Most Orders</option>
                    </select>
                    <!-- Custom Arrow for Select -->
                    <svg class="w-4 h-4 text-black dark:text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                    </svg>
                </div>
                @if(request('search'))
                    <input type="hidden" name="search" value="{{ request('search') }}">
                @endif
            </form>
        </div>
    </div>

    <!-- Customer Rows -->
    <div class="space-y-4 max-w-5xl mx-auto">
        <!-- Header Row -->
        <div class="flex flex-row items-center bg-[#9ba389] p-4 rounded-lg text-white font-bold uppercase tracking-wider text-xs md:text-sm">
            <div class="w-[35%] text-center">Customer Name</div>
            <div class="w-[20%] text-center">Total Orders</div>
            <div class="w-[25%] text-center">Join Date</div>
            <div class="w-[20%] text-center">Actions</div>
        </div>

        @forelse($customers as $customer)
            <div class="flex flex-row items-center bg-white dark:bg-gray-800 p-4 rounded-lg shadow-sm border border-black/5 hover:bg-gray-50 dark:hover:bg-gray-700 transition-colors">
                <!-- Name Column -->
                <div class="w-[35%] text-center flex justify-center text-sm md:text-lg font-bold text-gray-800 dark:text-white uppercase tracking-tight">
                    {{ $customer->getName() }}
                </div>

                <!-- Orders Column -->
                <div class="w-[20%] text-center flex justify-center text-gray-600 dark:text-gray-300 font-bold uppercase text-xs md:text-sm">
                    {{ $customer->orders_count }} orders
                </div>

                <!-- Join Date Column -->
                <div class="w-[25%] text-center flex justify-center text-gray-500 dark:text-gray-400 font-medium text-xs md:text-sm">
                    {{ $customer->email_verified_at ? $customer->email_verified_at->format('d/m/Y') : 'N/A' }}
                </div>

                <!-- Actions Column -->
                <div class="w-[20%] text-center flex justify-center">
                    <a href="{{ route('admin.customers.edit', $customer->userId) }}" class="bg-blue-500 hover:bg-blue-600 text-white px-3 py-1 rounded-lg text-[10px] md:text-xs font-bold uppercase transition duration-300">
                        Edit
                    </a>
                </div>
            </div>
        @empty
            <div class="bg-white dark:bg-gray-800 p-8 rounded-lg text-center text-gray-500 shadow-sm border border-black/5">
                No customers found matching your criteria.
            </div>
        @endforelse
    </div>

    <!-- Pagination -->
    <div class="mt-8 text-black dark:text-white">
        {{ $customers->appends(request()->query())->links() }}
    </div>

    <!-- Back to Dashboard Button -->
    <div class="mt-8 flex justify-center">
        <a href="{{ route('admin.dashboard') }}" class="bg-gray-500 hover:bg-gray-600 text-white px-6 py-2 rounded-lg transition duration-300 uppercase font-bold tracking-widest">
            Back to Dashboard
        </a>
    </div>
</div>
@endsection