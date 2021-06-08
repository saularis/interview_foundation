<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Github Starred Repo</title>
        <link rel="stylesheet" href="css/app.css">
    </head>
    <body>
        <div id="root">
            @yield('content')
            <!-- <starred-repo></starred-repo> -->
        </div>
        <script src="/js/app.js"></script>
    </body>
</html>