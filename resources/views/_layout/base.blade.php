<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>@yield('title') | Jirzy Kerklaan</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body data-barba="wrapper">
    <main data-barba="container" data-barba-namespace="@yield('namespace')">
        @yield('content')
    </main>
</body>
</html>
