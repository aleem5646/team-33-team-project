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
                <div class="mt-1 relative">
                    <input id="password" name="password" type="password" autocomplete="new-password" required
                           class="w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm placeholder-gray-400
                                  focus:outline-none focus:ring-green-500 focus:border-green-500
                                  ring-2 ring-green-500 border-transparent">
                    <button type="button" class="absolute inset-y-0 right-0 pr-3 flex items-center text-gray-500" data-toggle-password-for="password">
                        <svg class="h-5 w-5" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M2.036 12.322a1.012 1.012 0 010-.639C3.423 7.51 7.36 4.5 12 4.5c4.638 0 8.573 3.007 9.963 7.178.07.207.07.431 0 .639C20.577 16.49 16.64 19.5 12 19.5c-4.638 0-8.573-3.007-9.963-7.178z" />
                            <path stroke-linecap="round" stroke-linejoin="round" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                        </svg>
                        <svg class="h-5 w-5 hidden" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M3.98 8.223A.997.997 0 003 9.217c-.306.068-.617.145-.923.235A.996.996 0 001.03 10.7c1.399 4.31 5.232 7.3 9.97 7.3s8.57-2.99 9.97-7.3c.045-.137.028-.29-.053-.411s-.21-.2-.35-.235c-.305-.09-.617-.167-.923-.235a.997.997 0 00-1.028.994c-.013.39-.028.777-.044 1.162.001.02.002.04.002.06v.003c0 .017 0 .03.002.046a4.5 4.5 0 01-8.916 0c.002-.016.002-.029.002-.046v-.003c0-.02.001-.04.002-.06-.016-.385-.03-.772-.044-1.162a.997.997 0 00-1.028-.994z" />
                            <path stroke-linecap="round" stroke-linejoin="round" d="M15 12a3 3 0 11-6 0 3 3 0 016 0zM21 12c-1.39 4.31-5.223 7.3-9.97 7.3s-8.57-2.99-9.97-7.3M3 12c1.39-4.31 5.223-7.3 9.97-7.3s8.57 2.99 9.97 7.3" />
                        </svg>
                    </button>
                </div>
                <div class="text-red-600 text-sm mt-1">@error('password') {{ $message }} @enderror</div>
            </div>
            
            <div>
                <label for="password_confirmation" class="block text-sm font-medium text-gray-700">Confirm Password</label>
                <div class="mt-1 relative">
                    <input id="password_confirmation" name="password_confirmation" type="password" autocomplete="new-password" required
                           class="w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm placeholder-gray-400
                                  focus:outline-none focus:ring-green-500 focus:border-green-500">
                    <button type="button" class="absolute inset-y-0 right-0 pr-3 flex items-center text-gray-500" data-toggle-password-for="password_confirmation">
                        <svg class="h-5 w-5" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M2.036 12.322a1.012 1.012 0 010-.639C3.423 7.51 7.36 4.5 12 4.5c4.638 0 8.573 3.007 9.963 7.178.07.207.07.431 0 .639C20.577 16.49 16.64 19.5 12 19.5c-4.638 0-8.573-3.007-9.963-7.178z" />
                            <path stroke-linecap="round" stroke-linejoin="round" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                        </svg>
                        <svg class="h-5 w-5 hidden" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M3.98 8.223A.997.997 0 003 9.217c-.306.068-.617.145-.923.235A.996.996 0 001.03 10.7c1.399 4.31 5.232 7.3 9.97 7.3s8.57-2.99 9.97-7.3c.045-.137.028-.29-.053-.411s-.21-.2-.35-.235c-.305-.09-.617-.167-.923-.235a.997.997 0 00-1.028.994c-.013.39-.028.777-.044 1.162.001.02.002.04.002.06v.003c0 .017 0 .03.002.046a4.5 4.5 0 01-8.916 0c.002-.016.002-.029.002-.046v-.003c0-.02.001-.04.002-.06-.016-.385-.03-.772-.044-1.162a.997.997 0 00-1.028-.994z" />
                            <path stroke-linecap="round" stroke-linejoin="round" d="M15 12a3 3 0 11-6 0 3 3 0 016 0zM21 12c-1.39 4.31-5.223 7.3-9.97 7.3s-8.57-2.99-9.97-7.3M3 12c1.39-4.31 5.223-7.3 9.97-7.3s8.57 2.99 9.97 7.3" />
                        </svg>
                    </button>
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