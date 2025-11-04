@extends('layout')
@section('title','Set New Password')

@section('content')
<div class="flex items-center justify-center py-12 px-4 sm:px-6 lg:px-8">
    <div class="w-full max-w-md p-8 space-y-6 bg-white shadow-md rounded-lg">

        <h2 class="text-3xl font-bold text-center text-gray-900">
            Set New Password
        </h2>
        <p class="mt-2 text-center text-sm text-gray-600">
            Enter your new password below.
        </p>

        <div class="mt-8">
            @if ($errors->any())
                <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative mb-4" role="alert">
                    @foreach ($errors->all() as $error)
                        <span class="block sm:inline">{{ $error }}</span><br>
                    @endforeach
                </div>
            @endif
        </div>

        <form action="{{ route('password.update') }}" method="POST" class="space-y-6">
            @csrf
            
            <input type="hidden" name="token" value="{{ $token }}">
            
            <div>
                <label for="email" class="block text-sm font-medium text-gray-700">Email</label>
                <div class="mt-1">
                    <input id="email" name="email" type="email" value="{{ $request->email ?? old('email') }}" required readonly
                           class="w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm bg-gray-100
                                  focus:outline-none focus:ring-green-500 focus:border-green-500">
                </div>
            </div>

            <div>
                <label for="password" class="block text-sm font-medium text-gray-700">New Password</label>
                <div class="mt-1">
                    <input id="password" name="password" type="password" autocomplete="new-password" required
                           class="w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm placeholder-gray-400
                                  focus:outline-none focus:ring-green-500 focus:border-green-500
                                  ring-2 ring-green-500 border-transparent">
                </div>
            </div>
            
            <div>
                <label for="password_confirmation" class="block text-sm font-medium text-gray-700">Confirm Password</label>
                <div class="mt-1">
                    <input id="password_confirmation" name="password_confirmation" type="password" autocomplete="new-password" required
                           class="w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm placeholder-gray-400
                                  focus:outline-none focus:ring-green-500 focus:border-green-500">
                </div>
            </div>

            <div>
                <button type="submit"
                        class="w-full py-2 px-4 border border-transparent rounded-md shadow-sm text-sm font-medium text-white
                               bg-green-600 hover:bg-green-700
                               focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-green-500">
                    Change Password
                </button>
            </div>
        </form>
    </div>
</div>
@endsection