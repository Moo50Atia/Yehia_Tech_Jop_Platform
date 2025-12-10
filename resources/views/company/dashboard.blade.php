<x-app-layout>
    <x-slot name="header">
        <div class="flex items-center justify-between">
            <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
                {{ __('Company Owner Dashboard') }}
            </h2>
            <p class="text-sm text-gray-600 dark:text-gray-400">
                {{ now()->format('l, F j, Y') }}
            </p>
        </div>
    </x-slot>

    <div class="py-8">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <!-- Welcome Section -->
            <div class="mb-8 bg-gradient-to-r from-indigo-600 to-purple-600 dark:from-indigo-700 dark:to-purple-700 rounded-2xl shadow-xl overflow-hidden">
                <div class="px-8 py-10">
                    <h1 class="text-3xl font-bold text-white mb-2">
                        {{ __('Welcome back, :name!', ['name' => Auth::user()->name]) }}
                    </h1>
                    <p class="text-indigo-100 text-lg">
                        {{-- Attention: company relationship - Need to display company name from Auth::user()->company->name --}}
                        {{ __('Here\'s an overview of your company\'s recruitment activity.') }}
                    </p>
                </div>
            </div>

            <!-- Statistics Cards -->
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 mb-8">
                <!-- Total Vacancies Card -->
                <div class="bg-white dark:bg-gray-800 rounded-xl shadow-lg overflow-hidden hover:shadow-xl transition-shadow duration-300">
                    <div class="p-6">
                        <div class="flex items-center justify-between mb-4">
                            <div class="p-3 bg-blue-100 dark:bg-blue-900/30 rounded-lg">
                                <svg class="w-8 h-8 text-blue-600 dark:text-blue-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 13.255A23.931 23.931 0 0112 15c-3.183 0-6.22-.62-9-1.745M16 6V4a2 2 0 00-2-2h-4a2 2 0 00-2 2v2m4 6h.01M5 20h14a2 2 0 002-2V8a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path>
                                </svg>
                            </div>
                            <span class="text-sm font-medium text-green-600 dark:text-green-400">+12%</span>
                        </div>
                        <h3 class="text-gray-500 dark:text-gray-400 text-sm font-medium mb-1">{{ __('Total Vacancies') }}</h3>
                        {{-- Attention: vacancies relationship - Count from Auth::user()->company->vacancies->count() --}}
                        <p class="text-3xl font-bold text-gray-900 dark:text-white">{{ $totalVacancies }}</p>
                    </div>
                </div>

                <!-- Total Applications Card -->
                <div class="bg-white dark:bg-gray-800 rounded-xl shadow-lg overflow-hidden hover:shadow-xl transition-shadow duration-300">
                    <div class="p-6">
                        <div class="flex items-center justify-between mb-4">
                            <div class="p-3 bg-purple-100 dark:bg-purple-900/30 rounded-lg">
                                <svg class="w-8 h-8 text-purple-600 dark:text-purple-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path>
                                </svg>
                            </div>
                            <span class="text-sm font-medium text-green-600 dark:text-green-400">+23%</span>
                        </div>
                        <h3 class="text-gray-500 dark:text-gray-400 text-sm font-medium mb-1">{{ __('Total Applications') }}</h3>
                        {{-- Attention: applications relationship - Count from Auth::user()->company->applications->count() --}}
                        <p class="text-3xl font-bold text-gray-900 dark:text-white">{{ $totalApplications }}</p>
                    </div>
                </div>

                <!-- Active Vacancies Card -->
                <div class="bg-white dark:bg-gray-800 rounded-xl shadow-lg overflow-hidden hover:shadow-xl transition-shadow duration-300">
                    <div class="p-6">
                        <div class="flex items-center justify-between mb-4">
                            <div class="p-3 bg-green-100 dark:bg-green-900/30 rounded-lg">
                                <svg class="w-8 h-8 text-green-600 dark:text-green-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                </svg>
                            </div>
                            <span class="text-sm font-medium text-blue-600 dark:text-blue-400">Active</span>
                        </div>
                        <h3 class="text-gray-500 dark:text-gray-400 text-sm font-medium mb-1">{{ __('Active Vacancies') }}</h3>
                        {{-- Attention: vacancies relationship - Count from Auth::user()->company->vacancies->where('status', 'active')->count() --}}
                        <p class="text-3xl font-bold text-gray-900 dark:text-white">{{ $activeVacancies }}</p>
                    </div>
                </div>

                <!-- Accepted Applications Card -->
                <div class="bg-white dark:bg-gray-800 rounded-xl shadow-lg overflow-hidden hover:shadow-xl transition-shadow duration-300">
                    <div class="p-6">
                        <div class="flex items-center justify-between mb-4">
                            <div class="p-3 bg-orange-100 dark:bg-orange-900/30 rounded-lg">
                                <svg class="w-8 h-8 text-orange-600 dark:text-orange-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                                </svg>
                            </div>
                            <span class="text-sm font-medium text-green-600 dark:text-green-400">+15%</span>
                        </div>
                        <h3 class="text-gray-500 dark:text-gray-400 text-sm font-medium mb-1">{{ __('Accepted Applications') }}</h3>
                        {{-- Attention: applications relationship - Count from Auth::user()->company->applications->where('status', 'accepted')->count() --}}
                        <p class="text-3xl font-bold text-gray-900 dark:text-white">{{ $acceptedApplications }}</p>
                    </div>
                </div>
            </div>

            <!-- Charts Section -->
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-8 mb-8">
                <!-- Applications per Category Chart -->
                <div class="bg-white dark:bg-gray-800 rounded-xl shadow-lg overflow-hidden">
                    <div class="px-6 py-5 border-b border-gray-200 dark:border-gray-700">
                        <h3 class="text-lg font-semibold text-gray-900 dark:text-white">{{ __(' ') }}</h3>
                    </div>
                    <div class="p-6">
                        <canvas id="categoryChart" style="max-height: 300px;"></canvas>
                    </div>
                </div>


                <!-- Applications Trend Chart -->
                <div class="bg-white dark:bg-gray-800 rounded-xl shadow-lg overflow-hidden">
                    <div class="px-6 py-5 border-b border-gray-200 dark:border-gray-700">
                        <h3 class="text-lg font-semibold text-gray-900 dark:text-white">{{ __('Applications Trend (Last 7 Days)') }}</h3>
                    </div>
                    <div class="p-6">
                        <canvas id="trendChart" style="max-height: 300px;"></canvas>
                    </div>
                </div>
            </div>

            <!-- Recent Applications & Quick Actions -->
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-8">
                <!-- Recent Applications -->
                <div class="bg-white dark:bg-gray-800 rounded-xl shadow-lg overflow-hidden">
                    <div class="px-6 py-5 border-b border-gray-200 dark:border-gray-700 flex items-center justify-between">
                        <h3 class="text-lg font-semibold text-gray-900 dark:text-white">{{ __('Recent Applications') }}</h3>
                        <a href="{{ route('company.applications') }}" class="text-sm text-indigo-600 dark:text-indigo-400 hover:text-indigo-700 dark:hover:text-indigo-300">
                            {{ __('View All') }}
                        </a>
                    </div>
                    <div class="p-6">
                        {{-- Attention: applications relationship - Need to get latest 5 applications from Auth::user()->company->applications()->latest()->take(5) --}}
                        <div class="space-y-4">
                            @foreach ($recentApplications as $application)
                            <!-- Application 1 -->
                            <div class="flex items-center space-x-4 p-4 bg-gray-50 dark:bg-gray-700/50 rounded-lg hover:bg-gray-100 dark:hover:bg-gray-700 transition-colors duration-200">
                                <div class="flex-shrink-0">
                                    <div class="w-10 h-10 bg-blue-100 dark:bg-blue-900/30 rounded-full flex items-center justify-center">
                                        <span class="text-blue-600 dark:text-blue-400 font-semibold">{{ $application->user->initials }}</span>
                                    </div>
                                </div>
                                <div class="flex-1 min-w-0">
                                    <p class="text-sm font-medium text-gray-900 dark:text-white truncate">{{ $application->user->name }}</p>
                                    <p class="text-sm text-gray-500 dark:text-gray-400 truncate">{{ $application->jobVacansy->title }}</p>
                                </div>
                                <div class="flex-shrink-0">
                                    <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-yellow-100 text-yellow-800 dark:bg-yellow-900/30 dark:text-yellow-400">
                                        {{ $application->status }}
                                    </span>
                                </div>
                            </div>

                            @endforeach
                        </div>
                    </div>
                </div>
            </div>

            <!-- Quick Actions -->
            <div class="bg-white dark:bg-gray-800 rounded-xl shadow-lg overflow-hidden">
                <div class="px-6 py-5 border-b border-gray-200 dark:border-gray-700">
                    <h3 class="text-lg font-semibold text-gray-900 dark:text-white">{{ __('Quick Actions') }}</h3>
                </div>
                <div class="p-6">
                    <div class="grid grid-cols-2 gap-4">
                        <a href="{{ route('admin.vacansies.create') }}" class="group flex flex-col items-center justify-center p-6 bg-gradient-to-br from-blue-50 to-indigo-50 dark:from-blue-900/20 dark:to-indigo-900/20 rounded-lg hover:shadow-md transition-all duration-300 border border-transparent hover:border-indigo-300 dark:hover:border-indigo-600">
                            <div class="p-3 bg-white dark:bg-gray-800 rounded-full shadow-sm mb-3 group-hover:scale-110 transition-transform duration-300">
                                <svg class="w-6 h-6 text-indigo-600 dark:text-indigo-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"></path>
                                </svg>
                            </div>
                            <span class="text-sm font-medium text-gray-900 dark:text-white">{{ __('Create New Vacancy') }}</span>
                        </a>

                        <a href="{{ route('company.categories') }}" class="group flex flex-col items-center justify-center p-6 bg-gradient-to-br from-purple-50 to-pink-50 dark:from-purple-900/20 dark:to-pink-900/20 rounded-lg hover:shadow-md transition-all duration-300 border border-transparent hover:border-purple-300 dark:hover:border-purple-600">
                            <div class="p-3 bg-white dark:bg-gray-800 rounded-full shadow-sm mb-3 group-hover:scale-110 transition-transform duration-300">
                                <svg class="w-6 h-6 text-purple-600 dark:text-purple-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 7h.01M7 3h5c.512 0 1.024.195 1.414.586l7 7a2 2 0 010 2.828l-7 7a2 2 0 01-2.828 0l-7-7A1.994 1.994 0 013 12V7a4 4 0 014-4z"></path>
                                </svg>
                            </div>
                            <span class="text-sm font-medium text-gray-900 dark:text-white">{{ __('Manage Categories') }}</span>
                        </a>

                        <a href="{{ route('company.applications') }}" class="group flex flex-col items-center justify-center p-6 bg-gradient-to-br from-green-50 to-emerald-50 dark:from-green-900/20 dark:to-emerald-900/20 rounded-lg hover:shadow-md transition-all duration-300 border border-transparent hover:border-green-300 dark:hover:border-green-600">
                            <div class="p-3 bg-white dark:bg-gray-800 rounded-full shadow-sm mb-3 group-hover:scale-110 transition-transform duration-300">
                                <svg class="w-6 h-6 text-green-600 dark:text-green-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path>
                                </svg>
                            </div>
                            <span class="text-sm font-medium text-gray-900 dark:text-white">{{ __('View Applications') }}</span>
                        </a>

                        <a href="{{ route('company.my-company') }}" class="group flex flex-col items-center justify-center p-6 bg-gradient-to-br from-orange-50 to-red-50 dark:from-orange-900/20 dark:to-red-900/20 rounded-lg hover:shadow-md transition-all duration-300 border border-transparent hover:border-orange-300 dark:hover:border-orange-600">
                            <div class="p-3 bg-white dark:bg-gray-800 rounded-full shadow-sm mb-3 group-hover:scale-110 transition-transform duration-300">
                                <svg class="w-6 h-6 text-orange-600 dark:text-orange-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"></path>
                                </svg>
                            </div>
                            <span class="text-sm font-medium text-gray-900 dark:text-white">{{ __('View My Company') }}</span>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
    <input type="hidden" id="categoryLabels" value="{{ json_encode($categoryLabels) }}">
    <input type="hidden" id="categoryData" value="{{ json_encode($categoryData) }}">
    <input type="hidden" id="trendLabels" value="{{ json_encode($trendLabels) }}">
    <input type="hidden" id="trendData" value="{{ json_encode($trendData) }}">


    <!-- Chart.js CDN -->
    <script src="https://cdn.jsdelivr.net/npm/chart.js@4.4.0/dist/chart.umd.min.js"></script>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Check if dark mode is enabled
            const isDarkMode = document.documentElement.classList.contains('dark');
            const textColor = isDarkMode ? '#E5E7EB' : '#374151';
            const gridColor = isDarkMode ? '#374151' : '#E5E7EB';
            const categoryLabels = JSON.parse(document.getElementById('categoryLabels').value);
            const categoryData = JSON.parse(document.getElementById('categoryData').value);
            const trendLabels = JSON.parse(document.getElementById('trendLabels').value);
            const trendData = JSON.parse(document.getElementById('trendData').value);

            // Category Doughnut Chart
            const categoryCtx = document.getElementById('categoryChart');
            if (categoryCtx) {
                new Chart(categoryCtx, {
                    type: 'doughnut',
                    data: {
                        labels: categoryLabels,
                        datasets: [{
                            label: 'Applications',
                            data: categoryData,
                            backgroundColor: [
                                'rgba(59, 130, 246, 0.8)', // Blue
                                'rgba(168, 85, 247, 0.8)', // Purple
                                'rgba(34, 197, 94, 0.8)', // Green
                                'rgba(251, 146, 60, 0.8)', // Orange
                                'rgba(236, 72, 153, 0.8)' // Pink
                            ],
                            borderColor: [
                                'rgb(59, 130, 246)',
                                'rgb(168, 85, 247)',
                                'rgb(34, 197, 94)',
                                'rgb(251, 146, 60)',
                                'rgb(236, 72, 153)'
                            ],
                            borderWidth: 2
                        }]
                    },
                    options: {
                        responsive: true,
                        maintainAspectRatio: true,
                        plugins: {
                            legend: {
                                position: 'bottom',
                                labels: {
                                    color: textColor,
                                    padding: 15,
                                    font: {
                                        size: 12
                                    }
                                }
                            },
                            tooltip: {
                                backgroundColor: isDarkMode ? '#1F2937' : '#FFFFFF',
                                titleColor: textColor,
                                bodyColor: textColor,
                                borderColor: gridColor,
                                borderWidth: 1,
                                padding: 12,
                                displayColors: true
                            }
                        }
                    }
                });
            }

            // Trend Line Chart
            const trendCtx = document.getElementById('trendChart');
            if (trendCtx) {
                new Chart(trendCtx, {
                    type: 'line',
                    data: {
                        labels: trendLabels,
                        datasets: [{
                            label: 'Applications',
                            data: trendData,
                            fill: true,
                            backgroundColor: 'rgba(99, 102, 241, 0.1)',
                            borderColor: 'rgb(99, 102, 241)',
                            borderWidth: 3,
                            tension: 0.4,
                            pointBackgroundColor: 'rgb(99, 102, 241)',
                            pointBorderColor: '#fff',
                            pointBorderWidth: 2,
                            pointRadius: 5,
                            pointHoverRadius: 7
                        }]
                    },
                    options: {
                        responsive: true,
                        maintainAspectRatio: true,
                        plugins: {
                            legend: {
                                display: false
                            },
                            tooltip: {
                                backgroundColor: isDarkMode ? '#1F2937' : '#FFFFFF',
                                titleColor: textColor,
                                bodyColor: textColor,
                                borderColor: gridColor,
                                borderWidth: 1,
                                padding: 12
                            }
                        },
                        scales: {
                            y: {
                                beginAtZero: true,
                                ticks: {
                                    color: textColor,
                                    stepSize: 5
                                },
                                grid: {
                                    color: gridColor,
                                    drawBorder: false
                                }
                            },
                            x: {
                                ticks: {
                                    color: textColor
                                },
                                grid: {
                                    display: false
                                }
                            }
                        }
                    }
                });
            }
        });
    </script>
</x-app-layout>