<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>@yield('seo_title') | Jirzy Kerklaan</title>
    <meta name="description" content="@yield('seo_description')"/>
    <meta name="author" content="Jirzy Kerklaan">
    <meta property="og:title" content="@yield('seo_og_title')" />
    <meta property="og:description" content="@yield('seo_og_description')">
    <meta property="og:type" content="website">
    <link rel="canonical" href="{{ url()->current() }}">
    <meta name="robots" content="index, follow">

    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="apple-touch-icon" sizes="180x180" href="/apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="/favicon-16x16.png">
    <link rel="manifest" href="/site.webmanifest">
</head>
<body data-barba="wrapper">
    <main data-barba="container" data-barba-namespace="@yield('namespace')">
        @yield('content')
        <progress value="0" max="100"></progress>
    </main>

    <script async src="https://www.googletagmanager.com/gtag/js?id=G-3K805ZZWE4"></script>
    <script>
        window.dataLayer = window.dataLayer || [];
        function gtag(){dataLayer.push(arguments);}
        gtag('js', new Date());

        gtag('config', 'G-3K805ZZWE4');
    </script>
</body>
</html>
