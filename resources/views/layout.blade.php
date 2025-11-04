<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title', 'My App')</title>
    
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

</body>
</html>