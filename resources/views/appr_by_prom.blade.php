<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Laravel</title>
</head>

<body>
    <h1>{{ $appr[0]->nom_prom }}</h1>
    <div>
        @foreach ($appr as $row)
            {{ $row->nom_appr }}
        @endforeach
    </div>
</body>

</html>
