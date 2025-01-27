<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Toko Kuwe') }}</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])

        <!-- Custom Styles -->
        <style>
            body {
                font-family: 'Figtree', sans-serif;
                background: linear-gradient(to bottom right, #fde68a, #fca5a5);
                color: #374151;
            }
            .header-container {
                background: linear-gradient(to right, #fbcfe8, #a5b4fc);
                box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            }
            .header-title {
                font-size: 1.875rem; /* text-2xl */
                font-weight: 600; /* font-semibold */
                color: #1f2937;
            }
            .nav-link:hover {
                color: #2563eb;
                text-decoration: underline;
            }
            main {
                padding: 2rem 0;
            }
        </style>
    </head>
    <body class="font-sans antialiased">
        <div class="min-h-screen bg-gradient-to-br from-pink-100 via-purple-50 to-blue-50">
            @include('layouts.navigation')

            <!-- Page Heading -->
            @if (isset($header))
                <header class="header-container">
                    <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                        <h1 class="header-title">{{ $header }}</h1>
                    </div>
                </header>
            @endif

            <!-- Page Content -->
            <main>
                <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                    {{ $slot }}
                </div>
            </main>
        </div>
    </body>
</html>
