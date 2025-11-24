<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title', 'My App')</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    @vite(["resources/css/app.css", "resources/js/app.js"])
    <link rel="icon" type="image/png" href="{{ asset('C:\Repos\team-33-team-project\public\favicon.ico') }}">

</head>

<body class="flex flex-col min-h-screen bg-gray-50">

    @include('include.header')

    <main class="flex-grow">
        @yield('content')
    </main>

    <div class="fixed right-6 bottom-28 z-50">
        <button type="button" class="bg-transparent border-0 cursor-pointer">
            <svg xmlns="http://www.w3.org/2000/svg" fill="#69714a" viewBox="0 0 24 24" width="36" height="36">
                <path d="M12 2C6.5 2 2 6 2 11c0 2.4 1.2 4.6 3.1 6.2-.1.9-.6 2.3-1.9 3.3-.2.2-.3.5-.2.8.1.3.4.5.7.5 1.9 0 3.5-.6 4.6-1.2 1.3.4 2.6.6 4 .6 5.5 0 10-4 10-9S17.5 2 12 2z"/>
            </svg>
        </button>
    </div>

    @include('include.footer')

</body>
</html>
