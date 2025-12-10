<x-app-layout>
    <x-slot name="header">
        <div class="flex items-center justify-between">
            <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
                {{ __('Find Your Dream Job') }}
            </h2>
            <a href="{{ route('seeker.my-applications') }}" class="inline-flex items-center px-4 py-2 bg-indigo-600 dark:bg-indigo-500 border border-transparent rounded-lg font-semibold text-xs text-white uppercase tracking-widest hover:bg-indigo-700 dark:hover:bg-indigo-600 transition">
                <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path>
                </svg>
                {{ __('My Applications') }}
            </a>
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

    <div class="py-8">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <!-- Welcome Section -->
            <div class="mb-8 bg-gradient-to-r from-indigo-600 to-purple-600 dark:from-indigo-700 dark:to-purple-700 rounded-2xl shadow-xl overflow-hidden animate-fade-in-up opacity-0" style="animation-fill-mode: forwards;">
                <div class="px-8 py-10">
                    <h1 class="text-3xl font-bold text-white mb-2">
                        {{ __('Welcome, :name!', ['name' => Auth::user()->name]) }}
                    </h1>
                    <p class="text-indigo-100 text-lg">
                        {{ __('Explore opportunities and take the next step in your career.') }}
                    </p>
                </div>
            </div>

            <!-- Stats Cards -->
            <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-8">
                <div class="bg-white dark:bg-gray-800 rounded-xl shadow-lg p-6 animate-fade-in-up opacity-0 delay-100" style="animation-fill-mode: forwards;">
                    <div class="flex items-center">
                        <div class="p-3 bg-blue-100 dark:bg-blue-900/30 rounded-lg">
                            <svg class="w-8 h-8 text-blue-600 dark:text-blue-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path>
                            </svg>
                        </div>
                        <div class="ml-4">
                            <p class="text-sm text-gray-500 dark:text-gray-400">Total Applications</p>
                            <p class="text-2xl font-bold text-gray-900 dark:text-white">{{ $totalApplications }}</p>
                        </div>
                    </div>
                </div>
                <div class="bg-white dark:bg-gray-800 rounded-xl shadow-lg p-6 animate-fade-in-up opacity-0 delay-200" style="animation-fill-mode: forwards;">
                    <div class="flex items-center">
                        <div class="p-3 bg-yellow-100 dark:bg-yellow-900/30 rounded-lg">
                            <svg class="w-8 h-8 text-yellow-600 dark:text-yellow-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                            </svg>
                        </div>
                        <div class="ml-4">
                            <p class="text-sm text-gray-500 dark:text-gray-400">Pending</p>
                            <p class="text-2xl font-bold text-gray-900 dark:text-white">{{ $pendingApplications }}</p>
                        </div>
                    </div>
                </div>
                <div class="bg-white dark:bg-gray-800 rounded-xl shadow-lg p-6 animate-fade-in-up opacity-0 delay-300" style="animation-fill-mode: forwards;">
                    <div class="flex items-center">
                        <div class="p-3 bg-green-100 dark:bg-green-900/30 rounded-lg">
                            <svg class="w-8 h-8 text-green-600 dark:text-green-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                            </svg>
                        </div>
                        <div class="ml-4">
                            <p class="text-sm text-gray-500 dark:text-gray-400">Accepted</p>
                            <p class="text-2xl font-bold text-gray-900 dark:text-white">{{ $acceptedApplications }}</p>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Search & Filter Section -->
            <div class="bg-white dark:bg-gray-800 rounded-xl shadow-lg p-6 mb-8 animate-fade-in opacity-0" style="animation-delay: 0.4s; animation-fill-mode: forwards;">
                <form method="GET" action="{{ route('seeker.dashboard') }}" class="flex flex-col md:flex-row gap-4">
                    <!-- Search Input -->
                    <div class="flex-1">
                        <div class="relative">
                            <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                <svg class="w-5 h-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
                                </svg>
                            </div>
                            <input type="text" name="search" value="{{ request('search') }}"
                                class="block w-full pl-10 pr-4 py-3 rounded-xl border-gray-300 dark:border-gray-600 dark:bg-gray-700 dark:text-white focus:border-indigo-500 focus:ring-indigo-500 transition-all"
                                placeholder="Search jobs by title or company...">
                        </div>
                    </div>

                    <!-- Type Filter -->
                    <div class="w-full md:w-48">
                        <select name="type" class="block w-full py-3 px-4 rounded-xl border-gray-300 dark:border-gray-600 dark:bg-gray-700 dark:text-white focus:border-indigo-500 focus:ring-indigo-500">
                            <option value="all">All Types</option>
                            <option value="full-time" {{ request('type') == 'full-time' ? 'selected' : '' }}>Full Time</option>
                            <option value="part-time" {{ request('type') == 'part-time' ? 'selected' : '' }}>Part Time</option>
                            <option value="contract" {{ request('type') == 'contract' ? 'selected' : '' }}>Contract</option>
                            <option value="remote" {{ request('type') == 'remote' ? 'selected' : '' }}>Remote</option>
                        </select>
                    </div>

                    <!-- Category Filter -->
                    <div class="w-full md:w-48">
                        <select name="category" class="block w-full py-3 px-4 rounded-xl border-gray-300 dark:border-gray-600 dark:bg-gray-700 dark:text-white focus:border-indigo-500 focus:ring-indigo-500">
                            <option value="all">All Categories</option>
                            @foreach($categories as $category)
                            <option value="{{ $category->id }}" {{ request('category') == $category->id ? 'selected' : '' }}>{{ $category->name }}</option>
                            @endforeach
                        </select>
                    </div>

                    <!-- Search Button -->
                    <button type="submit" class="px-6 py-3 bg-gradient-to-r from-indigo-600 to-purple-600 text-white font-semibold rounded-xl hover:from-indigo-700 hover:to-purple-700 transition-all shadow-lg hover:shadow-xl">
                        <svg class="w-5 h-5 inline mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
                        </svg>
                        Search
                    </button>
                </form>
            </div>

            <!-- Vacancies Grid -->
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                @forelse($vacancies as $index => $vacancy)
                <div class="bg-white dark:bg-gray-800 rounded-xl shadow-lg overflow-hidden hover:shadow-2xl transition-all duration-300 transform hover:-translate-y-1 animate-fade-in-up opacity-0" style="animation-delay: {{ 0.1 * ($index % 6) }}s; animation-fill-mode: forwards;">
                    <div class="p-6">
                        <!-- Header -->
                        <div class="flex items-start justify-between mb-4">
                            <div class="flex items-center">
                                <div class="w-12 h-12 bg-gradient-to-br from-indigo-500 to-purple-500 rounded-xl flex items-center justify-center text-white font-bold text-lg">
                                    {{ substr($vacancy->company->name ?? 'C', 0, 1) }}
                                </div>
                                <div class="ml-3">
                                    <h3 class="text-lg font-semibold text-gray-900 dark:text-white line-clamp-1">{{ $vacancy->title }}</h3>
                                    <p class="text-sm text-gray-600 dark:text-gray-400">{{ $vacancy->company->name ?? 'Unknown Company' }}</p>
                                </div>
                            </div>
                        </div>

                        <!-- Details -->
                        <div class="space-y-2 mb-4">
                            <div class="flex items-center text-sm text-gray-600 dark:text-gray-400">
                                <svg class="w-4 h-4 mr-2 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"></path>
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"></path>
                                </svg>
                                {{ $vacancy->location ?? 'Location not specified' }}
                            </div>
                            <div class="flex items-center text-sm text-gray-600 dark:text-gray-400">
                                <svg class="w-4 h-4 mr-2 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                </svg>
                                {{ $vacancy->salary ? '$' . number_format($vacancy->salary) . '/year' : 'Salary not disclosed' }}
                            </div>
                        </div>

                        <!-- Tags -->
                        <div class="flex flex-wrap gap-2 mb-4">
                            <span class="px-3 py-1 text-xs font-medium rounded-full 
                                @if($vacancy->type == 'full-time') bg-green-100 text-green-700 dark:bg-green-900/30 dark:text-green-400
                                @elseif($vacancy->type == 'part-time') bg-blue-100 text-blue-700 dark:bg-blue-900/30 dark:text-blue-400
                                @elseif($vacancy->type == 'contract') bg-orange-100 text-orange-700 dark:bg-orange-900/30 dark:text-orange-400
                                @else bg-purple-100 text-purple-700 dark:bg-purple-900/30 dark:text-purple-400
                                @endif">
                                {{ ucfirst($vacancy->type) }}
                            </span>
                            @if($vacancy->jobCategory)
                            <span class="px-3 py-1 text-xs font-medium bg-gray-100 dark:bg-gray-700 text-gray-700 dark:text-gray-300 rounded-full">
                                {{ $vacancy->jobCategory->name }}
                            </span>
                            @endif
                        </div>

                        <!-- Actions -->
                        <div class="flex gap-2">
                            <a href="{{ route('seeker.vacancy.show', $vacancy->id) }}" class="flex-1 py-2.5 text-center text-gray-700 dark:text-gray-200 bg-gray-100 dark:bg-gray-700 rounded-lg font-medium hover:bg-gray-200 dark:hover:bg-gray-600 transition-colors">
                                View Details
                            </a>
                            <a href="{{ route('seeker.apply', $vacancy->id) }}" class="flex-1 py-2.5 text-center text-white bg-gradient-to-r from-indigo-600 to-purple-600 rounded-lg font-medium hover:from-indigo-700 hover:to-purple-700 transition-all shadow hover:shadow-lg">
                                Apply Now
                            </a>
                        </div>
                    </div>
                </div>
                @empty
                <div class="col-span-full text-center py-16">
                    <svg class="w-16 h-16 mx-auto text-gray-400 mb-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9.172 16.172a4 4 0 015.656 0M9 10h.01M15 10h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                    </svg>
                    <h3 class="text-lg font-medium text-gray-900 dark:text-white mb-2">No Vacancies Found</h3>
                    <p class="text-gray-500 dark:text-gray-400">Try adjusting your search or filter criteria.</p>
                </div>
                @endforelse
            </div>

            <!-- Pagination -->
            @if($vacancies->hasPages())
            <div class="mt-8">
                {{ $vacancies->withQueryString()->links() }}
            </div>
            @endif
        </div>
    </div>
</x-app-layout>