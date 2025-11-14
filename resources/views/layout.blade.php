<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title', 'My App')</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    @vite('resources/css/app.css')
</head>
<body class="flex flex-col min-h-screen bg-gray-50">
    
    @include('include.header')

    <main class="flex-grow">
        @yield('content')
    </main>

    <footer class="bg-yellow-50/50 border-t border-gray-200">
        <div class="container mx-auto px-4 py-8 grid grid-cols-1 md:grid-cols-2 gap-8">
            <div>
                <h3 class="font-semibold text-gray-900 mb-2">CONTACT INFO</h3>
            </div>
            
            <div class="bg-white p-4 rounded-lg shadow">
                <h3 class="font-semibold text-gray-900 mb-2">WEBSITE INFO</h3>
                <p class="text-sm text-gray-600">(terms, privacy, etc...)</p>
            </div>
        </div>
    </footer>
    
    <div class="fixed bottom-4 right-4">
        <button class="bg-green-600 text-white w-14 h-14 rounded-full flex items-center justify-center shadow-lg">
            Chat
        </button>
    </div>

    <div id="2fa-modal" class="fixed inset-0 z-50 flex items-center justify-center hidden">
        <div class="bg-white p-8 rounded-lg shadow-xl w-full max-w-sm">
            
            <h2 class="text-2xl font-bold text-center mb-4">Check Your Email</h2>
            <p class="text-center text-gray-600 mb-6">We've sent a 6-digit code to your email. Please enter it below.</p>

            <form id="2fa-form">
                <input type="hidden" id="2fa_user_id" name="userId" value="">

                <div>
                    <label for="2fa_code" class="block text-sm font-medium text-gray-700">6-Digit Code</label>
                    <div class="mt-1">
                        <input id="2fa_code" name="code" type="text" inputmode="numeric" pattern="\d{6}" required
                               class="w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm placeholder-gray-400
                                      focus:outline-none focus:ring-green-500 focus:border-green-500 text-center text-2xl tracking-widest">
                    </div>
                </div>

                <div class="mt-6">
                    <button type="submit" id="2fa-verify-button"
                            class="w-full py-2 px-4 border border-transparent rounded-md shadow-sm text-sm font-medium text-white
                                   bg-green-600 hover:bg-green-700
                                   focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-green-500">
                        Verify
                    </button>
                </div>

                <div id="2fa-error" class="text-red-600 text-sm text-center mt-4"></div>
            </form>

            <button id="2fa-close-button" class="text-gray-500 hover:text-gray-700 text-sm mt-4 text-center w-full">Cancel</button>
        </div>
    </div>
<script>
        window.appRoutes = {
            login: '{{ route('login.post') }}',
            registration: '{{ route('registration.post') }}',
            verifyCode: '{{ route('code.verify') }}'
        };
    </script>
    @vite('resources/js/app.js')

</body>
</html>