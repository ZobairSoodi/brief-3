<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{ URL::asset('style/style.css') }}">
    <link rel="stylesheet" href="{{ URL::asset('style/loader.css') }}">
    <link rel="stylesheet" href="{{ URL::asset('fontawesome/css/all.css') }}">
    @yield('style-link')
    @yield('title')
</head>

<body>
    <nav>
        <ul>
            <li><a href="{{ route('index') }}">Promotions</a></li>
            <li><a href="{{ route('briefs') }}">Briefs</a></li>
            <li><a href="{{ route('add-promotion') }}">Ajouter Promotion</a></li>
        </ul>
    </nav>
    <div class="cont">
        @yield('content')
    </div>
    

    {{-- Loader --}}
    <div id="loading" class="hide-grow">
        <div class="flex-container">
            <div class="flex-item w-3 h-3">
                <div class="loading-icon">
                    <div class="lds-ellipsis">
                        <div></div>
                        <div></div>
                        <div></div>
                        <div></div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    @yield('scripts')
</body>

</html>
