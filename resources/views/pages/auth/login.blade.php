@extends('layouts.customer-layout')
@section('title','Login')

@section('content')
<div class="flex items-center justify-center py-12 px-4 sm:px-6 lg:px-8">
    <div class="w-full max-w-md p-8 space-y-6 bg-white shadow-md rounded-lg">
        
        <h2 class="text-3xl font-bold text-center text-gray-900">
            Login
        </h2>

        <div class="mt-8">
            @if ($errors->any())
                <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative mb-4" role="alert">
                    @foreach ($errors->all() as $error)
                        <span class="block sm:inline">{{ $error }}</span><br>
                    @endforeach
                </div>
            @endif
            @if(session()->has('error'))
                <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative mb-4" role="alert">
                    {{ session('error') }}
                </div>
            @endif
            @if(session()->has('success'))
                <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative mb-4" role="alert">
                    {{ session('success') }}
                </div>
            @endif
        </div>

        <form action="{{ route('login.post') }}" method="POST" class="space-y-6">
            @csrf

            <div id="login-error" class="text-red-600 text-sm -my-2 text-center" role="alert"></div>
            
            <div>
                <label for="email" class="block text-sm font-medium text-gray-700">Email address</label>
                <div class="mt-1">
                    <input id="email" name="email" type="email" autocomplete="email" required
                           class="w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm placeholder-gray-400
                                  focus:outline-none focus:ring-green-500 focus:border-green-500">
                </div>
            </div>

            <div>
                <label for="password" class="block text-sm font-medium text-gray-700">Password</label>
                <div class="mt-1">
                    <input id="password" name="hashed_password" type="password" autocomplete="current-password" required
                           class="w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm placeholder-gray-400
                                  focus:outline-none focus:ring-green-500 focus:border-green-500">
                </div>
            </div>

            <div class="text-sm text-right">
                <a href="{{ route('password.request') }}" class="font-medium text-green-600 hover:text-green-500">
                    Forgot your password?
                </a>
            </div>

            <div>
                <button type="submit"
                        class="w-full py-2 px-4 border border-transparent rounded-md shadow-sm text-sm font-medium text-white
                               bg-green-600 hover:bg-green-700
                               focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-green-500">
                    Login
                </button>
            </div>
        </form>

        <div class="text-sm text-center text-gray-600">
            Don't have an account?
            <a href="{{ route('registration') }}" class="font-medium text-green-600 hover:text-green-500">
                Sign Up Here.
            </a>
        </div>

    </div>
</div>
@endsection