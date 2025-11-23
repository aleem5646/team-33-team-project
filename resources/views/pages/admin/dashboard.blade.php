@extends('layout')
@section('title','Admin Dashboard')

@section('content')
    <div class="container mx-auto px-4 py-8">
        <h1 class="text-3xl font-bold">Admin Dashboard</h1>
        <p class="mt-4">Welcome, {{ auth()->user()->first_name }}.</p>
    </div>
@endsection