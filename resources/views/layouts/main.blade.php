<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title')</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
</head>
<body>
    <div class="container">
        <div class="row">
            <nav>
                <ul>
                    <li><a href="{{ route('main') }}">Main</a></li>
                    <li><a href="{{ route('posts.index') }}">Posts</a></li>
                    <li><a href="{{ route('contacts') }}">Contacts</a></li>
                    <li><a href="{{ route('about') }}">About</a></li>
                </ul>
            </nav>
        </div>
    </div>
    @yield('content')
</body>
</html>