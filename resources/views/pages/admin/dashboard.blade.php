@extends('layouts.customer-layout')
@section('title','Admin Dashboard')

@section('content')
    <div class="container mx-auto px-4 py-8">
        <h1 class="text-3xl font-bold text-gray-800 dark:text-white mb-6">Admin Dashboard</h1>
        <p class="mt-4 mb-8 text-lg text-gray-600 dark:text-gray-300">Welcome, {{ auth()->user()->first_name }}.</p>

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
            <!-- Reports Link -->
            <a href="{{ route('admin.reports') }}" class="block p-6 bg-white dark:bg-gray-800 rounded-xl shadow-md hover:shadow-lg transition duration-300 border-t-4 border-green-500 text-center">
                <h2 class="text-xl font-bold text-gray-800 dark:text-white uppercase tracking-wider">Reports</h2>
                <p class="text-gray-500 dark:text-gray-400 mt-2">View sales, orders, and sustainability metrics.</p>
            </a>
            
            <!-- You can add more admin sections here -->
        </div>
    </div>
@endsection