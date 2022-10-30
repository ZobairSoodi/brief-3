<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{ URL::asset('css/style.css') }}">
    @yield('style-link')
    @yield('title')
</head>
<body>
    <nav>
        <ul>
            <li><a href="{{ route('index') }}">Promotions</a></li>
            <li><a href="{{ route('add-promotion') }}">Ajouter Promotion</a></li>
        </ul>
    </nav>
    <div class="cont">
        @yield('content')
    </div>

    @yield('scripts')
</body>
</html>