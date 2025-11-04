@extends('layout')
@section('title','Create an Account')

@section('content')
<div class="flex items-center justify-center py-12 px-4 sm:px-6 lg:px-8">
    <div class="w-full max-w-md p-8 space-y-6 bg-white shadow-md rounded-lg">

        <h2 class="text-3xl font-bold text-center text-gray-900">
            Create an Account
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
        </div>

        <form action="{{ route('registration.post') }}" method="POST" class="space-y-6">
            @csrf
            
            <div>
                <label for="first_name" class="block text-sm font-medium text-gray-700">First name</label>
                <div class="mt-1">
                    <input id="first_name" name="first_name" type="text" autocomplete="given-name" required value="{{ old('first_name') }}"
                           class="w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm placeholder-gray-400
                                  focus:outline-none focus:ring-green-500 focus:border-green-500">
                </div>
            </div>
            
            <div>
                <label for="last_name" class="block text-sm font-medium text-gray-700">Last name</label>
                <div class="mt-1">
                    <input id="last_name" name="last_name" type="text" autocomplete="family-name" required value="{{ old('last_name') }}"
                           class="w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm placeholder-gray-400
                                  focus:outline-none focus:ring-green-500 focus:border-green-500">
                </div>
            </div>

            <div>
                <label for="email" class="block text-sm font-medium text-gray-700">Email address</label>
                <div class="mt-1">
                    <input id="email" name="email" type="email" autocomplete="email" required value="{{ old('email') }}"
                           class="w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm placeholder-gray-400
                                  focus:outline-none focus:ring-green-500 focus:border-green-500">
                </div>
            </div>

            <div>
                <label for="password" class="block text-sm font-medium text-gray-700">Password</label>
                <div class="mt-1">
                    <input id="password" name="hashed_password" type="password" autocomplete="new-password" required
                           class="w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm placeholder-gray-400
                                  focus:outline-none focus:ring-green-500 focus:border-green-500">
                </div>
            </div>

            <div>
                <label for="hashed_password_confirmation" class="block text-sm font-medium text-gray-700">Confirm Password</label>
                <div class="mt-1">
                    <input id="hashed_password_confirmation" name="hashed_password_confirmation" type="password" autocomplete="new-password" required
                           class="w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm placeholder-gray-400
                                  focus:outline-none focus:ring-green-500 focus:border-green-500">
                </div>
            </div>

            <div>
                <button type="submit"
                        class="w-full py-2 px-4 border border-transparent rounded-md shadow-sm text-sm font-medium text-white
                               bg-green-600 hover:bg-green-700
                               focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-green-500">
                    Sign Up
                </button>
            </div>
        </form>

        <div class="text-sm text-center text-gray-600">
            Already have an account?
            <a href="{{ route('login') }}" class="font-medium text-green-600 hover:text-green-500">
                Log In Here.
            </a>
        </div>
    </div>
</div>
@endsection