<x-app-layout>
    <x-slot name="header">
        <div class="flex items-center justify-between">
            <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
                {{ __('Dashboard') }}
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
                        {{ __('Here\'s what\'s happening with your job board today.') }}
                    </p>
                </div>
            </div>

            <!-- Statistics Cards -->
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 mb-8">
                <!-- Total Companies Card -->
                <div class="bg-white dark:bg-gray-800 rounded-xl shadow-lg overflow-hidden hover:shadow-xl transition-shadow duration-300">
                    <div class="p-6">
                        <div class="flex items-center justify-between mb-4">
                            <div class="p-3 bg-blue-100 dark:bg-blue-900/30 rounded-lg">
                                <svg class="w-8 h-8 text-blue-600 dark:text-blue-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"></path>
                                </svg>
                            </div>
                            <span class="text-sm font-medium text-green-600 dark:text-green-400">+{{ $companies->percent }}%</span>
                        </div>
                        <h3 class="text-gray-500 dark:text-gray-400 text-sm font-medium mb-1">{{ __('Total Companies') }}</h3>
                        <p class="text-3xl font-bold text-gray-900 dark:text-white">{{ $companies->total }}</p>
                    </div>
                </div>

                <!-- Job Vacancies Card -->
                <div class="bg-white dark:bg-gray-800 rounded-xl shadow-lg overflow-hidden hover:shadow-xl transition-shadow duration-300">
                    <div class="p-6">
                        <div class="flex items-center justify-between mb-4">
                            <div class="p-3 bg-purple-100 dark:bg-purple-900/30 rounded-lg">
                                <svg class="w-8 h-8 text-purple-600 dark:text-purple-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 13.255A23.931 23.931 0 0112 15c-3.183 0-6.22-.62-9-1.745M16 6V4a2 2 0 00-2-2h-4a2 2 0 00-2 2v2m4 6h.01M5 20h14a2 2 0 002-2V8a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path>
                                </svg>
                            </div>
                            <span class="text-sm font-medium text-green-600 dark:text-green-400">+{{ $vacancies->percent }}%</span>
                        </div>
                        <h3 class="text-gray-500 dark:text-gray-400 text-sm font-medium mb-1">{{ __('Job Vacancies') }}</h3>
                        <p class="text-3xl font-bold text-gray-900 dark:text-white">{{ $vacancies->total }}</p>
                    </div>
                </div>

                <!-- Applications Card -->
                <div class="bg-white dark:bg-gray-800 rounded-xl shadow-lg overflow-hidden hover:shadow-xl transition-shadow duration-300">
                    <div class="p-6">
                        <div class="flex items-center justify-between mb-4">
                            <div class="p-3 bg-green-100 dark:bg-green-900/30 rounded-lg">
                                <svg class="w-8 h-8 text-green-600 dark:text-green-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path>
                                </svg>
                            </div>
                            <span class="text-sm font-medium text-green-600 dark:text-green-400">+{{ $applications->percent }}%</span>
                        </div>
                        <h3 class="text-gray-500 dark:text-gray-400 text-sm font-medium mb-1">{{ __('Applications') }}</h3>
                        <p class="text-3xl font-bold text-gray-900 dark:text-white">{{ $applications->total }}</p>
                    </div>
                </div>

                <!-- Active Users Card -->
                <div class="bg-white dark:bg-gray-800 rounded-xl shadow-lg overflow-hidden hover:shadow-xl transition-shadow duration-300">
                    <div class="p-6">
                        <div class="flex items-center justify-between mb-4">
                            <div class="p-3 bg-orange-100 dark:bg-orange-900/30 rounded-lg">
                                <svg class="w-8 h-8 text-orange-600 dark:text-orange-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z"></path>
                                </svg>
                            </div>
                            <span class="text-sm font-medium text-green-600 dark:text-green-400">+{{ $users->percent }}%</span>
                        </div>
                        <h3 class="text-gray-500 dark:text-gray-400 text-sm font-medium mb-1">{{ __('Active Users') }}</h3>
                        <p class="text-3xl font-bold text-gray-900 dark:text-white">{{ $users->total }}</p>
                    </div>
                </div>
            </div>

            <!-- Charts Section -->
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-8 mb-8">
                <!-- User Growth Chart -->
                <div class="bg-white dark:bg-gray-800 rounded-xl shadow-lg overflow-hidden">
                    <div class="px-6 py-5 border-b border-gray-200 dark:border-gray-700">
                        <h3 class="text-lg font-semibold text-gray-900 dark:text-white">{{ __('User Growth (Last 6 Months)') }}</h3>
                    </div>
                    <div class="p-6">
                        <canvas id="usersChart" style="max-height: 300px;"></canvas>
                    </div>
                </div>

                <!-- Applications by Status Chart -->
                <div class="bg-white dark:bg-gray-800 rounded-xl shadow-lg overflow-hidden">
                    <div class="px-6 py-5 border-b border-gray-200 dark:border-gray-700">
                        <h3 class="text-lg font-semibold text-gray-900 dark:text-white">{{ __('Applications by Status') }}</h3>
                    </div>
                    <div class="p-6">
                        <canvas id="statusChart" style="max-height: 300px;"></canvas>
                    </div>
                </div>
            </div>

            <!-- Quick Actions & Recent Activity -->
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-8">
                <!-- Quick Actions -->
                <div class="bg-white dark:bg-gray-800 rounded-xl shadow-lg overflow-hidden">
                    <div class="px-6 py-5 border-b border-gray-200 dark:border-gray-700">
                        <h3 class="text-lg font-semibold text-gray-900 dark:text-white">{{ __('Quick Actions') }}</h3>
                    </div>
                    <div class="p-6">
                        <div class="grid grid-cols-2 gap-4">
                            <a href="{{ route('admin.companies.create') }}" class="group flex flex-col items-center justify-center p-6 bg-gradient-to-br from-blue-50 to-indigo-50 dark:from-blue-900/20 dark:to-indigo-900/20 rounded-lg hover:shadow-md transition-all duration-300 border border-transparent hover:border-indigo-300 dark:hover:border-indigo-600">
                                <div class="p-3 bg-white dark:bg-gray-800 rounded-full shadow-sm mb-3 group-hover:scale-110 transition-transform duration-300">
                                    <svg class="w-6 h-6 text-indigo-600 dark:text-indigo-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"></path>
                                    </svg>
                                </div>
                                <span class="text-sm font-medium text-gray-900 dark:text-white">{{ __('Add Company') }}</span>
                            </a>

                            <a href="{{ route('admin.vacansies.create') }}" class="group flex flex-col items-center justify-center p-6 bg-gradient-to-br from-purple-50 to-pink-50 dark:from-purple-900/20 dark:to-pink-900/20 rounded-lg hover:shadow-md transition-all duration-300 border border-transparent hover:border-purple-300 dark:hover:border-purple-600">
                                <div class="p-3 bg-white dark:bg-gray-800 rounded-full shadow-sm mb-3 group-hover:scale-110 transition-transform duration-300">
                                    <svg class="w-6 h-6 text-purple-600 dark:text-purple-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 13.255A23.931 23.931 0 0112 15c-3.183 0-6.22-.62-9-1.745M16 6V4a2 2 0 00-2-2h-4a2 2 0 00-2 2v2m4 6h.01M5 20h14a2 2 0 002-2V8a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path>
                                    </svg>
                                </div>
                                <span class="text-sm font-medium text-gray-900 dark:text-white">{{ __('Post Job') }}</span>
                            </a>

                            <a href="{{ route('admin.applications.index') }}" class="group flex flex-col items-center justify-center p-6 bg-gradient-to-br from-green-50 to-emerald-50 dark:from-green-900/20 dark:to-emerald-900/20 rounded-lg hover:shadow-md transition-all duration-300 border border-transparent hover:border-green-300 dark:hover:border-green-600">
                                <div class="p-3 bg-white dark:bg-gray-800 rounded-full shadow-sm mb-3 group-hover:scale-110 transition-transform duration-300">
                                    <svg class="w-6 h-6 text-green-600 dark:text-green-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path>
                                    </svg>
                                </div>
                                <span class="text-sm font-medium text-gray-900 dark:text-white">{{ __('View Applications') }}</span>
                            </a>

                            <a href="{{ route('admin.users.index') }}" class="group flex flex-col items-center justify-center p-6 bg-gradient-to-br from-orange-50 to-red-50 dark:from-orange-900/20 dark:to-red-900/20 rounded-lg hover:shadow-md transition-all duration-300 border border-transparent hover:border-orange-300 dark:hover:border-orange-600">
                                <div class="p-3 bg-white dark:bg-gray-800 rounded-full shadow-sm mb-3 group-hover:scale-110 transition-transform duration-300">
                                    <svg class="w-6 h-6 text-orange-600 dark:text-orange-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z"></path>
                                    </svg>
                                </div>
                                <span class="text-sm font-medium text-gray-900 dark:text-white">{{ __('Manage Users') }}</span>
                            </a>
                        </div>
                    </div>
                </div>

                <!-- Recent Activity -->
                <div class="bg-white dark:bg-gray-800 rounded-xl shadow-lg overflow-hidden">
                    <div class="px-6 py-5 border-b border-gray-200 dark:border-gray-700">
                        <h3 class="text-lg font-semibold text-gray-900 dark:text-white">{{ __('Recent Activity') }}</h3>
                    </div>
                    <div class="p-6">
                        <div class="space-y-4">
                            <!-- Activity Item 1 -->
                            <div class="flex items-start space-x-4 p-4 bg-gray-50 dark:bg-gray-700/50 rounded-lg hover:bg-gray-100 dark:hover:bg-gray-700 transition-colors duration-200">
                                <div class="flex-shrink-0">
                                    <div class="w-10 h-10 bg-blue-100 dark:bg-blue-900/30 rounded-full flex items-center justify-center">
                                        <svg class="w-5 h-5 text-blue-600 dark:text-blue-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"></path>
                                        </svg>
                                    </div>
                                </div>
                                <div class="flex-1 min-w-0">
                                    <p class="text-sm font-medium text-gray-900 dark:text-white">{{ __('New company registered') }}</p>
                                    <p class="text-sm text-gray-500 dark:text-gray-400">{{ $companies->latest->name }}</p>
                                    <p class="text-xs text-gray-400 dark:text-gray-500 mt-1">{{ $companies->latesttime }}</p>
                                </div>
                            </div>

                            <!-- Activity Item 2 -->
                            <div class="flex items-start space-x-4 p-4 bg-gray-50 dark:bg-gray-700/50 rounded-lg hover:bg-gray-100 dark:hover:bg-gray-700 transition-colors duration-200">
                                <div class="flex-shrink-0">
                                    <div class="w-10 h-10 bg-purple-100 dark:bg-purple-900/30 rounded-full flex items-center justify-center">
                                        <svg class="w-5 h-5 text-purple-600 dark:text-purple-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 13.255A23.931 23.931 0 0112 15c-3.183 0-6.22-.62-9-1.745M16 6V4a2 2 0 00-2-2h-4a2 2 0 00-2 2v2m4 6h.01M5 20h14a2 2 0 002-2V8a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path>
                                        </svg>
                                    </div>
                                </div>
                                <div class="flex-1 min-w-0">
                                    <p class="text-sm font-medium text-gray-900 dark:text-white">{{ __('New job posted') }}</p>
                                    <p class="text-sm text-gray-500 dark:text-gray-400">{{ $vacancies->latest->title }}</p>
                                    <p class="text-xs text-gray-400 dark:text-gray-500 mt-1">{{ $vacancies->latesttime }}</p>
                                </div>
                            </div>

                            <!-- Activity Item 3 -->
                            <div class="flex items-start space-x-4 p-4 bg-gray-50 dark:bg-gray-700/50 rounded-lg hover:bg-gray-100 dark:hover:bg-gray-700 transition-colors duration-200">
                                <div class="flex-shrink-0">
                                    <div class="w-10 h-10 bg-green-100 dark:bg-green-900/30 rounded-full flex items-center justify-center">
                                        <svg class="w-5 h-5 text-green-600 dark:text-green-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path>
                                        </svg>
                                    </div>
                                </div>
                                <div class="flex-1 min-w-0">
                                    <p class="text-sm font-medium text-gray-900 dark:text-white">{{ __('New applications received') }}</p>
                                    <p class="text-sm text-gray-500 dark:text-gray-400">{{ $applications->latest->title }}</p>
                                    <p class="text-xs text-gray-400 dark:text-gray-500 mt-1">{{ $applications->latesttime }}</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <input type="hidden" id="userGrowthLabels" value="{{ json_encode($userGrowthLabels) }}">
    <input type="hidden" id="userGrowthData" value="{{ json_encode($userGrowthData) }}">
    <input type="hidden" id="vacancyGrowthLabels" value="{{ json_encode($vacancyGrowthLabels) }}">
    <input type="hidden" id="vacancyGrowthData" value="{{ json_encode($vacancyGrowthData) }}">
    <input type="hidden" id="applicationGrowthLabels" value="{{ json_encode($applicationGrowthLabels) }}">
    <input type="hidden" id="applicationGrowthData" value="{{ json_encode($applicationGrowthData) }}">
    <input type="hidden" id="applicationsByStatus" value="{{ json_encode($applicationsByStatus) }}">

    <!-- Chart.js CDN -->
    <script src="https://cdn.jsdelivr.net/npm/chart.js@4.4.0/dist/chart.umd.min.js"></script>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Check if dark mode is enabled
            const isDarkMode = document.documentElement.classList.contains('dark');
            const textColor = isDarkMode ? '#E5E7EB' : '#374151';
            const gridColor = isDarkMode ? '#374151' : '#E5E7EB';
            const $userGrowthLabels = document.getElementById('userGrowthLabels').value;
            const $userGrowthData = document.getElementById('userGrowthData').value;
            const $vacancyGrowthLabels = document.getElementById('vacancyGrowthLabels').value;
            const $vacancyGrowthData = document.getElementById('vacancyGrowthData').value;
            const $applicationGrowthLabels = document.getElementById('applicationGrowthLabels').value;
            const $applicationGrowthData = document.getElementById('applicationGrowthData').value;
            const $applicationsByStatus = JSON.parse(document.getElementById('applicationsByStatus').value);

            // User Growth Bar Chart
            const usersCtx = document.getElementById('usersChart');
            if (usersCtx) {
                new Chart(usersCtx, {
                    type: 'bar',
                    data: {
                        labels: $userGrowthLabels,
                        datasets: [{
                            label: 'New Users',
                            data: $userGrowthData,
                            backgroundColor: 'rgba(59, 130, 246, 0.8)',
                            borderColor: 'rgb(59, 130, 246)',
                            borderWidth: 2,
                            borderRadius: 8,
                            hoverBackgroundColor: 'rgba(59, 130, 246, 1)'
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
                                padding: 12,
                                callbacks: {
                                    label: function(context) {
                                        return 'New Users: ' + context.parsed.y;
                                    }
                                }
                            }
                        },
                        scales: {
                            y: {
                                beginAtZero: true,
                                ticks: {
                                    color: textColor,
                                    stepSize: 50
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

            // Application Status Pie Chart
            const statusCtx = document.getElementById('statusChart');
            if (statusCtx) {
                new Chart(statusCtx, {
                    type: 'pie',
                    data: {
                        labels: ['Pending', 'Accepted', 'Rejected'],
                        datasets: [{
                            data: [
                                $applicationsByStatus.pending || 0,
                                $applicationsByStatus.accepted || 0,
                                $applicationsByStatus.rejected || 0,
                            ],
                            backgroundColor: [
                                'rgba(251, 191, 36, 0.8)', // Yellow - Pending
                                'rgba(34, 197, 94, 0.8)', // Green - Accepted
                                'rgba(239, 68, 68, 0.8)' // Red - Rejected
                            ],
                            borderColor: [
                                'rgb(251, 191, 36)',
                                'rgb(34, 197, 94)',
                                'rgb(239, 68, 68)'
                            ],
                            borderWidth: 2,
                            hoverOffset: 10
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
                                callbacks: {
                                    label: function(context) {
                                        const label = context.label || '';
                                        const value = context.parsed || 0;
                                        const total = context.dataset.data.reduce((a, b) => a + b, 0);
                                        const percentage = ((value / total) * 100).toFixed(1);
                                        return label + ': ' + value + ' (' + percentage + '%)';
                                    }
                                }
                            }
                        }
                    }
                });
            }
        });
    </script>
</x-app-layout>