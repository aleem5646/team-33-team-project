<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    {{--include main source files for css and js--}}
    @vite(["resources/css/app.css", "resources/js/app.js"])

    {{--page title to display--}}
    <title>@yield("title", "Solara")</title>
</head>
<body>

    <x-nav-bar /> 

    <main class="mx-auto">
        @yield("content")
    </main>

    <x-footer />

</body>
</html>