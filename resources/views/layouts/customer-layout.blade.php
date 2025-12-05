<!DOCTYPE html>
<html lang="en" class="overflow-y-scroll">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    @vite(["resources/css/app.css", "resources/js/app.js"])
    <title>@yield('title')</title>
</head>
<body class="m-0 p-0 min-h-screen flex flex-col font-sans">
    @include('include.header')

    <div class="flex-1 flex flex-col">
        @yield('content')


    </div>

    @include('include.footer')


    <div id="2fa-modal" class="hidden fixed inset-0 bg-gray-600 bg-opacity-50 overflow-y-auto h-full w-full z-50">
        <div class="relative top-20 mx-auto p-5 border w-96 shadow-lg rounded-md bg-white">
            <div class="mt-3 text-center">
                <h3 class="text-lg leading-6 font-bold text-gray-900">Two-Factor Authentication</h3>
                <div class="mt-2 px-7 py-3">
                    <p class="text-sm text-gray-500 mb-4">
                        Please enter the 6-digit code sent to your email.
                    </p>
                    <form id="2fa-form">
                        <input type="hidden" id="2fa_user_id" name="userId">
                        <input type="text" id="2fa_code" name="code" 
                               class="mt-2 px-3 py-2 border border-gray-300 rounded-md w-full focus:outline-none focus:ring-green-500 focus:border-green-500" 
                               placeholder="Enter 6-digit Code" required>
                        <p id="2fa-error" class="text-red-500 text-sm mt-2 font-medium"></p>
                        <div class="items-center px-4 py-3 mt-4">
                            <button type="submit" id="2fa-verify-button" 
                                    class="px-4 py-2 bg-green-600 text-white text-base font-medium rounded-md w-full shadow-sm hover:bg-green-700 focus:outline-none focus:ring-2 focus:ring-green-500">
                                Verify
                            </button>
                        </div>
                    </form>
                </div>
                <div class="items-center px-4 py-3">
                    <button id="2fa-close-button" 
                            class="px-4 py-2 bg-gray-300 text-gray-700 text-base font-medium rounded-md w-full shadow-sm hover:bg-gray-400 focus:outline-none focus:ring-2 focus:ring-gray-300">
                        Close
                    </button>
                </div>
            </div>
        </div>
    </div>

    <script>
        window.appRoutes = {
            login: "{{ route('login.post') }}",
            registration: "{{ route('registration.post') }}",
            verifyCode: "{{ route('code.verify') }}"
        };
    </script>
        <div class="text-right px-5 py-2.5 mt-auto">
            <button class="bg-none border-none cursor-pointer">
                <svg xmlns="http://www.w3.org/2000/svg" fill="#69714a" viewBox="0 0 24 24" width="36" height="36">
                    <path d="M12 2C6.5 2 2 6 2 11c0 2.4 1.2 4.6 3.1 6.2-.1.9-.6 2.3-1.9 3.3-.2.2-.3.5-.2.8.1.3.4.5.7.5 1.9 0 3.5-.6 4.6-1.2 1.3.4 2.6.6 4 .6 5.5 0 10-4 10-9S17.5 2 12 2z"/>
                </svg>
            </button>
        </div>
    </div>

    @include('include.footer')
</body>
</html>
