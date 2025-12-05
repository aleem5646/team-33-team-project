@extends('layouts.customer-layout')
@section('title','Password Reset')

@section('content')
<div class="flex items-center justify-center py-12 px-4 sm:px-6 lg:px-8">
    <div class="w-full max-w-md p-8 space-y-6 bg-white dark:bg-gray-800 shadow-md rounded-lg">

        <h2 class="text-3xl font-bold text-center text-gray-900 dark:text-white">
            Password Reset
        </h2>
        <p class="mt-2 text-center text-sm text-gray-600 dark:text-gray-400">
            Provide the email address associated with your account to recover your password.
        </p>

        <div class="mt-8">
            @if(session('status'))
                <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative mb-4" role="alert">
                    {{ session('status') }}
                </div>
            @endif
            @if ($errors->any())
                <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative mb-4" role="alert">
                    @foreach ($errors->all() as $error)
                        <span class="block sm:inline">{{ $error }}</span><br>
                    @endforeach
                </div>
            @endif
        </div>

        <form action="{{ route('password.email') }}" method="POST" class="space-y-6">
            @csrf
            
            <div>
                <label for="email" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Email*</label>
                <div class="mt-1">
                    <input id="email" name="email" type="email" autocomplete="email" required
                           class="w-full px-3 py-2 border border-gray-300 dark:border-gray-600 rounded-md shadow-sm placeholder-gray-400 dark:bg-gray-700 dark:text-white
                                  focus:outline-none focus:ring-green-500 focus:border-green-500
                                  ring-2 ring-green-500 border-transparent">
                </div>
            </div>

            <div>
                <button type="submit"
                        class="w-full py-2 px-4 border border-transparent rounded-md shadow-sm text-sm font-medium text-white
                               bg-green-600 hover:bg-green-700
                               focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-green-500">
                    Reset Password
                </button>
            </div>
        </form>

        <div class="text-sm text-center text-gray-600 dark:text-gray-400 space-x-4">
            <a href="{{ route('login') }}" class="font-medium text-green-600 hover:text-green-500">
                Login
            </a>
            <a href="{{ route('registration') }}" class="font-medium text-green-600 hover:text-green-500">
                Register
            </a>
        </div>
    </div>
</div>
@endsection