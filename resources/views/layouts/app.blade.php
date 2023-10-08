<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body x-cloak x-data="{darkMode: $persist(false)}" :class="{'dark': darkMode === true }" class="antialiased font-sans">
        <div class="px-8 xl:px-40 2xl:px-96 pt-20 min-h-screen bg-gray-100 dark:bg-gray-900">
            @if(session('success'))
                <div class="absolute top-3 transition duration-300 p-4 mb-4 text-sm text-green-800 rounded-lg bg-green-50 dark:bg-gray-800 dark:text-green-400" role="alert">
                    <p class="font-medium">{{ session('success') }}</p>
                </div>
            @endif

            @if($errors->any())
                @foreach($errors->all() as $error)
                    <div class="absolute top-3 transition duration-300 p-4 mb-4 text-sm text-red-800 rounded-lg bg-red-50 dark:bg-gray-800 dark:text-red-400" role="alert">
                        <span class="font-medium">{{ $error }}</span>
                    </div>
                @endforeach
            @endif

            @include('layouts.navigation')

            <main class="flex pt-4">
                <div class="hidden sm:block md:w-1/4 pe-4">
                    @include('layouts.sidebar')
                </div>
                <div class="w-full md:w-3/4 dark:text-white bg-white dark:bg-gray-800 rounded-lg sm:rounded-3xl p-6">
                    {{ $slot }}
                </div>
            </main>
        </div>
    </body>
</html>
