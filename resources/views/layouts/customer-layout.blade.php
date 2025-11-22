<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    {{--include main source files for css and js--}}
    @vite(["resources/css/app.css", "resources/js/app.js"]);

    {{--page title to display--}}
    <title>@yield("title")</title>
</head>
<body>

    @include("navbar")

    <div>
        @section("page")
        @show
    </div>

    @include()
    @include("footer")

</body>
</html>