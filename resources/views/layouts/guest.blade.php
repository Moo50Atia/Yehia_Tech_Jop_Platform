<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'JobBoard') }}</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=inter:400,500,600,700&display=swap" rel="stylesheet" />

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <style>
        @keyframes fadeInUp {
            from {
                opacity: 0;
                transform: translateY(30px);
            }

            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        @keyframes float {

            0%,
            100% {
                transform: translateY(0px);
            }

            50% {
                transform: translateY(-15px);
            }
        }

        .animate-fade-in-up {
            animation: fadeInUp 0.8s ease-out forwards;
        }

        .animate-float {
            animation: float 6s ease-in-out infinite;
        }

        .delay-100 {
            animation-delay: 0.1s;
        }

        .delay-200 {
            animation-delay: 0.2s;
        }

        .delay-300 {
            animation-delay: 0.3s;
        }
    </style>
</head>

<body class="font-sans text-gray-900 antialiased">
    <div class="min-h-screen flex flex-col sm:justify-center items-center pt-6 sm:pt-0 relative overflow-hidden bg-gradient-to-br from-indigo-50 via-white to-purple-50 dark:from-gray-900 dark:via-gray-950 dark:to-indigo-950">
        <!-- Animated Background Elements -->
        <div class="absolute top-10 left-10 w-64 h-64 bg-indigo-300/20 dark:bg-indigo-500/10 rounded-full blur-3xl animate-float"></div>
        <div class="absolute bottom-10 right-10 w-80 h-80 bg-purple-300/20 dark:bg-purple-500/10 rounded-full blur-3xl animate-float delay-300"></div>
        <div class="absolute top-1/3 right-1/4 w-48 h-48 bg-pink-300/15 dark:bg-pink-500/10 rounded-full blur-3xl animate-float delay-200"></div>

        <!-- Logo -->
        <div class="mb-6 animate-fade-in-up opacity-0" style="animation-fill-mode: forwards;">
            <a href="/" class="flex items-center space-x-3 group">
                <div class="w-14 h-14 bg-gradient-to-br from-indigo-600 to-purple-600 rounded-xl flex items-center justify-center shadow-lg group-hover:shadow-xl transition-all duration-300 group-hover:scale-105">
                    <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 13.255A23.931 23.931 0 0112 15c-3.183 0-6.22-.62-9-1.745M16 6V4a2 2 0 00-2-2h-4a2 2 0 00-2 2v2m4 6h.01M5 20h14a2 2 0 002-2V8a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path>
                    </svg>
                </div>
                <span class="text-2xl font-bold text-gray-900 dark:text-white group-hover:text-indigo-600 dark:group-hover:text-indigo-400 transition-colors">JobBoard</span>
            </a>
        </div>

        <!-- Form Card -->
        <div class="w-full sm:max-w-md px-6 py-8 bg-white/80 dark:bg-gray-800/80 backdrop-blur-xl shadow-2xl overflow-hidden sm:rounded-2xl border border-white/20 dark:border-gray-700/50 animate-fade-in-up opacity-0 delay-100 relative z-10" style="animation-fill-mode: forwards;">
            {{ $slot }}
        </div>

        <!-- Footer -->
        <p class="mt-8 text-sm text-gray-500 dark:text-gray-400 animate-fade-in-up opacity-0 delay-200" style="animation-fill-mode: forwards;">
            © {{ date('Y') }} JobBoard. All rights reserved.
        </p>
    </div>
</body>

</html>