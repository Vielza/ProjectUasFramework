<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Welcome To Toko Kueku</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />

        <!-- Tailwind CSS CDN -->
        <script src="https://cdn.tailwindcss.com"></script>

        <!-- Custom Styles -->
        <style>
            body {
                font-family: 'Figtree', sans-serif;
            }
            .bg-gradient {
                background: linear-gradient(135deg, #fbc2eb, #a6c1ee);
            }
            .welcome-title {
                animation: fadeInDown 1s ease-in-out;
            }
            .welcome-subtitle {
                animation: fadeInUp 1s ease-in-out;
            }
            @keyframes fadeInDown {
                from {
                    opacity: 0;
                    transform: translateY(-20px);
                }
                to {
                    opacity: 1;
                    transform: translateY(0);
                }
            }
            @keyframes fadeInUp {
                from {
                    opacity: 0;
                    transform: translateY(20px);
                }
                to {
                    opacity: 1;
                    transform: translateY(0);
                }
            }
        </style>
    </head>
    <body class="antialiased bg-gradient min-h-screen flex flex-col justify-center items-center text-gray-800">
        <!-- Welcome Container -->
        <div class="text-center space-y-6 px-4">
            <!-- Title -->
            <div class="welcome-title text-5xl font-bold text-gray-900">
                Welcome to <span class="text-blue-500">Toko Kueku</span>
            </div>
            <!-- Subtitle -->
            <div class="welcome-subtitle text-xl font-medium text-gray-700">
                Your one-stop shop for <span class="text-pink-500 font-semibold">delicious "cakes"</span> and pastries
            </div>
            <!-- Buttons -->
            <div class="welcome-buttons flex justify-center space-x-4">
                @if (Route::has('login'))
                    @auth
                        <a href="{{ url('/home') }}" class="bg-blue-500 hover:bg-blue-600 text-white font-semibold px-6 py-3 rounded-lg shadow-md transition">
                            Dashboard
                        </a>
                    @else
                        <a href="{{ route('login') }}" class="bg-green-500 hover:bg-green-600 text-white font-semibold px-6 py-3 rounded-lg shadow-md transition">
                            Log in
                        </a>
                        @if (Route::has('register'))
                            <a href="{{ route('register') }}" class="bg-purple-500 hover:bg-purple-600 text-white font-semibold px-6 py-3 rounded-lg shadow-md transition">
                                Register
                            </a>
                        @endif
                    @endauth
                @endif
            </div>
        </div>

        <!-- Footer -->
        <footer class="mt-12 text-gray-600 text-sm">
            &copy; {{ date('Y') }} Toko Kueku. All rights are lefts.
        </footer>
    </body>
</html>
