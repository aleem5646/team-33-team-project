<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title', 'Auth')</title>
    
    @vite('resources/css/app.css')
</head>
<body class="bg-gray-50">
    
    <div class="min-h-screen flex items-center justify-center py-12 px-4 sm:px-6 lg:px-8">
        <div class="w-full max-w-md p-8 space-y-6 bg-white shadow-md rounded-lg">
            
            @yield('content')
            
        </div>
    </div>

</body>
</html>