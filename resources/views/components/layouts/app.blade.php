<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">

        <title>{{ $title ?? 'UV' }}</title>

        @if (file_exists(public_path('build/manifest.json')) || file_exists(public_path('hot')))
            @vite(['resources/css/app.css'])
        @endif
    </head>
    <body>
        {{ $slot }}

        <!-- <script src="//cdnjs.cloudflare.com/ajax/libs/ScrollMagic/2.0.8/ScrollMagic.js"></script> -->
        @vite([
            'resources/js/app.js',
        ])
    </body>
</html>
