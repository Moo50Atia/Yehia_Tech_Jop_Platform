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
                        <p class="text-3xl font-bold text-gray-900 dark:text-white">24</p>
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
                        <p class="text-3xl font-bold text-gray-900 dark:text-white">156</p>
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
                        <p class="text-3xl font-bold text-gray-900 dark:text-white">18</p>
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
                        <p class="text-3xl font-bold text-gray-900 dark:text-white">42</p>
                    </div>
                </div>
            </div>

            <!-- Charts Section -->
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-8 mb-8">
                <!-- Applications per Category Chart -->
                <div class="bg-white dark:bg-gray-800 rounded-xl shadow-lg overflow-hidden">
                    <div class="px-6 py-5 border-b border-gray-200 dark:border-gray-700">
                        <h3 class="text-lg font-semibold text-gray-900 dark:text-white">{{ __('Applications per Category') }}</h3>
                    </div>
                    <div class="p-6">
                        {{-- Attention: categories relationship - Need to group applications by vacancy category --}}
                        <div class="space-y-4">
                            <!-- Category 1 -->
                            <div>
                                <div class="flex items-center justify-between mb-2">
                                    <span class="text-sm font-medium text-gray-700 dark:text-gray-300">Software Development</span>
                                    <span class="text-sm font-semibold text-gray-900 dark:text-white">45</span>
                                </div>
                                <div class="w-full bg-gray-200 dark:bg-gray-700 rounded-full h-2.5">
                                    <div class="bg-blue-600 h-2.5 rounded-full" style="width: 75%"></div>
                                </div>
                            </div>
                            <!-- Category 2 -->
                            <div>
                                <div class="flex items-center justify-between mb-2">
                                    <span class="text-sm font-medium text-gray-700 dark:text-gray-300">Marketing</span>
                                    <span class="text-sm font-semibold text-gray-900 dark:text-white">32</span>
                                </div>
                                <div class="w-full bg-gray-200 dark:bg-gray-700 rounded-full h-2.5">
                                    <div class="bg-purple-600 h-2.5 rounded-full" style="width: 53%"></div>
                                </div>
                            </div>
                            <!-- Category 3 -->
                            <div>
                                <div class="flex items-center justify-between mb-2">
                                    <span class="text-sm font-medium text-gray-700 dark:text-gray-300">Design</span>
                                    <span class="text-sm font-semibold text-gray-900 dark:text-white">28</span>
                                </div>
                                <div class="w-full bg-gray-200 dark:bg-gray-700 rounded-full h-2.5">
                                    <div class="bg-green-600 h-2.5 rounded-full" style="width: 47%"></div>
                                </div>
                            </div>
                            <!-- Category 4 -->
                            <div>
                                <div class="flex items-center justify-between mb-2">
                                    <span class="text-sm font-medium text-gray-700 dark:text-gray-300">Sales</span>
                                    <span class="text-sm font-semibold text-gray-900 dark:text-white">25</span>
                                </div>
                                <div class="w-full bg-gray-200 dark:bg-gray-700 rounded-full h-2.5">
                                    <div class="bg-orange-600 h-2.5 rounded-full" style="width: 42%"></div>
                                </div>
                            </div>
                            <!-- Category 5 -->
                            <div>
                                <div class="flex items-center justify-between mb-2">
                                    <span class="text-sm font-medium text-gray-700 dark:text-gray-300">Customer Support</span>
                                    <span class="text-sm font-semibold text-gray-900 dark:text-white">26</span>
                                </div>
                                <div class="w-full bg-gray-200 dark:bg-gray-700 rounded-full h-2.5">
                                    <div class="bg-pink-600 h-2.5 rounded-full" style="width: 43%"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Applications per Day Chart -->
                <div class="bg-white dark:bg-gray-800 rounded-xl shadow-lg overflow-hidden">
                    <div class="px-6 py-5 border-b border-gray-200 dark:border-gray-700">
                        <h3 class="text-lg font-semibold text-gray-900 dark:text-white">{{ __('Applications (Last 30 Days)') }}</h3>
                    </div>
                    <div class="p-6">
                        {{-- Attention: applications relationship - Need to group applications by created_at date for last 30 days --}}
                        <div class="flex items-end justify-between h-64 space-x-2">
                            <!-- Day 1 -->
                            <div class="flex-1 flex flex-col items-center">
                                <div class="w-full bg-indigo-600 dark:bg-indigo-500 rounded-t hover:bg-indigo-700 transition-colors cursor-pointer" style="height: 45%"></div>
                                <span class="text-xs text-gray-500 dark:text-gray-400 mt-2">1</span>
                            </div>
                            <!-- Day 2 -->
                            <div class="flex-1 flex flex-col items-center">
                                <div class="w-full bg-indigo-600 dark:bg-indigo-500 rounded-t hover:bg-indigo-700 transition-colors cursor-pointer" style="height: 60%"></div>
                                <span class="text-xs text-gray-500 dark:text-gray-400 mt-2">5</span>
                            </div>
                            <!-- Day 3 -->
                            <div class="flex-1 flex flex-col items-center">
                                <div class="w-full bg-indigo-600 dark:bg-indigo-500 rounded-t hover:bg-indigo-700 transition-colors cursor-pointer" style="height: 35%"></div>
                                <span class="text-xs text-gray-500 dark:text-gray-400 mt-2">10</span>
                            </div>
                            <!-- Day 4 -->
                            <div class="flex-1 flex flex-col items-center">
                                <div class="w-full bg-indigo-600 dark:bg-indigo-500 rounded-t hover:bg-indigo-700 transition-colors cursor-pointer" style="height: 75%"></div>
                                <span class="text-xs text-gray-500 dark:text-gray-400 mt-2">15</span>
                            </div>
                            <!-- Day 5 -->
                            <div class="flex-1 flex flex-col items-center">
                                <div class="w-full bg-indigo-600 dark:bg-indigo-500 rounded-t hover:bg-indigo-700 transition-colors cursor-pointer" style="height: 50%"></div>
                                <span class="text-xs text-gray-500 dark:text-gray-400 mt-2">20</span>
                            </div>
                            <!-- Day 6 -->
                            <div class="flex-1 flex flex-col items-center">
                                <div class="w-full bg-indigo-600 dark:bg-indigo-500 rounded-t hover:bg-indigo-700 transition-colors cursor-pointer" style="height: 85%"></div>
                                <span class="text-xs text-gray-500 dark:text-gray-400 mt-2">25</span>
                            </div>
                            <!-- Day 7 -->
                            <div class="flex-1 flex flex-col items-center">
                                <div class="w-full bg-indigo-600 dark:bg-indigo-500 rounded-t hover:bg-indigo-700 transition-colors cursor-pointer" style="height: 40%"></div>
                                <span class="text-xs text-gray-500 dark:text-gray-400 mt-2">30</span>
                            </div>
                        </div>
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
                            <!-- Application 1 -->
                            <div class="flex items-center space-x-4 p-4 bg-gray-50 dark:bg-gray-700/50 rounded-lg hover:bg-gray-100 dark:hover:bg-gray-700 transition-colors duration-200">
                                <div class="flex-shrink-0">
                                    <div class="w-10 h-10 bg-blue-100 dark:bg-blue-900/30 rounded-full flex items-center justify-center">
                                        <span class="text-blue-600 dark:text-blue-400 font-semibold">JD</span>
                                    </div>
                                </div>
                                <div class="flex-1 min-w-0">
                                    <p class="text-sm font-medium text-gray-900 dark:text-white truncate">John Doe</p>
                                    <p class="text-sm text-gray-500 dark:text-gray-400 truncate">Senior Developer</p>
                                </div>
                                <div class="flex-shrink-0">
                                    <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-yellow-100 text-yellow-800 dark:bg-yellow-900/30 dark:text-yellow-400">
                                        Pending
                                    </span>
                                </div>
                            </div>

                            <!-- Application 2 -->
                            <div class="flex items-center space-x-4 p-4 bg-gray-50 dark:bg-gray-700/50 rounded-lg hover:bg-gray-100 dark:hover:bg-gray-700 transition-colors duration-200">
                                <div class="flex-shrink-0">
                                    <div class="w-10 h-10 bg-purple-100 dark:bg-purple-900/30 rounded-full flex items-center justify-center">
                                        <span class="text-purple-600 dark:text-purple-400 font-semibold">JS</span>
                                    </div>
                                </div>
                                <div class="flex-1 min-w-0">
                                    <p class="text-sm font-medium text-gray-900 dark:text-white truncate">Jane Smith</p>
                                    <p class="text-sm text-gray-500 dark:text-gray-400 truncate">Marketing Manager</p>
                                </div>
                                <div class="flex-shrink-0">
                                    <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-green-100 text-green-800 dark:bg-green-900/30 dark:text-green-400">
                                        Accepted
                                    </span>
                                </div>
                            </div>

                            <!-- Application 3 -->
                            <div class="flex items-center space-x-4 p-4 bg-gray-50 dark:bg-gray-700/50 rounded-lg hover:bg-gray-100 dark:hover:bg-gray-700 transition-colors duration-200">
                                <div class="flex-shrink-0">
                                    <div class="w-10 h-10 bg-green-100 dark:bg-green-900/30 rounded-full flex items-center justify-center">
                                        <span class="text-green-600 dark:text-green-400 font-semibold">MB</span>
                                    </div>
                                </div>
                                <div class="flex-1 min-w-0">
                                    <p class="text-sm font-medium text-gray-900 dark:text-white truncate">Mike Brown</p>
                                    <p class="text-sm text-gray-500 dark:text-gray-400 truncate">UI/UX Designer</p>
                                </div>
                                <div class="flex-shrink-0">
                                    <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-yellow-100 text-yellow-800 dark:bg-yellow-900/30 dark:text-yellow-400">
                                        Pending
                                    </span>
                                </div>
                            </div>

                            <!-- Application 4 -->
                            <div class="flex items-center space-x-4 p-4 bg-gray-50 dark:bg-gray-700/50 rounded-lg hover:bg-gray-100 dark:hover:bg-gray-700 transition-colors duration-200">
                                <div class="flex-shrink-0">
                                    <div class="w-10 h-10 bg-orange-100 dark:bg-orange-900/30 rounded-full flex items-center justify-center">
                                        <span class="text-orange-600 dark:text-orange-400 font-semibold">SW</span>
                                    </div>
                                </div>
                                <div class="flex-1 min-w-0">
                                    <p class="text-sm font-medium text-gray-900 dark:text-white truncate">Sarah Wilson</p>
                                    <p class="text-sm text-gray-500 dark:text-gray-400 truncate">Sales Representative</p>
                                </div>
                                <div class="flex-shrink-0">
                                    <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-red-100 text-red-800 dark:bg-red-900/30 dark:text-red-400">
                                        Rejected
                                    </span>
                                </div>
                            </div>

                            <!-- Application 5 -->
                            <div class="flex items-center space-x-4 p-4 bg-gray-50 dark:bg-gray-700/50 rounded-lg hover:bg-gray-100 dark:hover:bg-gray-700 transition-colors duration-200">
                                <div class="flex-shrink-0">
                                    <div class="w-10 h-10 bg-pink-100 dark:bg-pink-900/30 rounded-full flex items-center justify-center">
                                        <span class="text-pink-600 dark:text-pink-400 font-semibold">AD</span>
                                    </div>
                                </div>
                                <div class="flex-1 min-w-0">
                                    <p class="text-sm font-medium text-gray-900 dark:text-white truncate">Alex Davis</p>
                                    <p class="text-sm text-gray-500 dark:text-gray-400 truncate">Customer Support</p>
                                </div>
                                <div class="flex-shrink-0">
                                    <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-yellow-100 text-yellow-800 dark:bg-yellow-900/30 dark:text-yellow-400">
                                        Pending
                                    </span>
                                </div>
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
                            <a href="{{ route('vacansies.create') }}" class="group flex flex-col items-center justify-center p-6 bg-gradient-to-br from-blue-50 to-indigo-50 dark:from-blue-900/20 dark:to-indigo-900/20 rounded-lg hover:shadow-md transition-all duration-300 border border-transparent hover:border-indigo-300 dark:hover:border-indigo-600">
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
</x-app-layout>