<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Laravel | Homepage</title>
    <script src="https://cdn.tailwindcss.com"></script>

    <style>
        body{
            background-color: lightgray;
        }
    </style>
</head>
<body>

    <header></header>

    {{$slot}}

    <footer></footer>

</body>
</html>
