@extends('layouts.customer-layout')
@section('title','Home Page')

@section('content')
<div class="container mx-auto px-4 py-8">
    <h1 class="text-3xl font-bold">Welcome to the Home Page</h1>

    @auth
        <p class="mt-2">You are logged in as {{ auth()->user()->first_name }}.</p>
    @endauth
    
    @guest
        <p class="mt-2">
            Please
            <a href="{{ route('login') }}" class="text-green-600">log in</a>
            or
            <a href="{{ route('registration') }}" class="text-green-600">sign up</a>.
        </p>
    @endguest
</div>
@endsection
