<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    @vite(["resources/css/app.css", "resources/js/app.js"])

    <title>@yield("title", "Solara")</title>
</head>

<body class="min-h-screen flex flex-col bg-gray-50">

    <x-nav-bar /> 
     <main class="flex-grow mx-auto w-full">
        @yield("content")
    </main>

    <x-footer />

</body>
</html>