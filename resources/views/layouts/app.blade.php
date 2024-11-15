<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>
        @if (request()->is('admin/dashboard'))
        {{ config('app.name', 'SIMANTAN') }} | Admin Dashboard
        @elseif (request()->is('admin/data-tanaman'))
        {{ config('app.name', 'SIMANTAN') }} | Data Tanaman
        @elseif (request()->is('admin/data-pupuk'))
        {{ config('app.name', 'SIMANTAN') }} | Data Pupuk
        @elseif (request()->is('admin/data-pestisida'))
        {{ config('app.name', 'SIMANTAN') }} | Data Pestisida
        @else
        {{ config('app.name', 'SIMANTAN') }}
        @endif
    </title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="font-sans antialiased">
    @include('layouts.navigation')
    <div class="flex h-screen bg-gray-100 dark:bg-gray-900">
        @include('layouts.sidebar')
        <!-- Page Heading -->
        @isset($header)
        <header class="bg-white dark:bg-gray-800 shadow">
            <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                {{ $header }}
            </div>
        </header>
        @endisset

        <!-- Page Content -->
        <main class="container overflow-auto">
            {{ $slot }}
        </main>
    </div>
</body>

</html>