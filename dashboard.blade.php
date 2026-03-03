@extends('layouts.customer-layout')
@section('title','Admin Dashboard')

@section('content')
    <section class="w-[90%] max-w-[1200px] mx-auto py-10 space-y-6">
        <h1 class="text-3xl font-bold text-black dark:text-white">Admin Dashboard</h1>
        <p class="text-base">Welcome, {{ auth()->user()->first_name }}.</p>

        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
            <a href="{{ route('admin.customers.index') }}"
               class="rounded bg-[#989d7f] px-6 py-5 text-black font-semibold hover:bg-[#7a7f63] transition">
                Customer Management
            </a>
        </div>
    </section>
@endsection
