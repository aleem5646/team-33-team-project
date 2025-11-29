<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @vite(["resources/css/app.css", "resources/js/app.js"])
    <title>@yield('title')</title>
</head>
<body class="min-h-screen flex flex-col m-0 p-0">
    @include('include.header')

    <div class="flex-1 flex flex-col">
        @yield('content')

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