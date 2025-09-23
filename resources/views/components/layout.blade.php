<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>{{ config('app.name', 'Laravel') }}</title>
        <script src="https://kit.fontawesome.com/313e3e65d7.js" crossorigin="anonymous"></script>
        @vite('resources/css/app.css')
    </head>
    <body>

    <x-header />

        <main>
            {{ $slot }}
        </main>

    <x-footer />

    </body>
</html>
