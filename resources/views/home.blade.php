<html>
<head>
    <title>Home | Jirzy Kerklaan</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body>
    @include('_components.hero')
    @include('_components.manifesto')
    @include('_components.right-now')
    @include('_components.projects')
    @include('_components.contact')

    <div id="custom-cursor">
        <img id="cursor-img" src=""/>
    </div>
</body>
</html>
