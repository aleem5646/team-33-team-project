@extends('layouts.customer-layout')
@section('title','2FA Verification')

@section('content')
<div class="flex items-center justify-center py-12 px-4 sm:px-6 lg:px-8">
    <div class="w-full max-w-md p-8 space-y-6 bg-white shadow-md rounded-lg">

        <h2 class="text-3xl font-bold text-center text-gray-900">
            Check Your Email
        </h2>
        <p class="text-center text-sm text-gray-600">
            We sent a 6-digit code to your email.
        </p>

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

        <form action="{{ route('2fa.verify') }}" method="POST" class="space-y-6">
            @csrf

            <div>
                <label for="code" class="block text-sm font-medium text-gray-700">6-Digit Code</label>
                <div class="mt-1">
                    <input id="code" name="code" type="text" inputmode="numeric" pattern="\d{6}" required
                           class="w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm placeholder-gray-400
                                  focus:outline-none focus:ring-green-500 focus:border-green-500">
                </div>
            </div>

            <div>
                <button type="submit"
                        class="w-full py-2 px-4 border border-transparent rounded-md shadow-sm text-sm font-medium text-white
                               bg-green-600 hover:bg-green-700
                               focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-green-500">
                    Verify and Log In
                </button>
            </div>
        </form>
    </div>
</div>
@endsection