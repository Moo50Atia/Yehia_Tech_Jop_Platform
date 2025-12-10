<x-app-layout>
    <x-slot name="header">
        <div class="flex items-center">
            <a href="{{ route('seeker.dashboard') }}" class="mr-4 p-2 rounded-lg hover:bg-gray-100 dark:hover:bg-gray-700 transition-colors">
                <svg class="w-5 h-5 text-gray-600 dark:text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"></path>
                </svg>
            </a>
            <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
                {{ __('Job Details') }}
            </h2>
        </div>
    </x-slot>

    <style>
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

        @keyframes fadeIn {
            from {
                opacity: 0;
            }

            to {
                opacity: 1;
            }
        }

        .animate-fade-in-up {
            animation: fadeInUp 0.6s ease-out forwards;
        }

        .animate-fade-in {
            animation: fadeIn 0.5s ease-out forwards;
        }
    </style>

    <div class="py-8">
        <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8">
            <!-- Main Card -->
            <div class="bg-white dark:bg-gray-800 rounded-2xl shadow-xl overflow-hidden animate-fade-in-up opacity-0" style="animation-fill-mode: forwards;">
                <!-- Header -->
                <div class="bg-gradient-to-r from-indigo-600 to-purple-600 p-8">
                    <div class="flex flex-col md:flex-row md:items-center md:justify-between gap-4">
                        <div class="flex items-center">
                            <div class="w-20 h-20 bg-white/20 rounded-2xl flex items-center justify-center text-white font-bold text-3xl backdrop-blur-sm">
                                {{ substr($vacancy->company->name ?? 'C', 0, 1) }}
                            </div>
                            <div class="ml-5">
                                <h1 class="text-2xl font-bold text-white">{{ $vacancy->title }}</h1>
                                <p class="text-indigo-100 text-lg">{{ $vacancy->company->name ?? 'Unknown Company' }}</p>
                            </div>
                        </div>
                        <div class="flex items-center gap-3">
                            <span class="px-4 py-2 text-sm font-semibold rounded-full bg-white/20 text-white backdrop-blur-sm capitalize">
                                {{ $vacancy->type }}
                            </span>
                            @if($vacancy->status == 'active')
                            <span class="px-4 py-2 text-sm font-semibold rounded-full bg-green-400/20 text-green-100">
                                ✓ Actively Hiring
                            </span>
                            @endif
                        </div>
                    </div>
                </div>

                <!-- Content -->
                <div class="p-8">
                    <!-- Quick Info -->
                    <div class="grid grid-cols-2 md:grid-cols-4 gap-4 mb-8 animate-fade-in opacity-0" style="animation-delay: 0.2s; animation-fill-mode: forwards;">
                        <div class="p-4 bg-gray-50 dark:bg-gray-700/50 rounded-xl">
                            <div class="flex items-center text-gray-500 dark:text-gray-400 mb-1">
                                <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"></path>
                                </svg>
                                Location
                            </div>
                            <p class="font-semibold text-gray-900 dark:text-white">{{ $vacancy->location ?? 'Not specified' }}</p>
                        </div>
                        <div class="p-4 bg-gray-50 dark:bg-gray-700/50 rounded-xl">
                            <div class="flex items-center text-gray-500 dark:text-gray-400 mb-1">
                                <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                </svg>
                                Salary
                            </div>
                            <p class="font-semibold text-gray-900 dark:text-white">{{ $vacancy->salary ? '$' . number_format($vacancy->salary) . '/yr' : 'Negotiable' }}</p>
                        </div>
                        <div class="p-4 bg-gray-50 dark:bg-gray-700/50 rounded-xl">
                            <div class="flex items-center text-gray-500 dark:text-gray-400 mb-1">
                                <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 13.255A23.931 23.931 0 0112 15c-3.183 0-6.22-.62-9-1.745M16 6V4a2 2 0 00-2-2h-4a2 2 0 00-2 2v2m4 6h.01M5 20h14a2 2 0 002-2V8a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path>
                                </svg>
                                Type
                            </div>
                            <p class="font-semibold text-gray-900 dark:text-white capitalize">{{ $vacancy->type }}</p>
                        </div>
                        @if($vacancy->jobCategory)
                        <div class="p-4 bg-gray-50 dark:bg-gray-700/50 rounded-xl">
                            <div class="flex items-center text-gray-500 dark:text-gray-400 mb-1">
                                <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 7h.01M7 3h5c.512 0 1.024.195 1.414.586l7 7a2 2 0 010 2.828l-7 7a2 2 0 01-2.828 0l-7-7A1.994 1.994 0 013 12V7a4 4 0 014-4z"></path>
                                </svg>
                                Category
                            </div>
                            <p class="font-semibold text-gray-900 dark:text-white">{{ $vacancy->jobCategory->name }}</p>
                        </div>
                        @endif
                    </div>

                    <!-- Description -->
                    @if($vacancy->description)
                    <div class="mb-8 animate-fade-in opacity-0" style="animation-delay: 0.3s; animation-fill-mode: forwards;">
                        <h3 class="text-lg font-semibold text-gray-900 dark:text-white mb-4">Job Description</h3>
                        <div class="prose dark:prose-invert max-w-none text-gray-600 dark:text-gray-400">
                            {!! nl2br(e($vacancy->description)) !!}
                        </div>
                    </div>
                    @endif

                    <!-- Notes -->
                    @if($vacancy->note)
                    <div class="mb-8 p-4 bg-blue-50 dark:bg-blue-900/20 border border-blue-200 dark:border-blue-800 rounded-xl animate-fade-in opacity-0" style="animation-delay: 0.4s; animation-fill-mode: forwards;">
                        <h3 class="text-lg font-semibold text-blue-900 dark:text-blue-300 mb-2">Additional Notes</h3>
                        <p class="text-blue-700 dark:text-blue-400">{{ $vacancy->note }}</p>
                    </div>
                    @endif

                    <!-- Company Info -->
                    @if($vacancy->company)
                    <div class="mb-8 p-6 bg-gray-50 dark:bg-gray-700/50 rounded-xl animate-fade-in opacity-0" style="animation-delay: 0.5s; animation-fill-mode: forwards;">
                        <h3 class="text-lg font-semibold text-gray-900 dark:text-white mb-4">About the Company</h3>
                        <div class="flex items-start space-x-4">
                            <div class="w-16 h-16 bg-gradient-to-br from-indigo-500 to-purple-500 rounded-xl flex items-center justify-center text-white font-bold text-xl flex-shrink-0">
                                {{ substr($vacancy->company->name, 0, 1) }}
                            </div>
                            <div>
                                <h4 class="font-semibold text-gray-900 dark:text-white">{{ $vacancy->company->name }}</h4>
                                @if($vacancy->company->industry)
                                <p class="text-sm text-gray-600 dark:text-gray-400">{{ $vacancy->company->industry }}</p>
                                @endif
                                @if($vacancy->company->about)
                                <p class="mt-2 text-gray-600 dark:text-gray-400">{{ Str::limit($vacancy->company->about, 200) }}</p>
                                @endif
                            </div>
                        </div>
                    </div>
                    @endif

                    <!-- Action Buttons -->
                    <div class="flex flex-col sm:flex-row gap-4 pt-6 border-t border-gray-200 dark:border-gray-700 animate-fade-in opacity-0" style="animation-delay: 0.6s; animation-fill-mode: forwards;">
                        @if($hasApplied)
                        <div class="flex-1 py-4 text-center bg-gray-100 dark:bg-gray-700 rounded-xl">
                            <span class="text-gray-600 dark:text-gray-400">
                                <svg class="w-5 h-5 inline mr-2" fill="currentColor" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd" />
                                </svg>
                                You've already applied
                            </span>
                        </div>
                        <a href="{{ route('seeker.my-applications') }}" class="flex-1 py-4 text-center text-white bg-gradient-to-r from-indigo-600 to-purple-600 rounded-xl font-semibold hover:from-indigo-700 hover:to-purple-700 transition-all shadow-lg">
                            View My Applications
                        </a>
                        @else
                        <a href="{{ route('seeker.dashboard') }}" class="flex-1 py-4 text-center text-gray-700 dark:text-gray-200 bg-gray-100 dark:bg-gray-700 rounded-xl font-semibold hover:bg-gray-200 dark:hover:bg-gray-600 transition-colors">
                            ← Back to Jobs
                        </a>
                        <a href="{{ route('seeker.apply', $vacancy->id) }}" class="flex-1 py-4 text-center text-white bg-gradient-to-r from-indigo-600 to-purple-600 rounded-xl font-semibold hover:from-indigo-700 hover:to-purple-700 transition-all shadow-lg hover:shadow-xl transform hover:scale-[1.02]">
                            <svg class="w-5 h-5 inline mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 19l9 2-9-18-9 18 9-2zm0 0v-8"></path>
                            </svg>
                            Apply for this Position
                        </a>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>