<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @vite(["resources/css/app.css", "resources/js/app.js"])
    <title>@yield('title')</title>
    <style>
        html, body {
            margin: 0;
            padding: 0;
            min-height: 100%;
            display: flex;
            flex-direction: column;
        }
        .content-wrapper {
            flex: 1;
        }
        .chatbot-icon {
            text-align: right;
            padding: 10px 20px;
        }
    </style>
</head>
<body>
    @include('include.header')

    <div class="content-wrapper">
        @yield('content')

        <div class="chatbot-icon">
            <button style="background: none; border: none; cursor: pointer;">
                <svg xmlns="http://www.w3.org/2000/svg" fill="#69714a" viewBox="0 0 24 24" width="36" height="36">
                    <path d="M12 2C6.5 2 2 6 2 11c0 2.4 1.2 4.6 3.1 6.2-.1.9-.6 2.3-1.9 3.3-.2.2-.3.5-.2.8.1.3.4.5.7.5 1.9 0 3.5-.6 4.6-1.2 1.3.4 2.6.6 4 .6 5.5 0 10-4 10-9S17.5 2 12 2z"/>
                </svg>
            </button>
        </div>

        @include('include.footer')
    </div>
</body>
</html>
