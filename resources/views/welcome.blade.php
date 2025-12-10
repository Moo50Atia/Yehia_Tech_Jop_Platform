<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ config('app.name', 'Job Board') }} - Find Your Dream Job</title>
    <meta name="description" content="Find your next career opportunity with our job board platform. Connect with top companies and discover amazing job opportunities.">

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=inter:400,500,600,700,800&display=swap" rel="stylesheet" />

    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <style>
        /* Custom Animations */
        @keyframes float {

            0%,
            100% {
                transform: translateY(0px);
            }

            50% {
                transform: translateY(-20px);
            }
        }

        @keyframes fadeInUp {
            from {
                opacity: 0;
                transform: translateY(40px);
            }

            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        @keyframes fadeInLeft {
            from {
                opacity: 0;
                transform: translateX(-40px);
            }

            to {
                opacity: 1;
                transform: translateX(0);
            }
        }

        @keyframes fadeInRight {
            from {
                opacity: 0;
                transform: translateX(40px);
            }

            to {
                opacity: 1;
                transform: translateX(0);
            }
        }

        @keyframes pulse-slow {

            0%,
            100% {
                opacity: 1;
            }

            50% {
                opacity: 0.7;
            }
        }

        @keyframes gradient-shift {
            0% {
                background-position: 0% 50%;
            }

            50% {
                background-position: 100% 50%;
            }

            100% {
                background-position: 0% 50%;
            }
        }

        .animate-float {
            animation: float 6s ease-in-out infinite;
        }

        .animate-fade-in-up {
            animation: fadeInUp 1s ease-out forwards;
        }

        .animate-fade-in-left {
            animation: fadeInLeft 1s ease-out forwards;
        }

        .animate-fade-in-right {
            animation: fadeInRight 1s ease-out forwards;
        }

        .animate-pulse-slow {
            animation: pulse-slow 3s ease-in-out infinite;
        }

        .gradient-animate {
            background-size: 200% 200%;
            animation: gradient-shift 8s ease infinite;
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

        .delay-500 {
            animation-delay: 0.5s;
        }

        .delay-700 {
            animation-delay: 0.7s;
        }
    </style>
</head>

<body class="font-sans antialiased bg-gray-50 dark:bg-gray-950">
    <!-- Navigation -->
    <nav class="fixed w-full z-50 bg-white/80 dark:bg-gray-900/80 backdrop-blur-lg border-b border-gray-200 dark:border-gray-800">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between h-16">
                <div class="flex items-center">
                    <!-- Logo -->
                    <a href="/" class="flex items-center space-x-2">
                        <div class="w-10 h-10 bg-gradient-to-br from-indigo-600 to-purple-600 rounded-xl flex items-center justify-center">
                            <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 13.255A23.931 23.931 0 0112 15c-3.183 0-6.22-.62-9-1.745M16 6V4a2 2 0 00-2-2h-4a2 2 0 00-2 2v2m4 6h.01M5 20h14a2 2 0 002-2V8a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path>
                            </svg>
                        </div>
                        <span class="text-xl font-bold text-gray-900 dark:text-white">JobBoard</span>
                    </a>
                </div>

                <div class="flex items-center space-x-4">
                    @if (Route::has('login'))
                    @auth
                    @if (auth()->user()->role == 'jop_seeker')
                    <a href="{{ route('seeker.dashboard') }}" class="px-4 py-2 text-sm font-medium text-gray-700 dark:text-gray-200 hover:text-indigo-600 dark:hover:text-indigo-400 transition-colors">
                        Dashboard
                    </a>
                    @elseif (auth()->user()->role == 'company_owner')
                    <a href="{{ route('company.dashboard') }}" class="px-4 py-2 text-sm font-medium text-gray-700 dark:text-gray-200 hover:text-indigo-600 dark:hover:text-indigo-400 transition-colors">
                        Dashboard
                    </a>
                    @endif
                    @else
                    <a href="{{ route('login') }}" class="px-4 py-2 text-sm font-medium text-gray-700 dark:text-gray-200 hover:text-indigo-600 dark:hover:text-indigo-400 transition-colors">
                        Log in
                    </a>
                    @if (Route::has('register'))
                    <a href="{{ route('register') }}" class="px-5 py-2.5 text-sm font-semibold text-white bg-gradient-to-r from-indigo-600 to-purple-600 rounded-lg hover:from-indigo-700 hover:to-purple-700 shadow-lg hover:shadow-xl transition-all duration-300 transform hover:scale-105">
                        Get Started
                    </a>
                    @endif
                    @endauth
                    @endif
                </div>
            </div>
        </div>
    </nav>

    <!-- Hero Section -->
    <section class="relative min-h-screen flex items-center pt-16 overflow-hidden">
        <!-- Animated Background -->
        <div class="absolute inset-0 bg-gradient-to-br from-indigo-50 via-white to-purple-50 dark:from-gray-900 dark:via-gray-950 dark:to-indigo-950"></div>

        <!-- Floating Elements -->
        <div class="absolute top-20 left-10 w-72 h-72 bg-indigo-300/30 dark:bg-indigo-500/10 rounded-full blur-3xl animate-float"></div>
        <div class="absolute bottom-20 right-10 w-96 h-96 bg-purple-300/30 dark:bg-purple-500/10 rounded-full blur-3xl animate-float delay-300"></div>
        <div class="absolute top-1/2 left-1/2 w-64 h-64 bg-pink-300/20 dark:bg-pink-500/10 rounded-full blur-3xl animate-float delay-500"></div>

        <div class="relative max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-12 lg:py-20">
            <div class="grid lg:grid-cols-2 gap-12 items-center">
                <!-- Left Content -->
                <div class="text-center lg:text-left">
                    <div class="animate-fade-in-up opacity-0" style="animation-fill-mode: forwards;">
                        <span class="inline-flex items-center px-4 py-1.5 rounded-full text-sm font-medium bg-indigo-100 dark:bg-indigo-900/50 text-indigo-700 dark:text-indigo-300 mb-6">
                            <svg class="w-4 h-4 mr-2" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M6.267 3.455a3.066 3.066 0 001.745-.723 3.066 3.066 0 013.976 0 3.066 3.066 0 001.745.723 3.066 3.066 0 012.812 2.812c.051.643.304 1.254.723 1.745a3.066 3.066 0 010 3.976 3.066 3.066 0 00-.723 1.745 3.066 3.066 0 01-2.812 2.812 3.066 3.066 0 00-1.745.723 3.066 3.066 0 01-3.976 0 3.066 3.066 0 00-1.745-.723 3.066 3.066 0 01-2.812-2.812 3.066 3.066 0 00-.723-1.745 3.066 3.066 0 010-3.976 3.066 3.066 0 00.723-1.745 3.066 3.066 0 012.812-2.812zm7.44 5.252a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd" />
                            </svg>
                            #1 Job Platform
                        </span>
                    </div>

                    <h1 class="text-4xl sm:text-5xl lg:text-6xl font-extrabold text-gray-900 dark:text-white leading-tight animate-fade-in-up opacity-0 delay-100" style="animation-fill-mode: forwards;">
                        Find Your <span class="text-transparent bg-clip-text bg-gradient-to-r from-indigo-600 to-purple-600 gradient-animate">Dream Job</span> Today
                    </h1>

                    <p class="mt-6 text-lg sm:text-xl text-gray-600 dark:text-gray-400 max-w-xl animate-fade-in-up opacity-0 delay-200" style="animation-fill-mode: forwards;">
                        Connect with top companies and discover opportunities that match your skills. Start your journey to a fulfilling career.
                    </p>

                    <div class="mt-10 flex flex-col sm:flex-row gap-4 justify-center lg:justify-start animate-fade-in-up opacity-0 delay-300" style="animation-fill-mode: forwards;">
                        <a href="{{ route('register') }}" class="group inline-flex items-center justify-center px-8 py-4 text-lg font-semibold text-white bg-gradient-to-r from-indigo-600 to-purple-600 rounded-xl hover:from-indigo-700 hover:to-purple-700 shadow-lg hover:shadow-2xl transition-all duration-300 transform hover:scale-105">
                            Start Your Journey
                            <svg class="w-5 h-5 ml-2 group-hover:translate-x-1 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7l5 5m0 0l-5 5m5-5H6" />
                            </svg>
                        </a>
                        <a href="{{ route('login') }}" class="inline-flex items-center justify-center px-8 py-4 text-lg font-semibold text-gray-700 dark:text-gray-200 bg-white dark:bg-gray-800 border-2 border-gray-200 dark:border-gray-700 rounded-xl hover:border-indigo-500 dark:hover:border-indigo-500 hover:text-indigo-600 dark:hover:text-indigo-400 shadow-lg hover:shadow-xl transition-all duration-300">
                            Sign In
                        </a>
                    </div>

                    <!-- Stats -->
                    <div class="mt-12 grid grid-cols-3 gap-6 animate-fade-in-up opacity-0 delay-500" style="animation-fill-mode: forwards;">
                        <div class="text-center lg:text-left">
                            <p class="text-3xl font-bold text-gray-900 dark:text-white">10K+</p>
                            <p class="text-sm text-gray-600 dark:text-gray-400">Active Jobs</p>
                        </div>
                        <div class="text-center lg:text-left">
                            <p class="text-3xl font-bold text-gray-900 dark:text-white">500+</p>
                            <p class="text-sm text-gray-600 dark:text-gray-400">Companies</p>
                        </div>
                        <div class="text-center lg:text-left">
                            <p class="text-3xl font-bold text-gray-900 dark:text-white">50K+</p>
                            <p class="text-sm text-gray-600 dark:text-gray-400">Job Seekers</p>
                        </div>
                    </div>
                </div>

                <!-- Right Content - Illustration -->
                <div class="hidden lg:block animate-fade-in-right opacity-0 delay-300" style="animation-fill-mode: forwards;">
                    <div class="relative">
                        <!-- Main Card -->
                        <div class="bg-white dark:bg-gray-800 rounded-2xl shadow-2xl p-8 transform rotate-3 hover:rotate-0 transition-transform duration-500">
                            <div class="flex items-center space-x-4 mb-6">
                                <div class="w-16 h-16 bg-gradient-to-br from-indigo-500 to-purple-500 rounded-xl flex items-center justify-center">
                                    <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 13.255A23.931 23.931 0 0112 15c-3.183 0-6.22-.62-9-1.745M16 6V4a2 2 0 00-2-2h-4a2 2 0 00-2 2v2m4 6h.01M5 20h14a2 2 0 002-2V8a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
                                    </svg>
                                </div>
                                <div>
                                    <h3 class="text-lg font-semibold text-gray-900 dark:text-white">Senior Developer</h3>
                                    <p class="text-gray-600 dark:text-gray-400">Tech Solutions Inc.</p>
                                </div>
                            </div>
                            <div class="space-y-3">
                                <div class="flex items-center text-sm text-gray-600 dark:text-gray-400">
                                    <svg class="w-5 h-5 mr-2 text-indigo-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z" />
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z" />
                                    </svg>
                                    Cairo, Egypt (Remote)
                                </div>
                                <div class="flex items-center text-sm text-gray-600 dark:text-gray-400">
                                    <svg class="w-5 h-5 mr-2 text-green-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                                    </svg>
                                    $80K - $120K / year
                                </div>
                            </div>
                            <button class="mt-6 w-full py-3 bg-gradient-to-r from-indigo-600 to-purple-600 text-white rounded-lg font-semibold hover:from-indigo-700 hover:to-purple-700 transition-all">
                                Apply Now
                            </button>
                        </div>

                        <!-- Floating Elements -->
                        <div class="absolute -top-4 -right-4 bg-green-500 text-white px-4 py-2 rounded-lg text-sm font-semibold animate-pulse-slow shadow-lg">
                            ✨ New Opening
                        </div>
                        <div class="absolute -bottom-4 -left-4 bg-white dark:bg-gray-800 rounded-xl shadow-xl p-4 animate-float">
                            <div class="flex items-center space-x-2">
                                <div class="w-8 h-8 bg-yellow-400 rounded-full flex items-center justify-center">
                                    ⭐
                                </div>
                                <span class="text-sm font-medium text-gray-700 dark:text-gray-300">4.9 Rating</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Features Section -->
    <section class="py-20 bg-white dark:bg-gray-900">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-16">
                <h2 class="text-3xl sm:text-4xl font-bold text-gray-900 dark:text-white mb-4">
                    Why Choose Our Platform?
                </h2>
                <p class="text-lg text-gray-600 dark:text-gray-400 max-w-2xl mx-auto">
                    We provide the best tools and features to help you find your dream job or hire top talent.
                </p>
            </div>

            <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-8">
                <!-- Feature 1 -->
                <div class="group p-8 bg-gray-50 dark:bg-gray-800 rounded-2xl hover:bg-gradient-to-br hover:from-indigo-500 hover:to-purple-500 transition-all duration-300 hover:shadow-2xl hover:-translate-y-2">
                    <div class="w-14 h-14 bg-indigo-100 dark:bg-indigo-900/50 group-hover:bg-white/20 rounded-xl flex items-center justify-center mb-6 transition-colors">
                        <svg class="w-7 h-7 text-indigo-600 dark:text-indigo-400 group-hover:text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
                        </svg>
                    </div>
                    <h3 class="text-xl font-semibold text-gray-900 dark:text-white group-hover:text-white mb-3">Smart Job Search</h3>
                    <p class="text-gray-600 dark:text-gray-400 group-hover:text-white/90">Find the perfect job with our AI-powered search that matches your skills and preferences.</p>
                </div>

                <!-- Feature 2 -->
                <div class="group p-8 bg-gray-50 dark:bg-gray-800 rounded-2xl hover:bg-gradient-to-br hover:from-purple-500 hover:to-pink-500 transition-all duration-300 hover:shadow-2xl hover:-translate-y-2">
                    <div class="w-14 h-14 bg-purple-100 dark:bg-purple-900/50 group-hover:bg-white/20 rounded-xl flex items-center justify-center mb-6 transition-colors">
                        <svg class="w-7 h-7 text-purple-600 dark:text-purple-400 group-hover:text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z" />
                        </svg>
                    </div>
                    <h3 class="text-xl font-semibold text-gray-900 dark:text-white group-hover:text-white mb-3">Verified Companies</h3>
                    <p class="text-gray-600 dark:text-gray-400 group-hover:text-white/90">All companies on our platform are verified to ensure you're applying to legitimate opportunities.</p>
                </div>

                <!-- Feature 3 -->
                <div class="group p-8 bg-gray-50 dark:bg-gray-800 rounded-2xl hover:bg-gradient-to-br hover:from-green-500 hover:to-teal-500 transition-all duration-300 hover:shadow-2xl hover:-translate-y-2">
                    <div class="w-14 h-14 bg-green-100 dark:bg-green-900/50 group-hover:bg-white/20 rounded-xl flex items-center justify-center mb-6 transition-colors">
                        <svg class="w-7 h-7 text-green-600 dark:text-green-400 group-hover:text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z" />
                        </svg>
                    </div>
                    <h3 class="text-xl font-semibold text-gray-900 dark:text-white group-hover:text-white mb-3">Quick Apply</h3>
                    <p class="text-gray-600 dark:text-gray-400 group-hover:text-white/90">Apply to multiple jobs with just one click using your saved profile and resume.</p>
                </div>
            </div>
        </div>
    </section>

    <!-- CTA Section -->
    <section class="py-20 bg-gradient-to-r from-indigo-600 to-purple-600 relative overflow-hidden">
        <div class="absolute inset-0 opacity-10">
            <svg class="w-full h-full" viewBox="0 0 100 100" preserveAspectRatio="none">
                <path d="M0,50 Q25,30 50,50 T100,50 V100 H0 Z" fill="white" />
            </svg>
        </div>
        <div class="relative max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
            <h2 class="text-3xl sm:text-4xl font-bold text-white mb-6">
                Ready to Take the Next Step?
            </h2>
            <p class="text-xl text-indigo-100 mb-10">
                Join thousands of professionals who have found their dream jobs through our platform.
            </p>
            <div class="flex flex-col sm:flex-row gap-4 justify-center">
                <a href="{{ route('register') }}" class="inline-flex items-center justify-center px-8 py-4 text-lg font-semibold text-indigo-600 bg-white rounded-xl hover:bg-gray-100 shadow-lg hover:shadow-xl transition-all duration-300 transform hover:scale-105">
                    Register as Job Seeker
                </a>
                <a href="{{ route('register') }}" class="inline-flex items-center justify-center px-8 py-4 text-lg font-semibold text-white border-2 border-white rounded-xl hover:bg-white/10 transition-all duration-300">
                    Post Jobs as Company
                </a>
            </div>
        </div>
    </section>

    <!-- Footer -->
    <footer class="py-8 bg-gray-900 dark:bg-gray-950">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex flex-col md:flex-row justify-between items-center">
                <div class="flex items-center space-x-2 mb-4 md:mb-0">
                    <div class="w-8 h-8 bg-gradient-to-br from-indigo-600 to-purple-600 rounded-lg flex items-center justify-center">
                        <svg class="w-5 h-5 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 13.255A23.931 23.931 0 0112 15c-3.183 0-6.22-.62-9-1.745M16 6V4a2 2 0 00-2-2h-4a2 2 0 00-2 2v2m4 6h.01M5 20h14a2 2 0 002-2V8a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path>
                        </svg>
                    </div>
                    <span class="text-lg font-bold text-white">JobBoard</span>
                </div>
                <p class="text-gray-400 text-sm">© {{ date('Y') }} JobBoard. All rights reserved.</p>
            </div>
        </div>
    </footer>
</body>

</html>