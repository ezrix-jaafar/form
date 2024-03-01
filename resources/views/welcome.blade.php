<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Laravel</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />

    <!-- Styles -->
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">


</head>
    <body class="antialiased bg-gray-100 p-4 md:p-0 flex flex-col items-center justify-center h-screen">
    <img src="{{ asset('images/logo-indigital-80.png') }}" alt="Logo" class="mx-auto mb-5">
    <div class="max-w-sm w-full bg-white rounded-lg shadow-md pt-6 px-4 text-center">
        <h1 class="text-2xl text-gray-700 font-medium">Ads Inquiry</h1>
        <p class="text-sm">We ahave all you advertising need from Facebook,Google, Tiktok & etc</p>
        <img class="pt-4" src="{{ asset('images/ads-screen.png') }}" alt="image-1">
    </div>
    <div class="max-w-sm mt-6 w-full bg-white rounded-lg shadow-md pt-6 px-4 text-center">
        <h1 class="text-2xl text-gray-700 font-medium">Website Inquiry</h1>
        <p class="text-sm">Wa ahave all you advertising need from Facebook,Google, Tiktok & etc</p>
        <img class="pt-4" src="{{ asset('images/ads-screen.png') }}" alt="image-1">
    </div>
</body>
</html>
