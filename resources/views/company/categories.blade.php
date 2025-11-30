<x-app-layout>
    <x-slot name="header">
        <div class="flex items-center justify-between">
            <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
                {{ __('Job Categories') }}
            </h2>
        </div>
    </x-slot>

    <div class="py-8">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            {{-- Attention: categories relationship - Need to get categories that have vacancies from this company: Auth::user()->company->vacancies->pluck('category_id')->unique() then get those categories --}}

            <!-- Categories Grid -->
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                <!-- Category 1: Software Development -->
                <div class="bg-white dark:bg-gray-800 rounded-xl shadow-lg overflow-hidden hover:shadow-xl transition-shadow duration-300">
                    <div class="p-6 border-b border-gray-200 dark:border-gray-700 bg-gradient-to-r from-blue-50 to-indigo-50 dark:from-blue-900/20 dark:to-indigo-900/20">
                        <div class="flex items-center justify-between">
                            <div class="flex items-center space-x-3">
                                <div class="p-3 bg-blue-100 dark:bg-blue-900/30 rounded-lg">
                                    <svg class="w-6 h-6 text-blue-600 dark:text-blue-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 20l4-16m4 4l4 4-4 4M6 16l-4-4 4-4"></path>
                                    </svg>
                                </div>
                                <div>
                                    <h3 class="text-lg font-semibold text-gray-900 dark:text-white">Software Development</h3>
                                    <p class="text-sm text-gray-500 dark:text-gray-400">8 vacancies</p>
                                </div>
                            </div>
                        </div>
                    </div>

                    {{-- Attention: vacancies relationship - Need to get vacancies for this category: category->vacancies->where('company_id', Auth::user()->company->id) --}}
                    <div class="p-6">
                        <div class="space-y-4">
                            <!-- Vacancy 1 -->
                            <div class="p-4 bg-gray-50 dark:bg-gray-700/50 rounded-lg hover:bg-gray-100 dark:hover:bg-gray-700 transition-colors duration-200">
                                <div class="flex items-start justify-between mb-2">
                                    <h4 class="text-sm font-semibold text-gray-900 dark:text-white">Senior Full Stack Developer</h4>
                                    <span class="inline-flex items-center px-2 py-1 rounded-full text-xs font-medium bg-green-100 text-green-800 dark:bg-green-900/30 dark:text-green-400">
                                        Active
                                    </span>
                                </div>
                                <p class="text-xs text-gray-600 dark:text-gray-400 mb-3 line-clamp-2">
                                    We're looking for an experienced full stack developer to join our growing team...
                                </p>
                                <div class="flex items-center justify-between">
                                    <span class="text-xs text-gray-500 dark:text-gray-400">45 applications</span>
                                    <a href="#" class="text-xs font-medium text-indigo-600 dark:text-indigo-400 hover:text-indigo-700 dark:hover:text-indigo-300">
                                        View Details →
                                    </a>
                                </div>
                            </div>

                            <!-- Vacancy 2 -->
                            <div class="p-4 bg-gray-50 dark:bg-gray-700/50 rounded-lg hover:bg-gray-100 dark:hover:bg-gray-700 transition-colors duration-200">
                                <div class="flex items-start justify-between mb-2">
                                    <h4 class="text-sm font-semibold text-gray-900 dark:text-white">Frontend Developer</h4>
                                    <span class="inline-flex items-center px-2 py-1 rounded-full text-xs font-medium bg-green-100 text-green-800 dark:bg-green-900/30 dark:text-green-400">
                                        Active
                                    </span>
                                </div>
                                <p class="text-xs text-gray-600 dark:text-gray-400 mb-3 line-clamp-2">
                                    Join our frontend team and help build amazing user experiences...
                                </p>
                                <div class="flex items-center justify-between">
                                    <span class="text-xs text-gray-500 dark:text-gray-400">32 applications</span>
                                    <a href="#" class="text-xs font-medium text-indigo-600 dark:text-indigo-400 hover:text-indigo-700 dark:hover:text-indigo-300">
                                        View Details →
                                    </a>
                                </div>
                            </div>

                            <!-- Vacancy 3 -->
                            <div class="p-4 bg-gray-50 dark:bg-gray-700/50 rounded-lg hover:bg-gray-100 dark:hover:bg-gray-700 transition-colors duration-200">
                                <div class="flex items-start justify-between mb-2">
                                    <h4 class="text-sm font-semibold text-gray-900 dark:text-white">Backend Engineer</h4>
                                    <span class="inline-flex items-center px-2 py-1 rounded-full text-xs font-medium bg-yellow-100 text-yellow-800 dark:bg-yellow-900/30 dark:text-yellow-400">
                                        Draft
                                    </span>
                                </div>
                                <p class="text-xs text-gray-600 dark:text-gray-400 mb-3 line-clamp-2">
                                    We need a skilled backend engineer to work on our API infrastructure...
                                </p>
                                <div class="flex items-center justify-between">
                                    <span class="text-xs text-gray-500 dark:text-gray-400">0 applications</span>
                                    <a href="#" class="text-xs font-medium text-indigo-600 dark:text-indigo-400 hover:text-indigo-700 dark:hover:text-indigo-300">
                                        View Details →
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Category 2: Marketing -->
                <div class="bg-white dark:bg-gray-800 rounded-xl shadow-lg overflow-hidden hover:shadow-xl transition-shadow duration-300">
                    <div class="p-6 border-b border-gray-200 dark:border-gray-700 bg-gradient-to-r from-purple-50 to-pink-50 dark:from-purple-900/20 dark:to-pink-900/20">
                        <div class="flex items-center justify-between">
                            <div class="flex items-center space-x-3">
                                <div class="p-3 bg-purple-100 dark:bg-purple-900/30 rounded-lg">
                                    <svg class="w-6 h-6 text-purple-600 dark:text-purple-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 3.055A9.001 9.001 0 1020.945 13H11V3.055z"></path>
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20.488 9H15V3.512A9.025 9.025 0 0120.488 9z"></path>
                                    </svg>
                                </div>
                                <div>
                                    <h3 class="text-lg font-semibold text-gray-900 dark:text-white">Marketing</h3>
                                    <p class="text-sm text-gray-500 dark:text-gray-400">5 vacancies</p>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="p-6">
                        <div class="space-y-4">
                            <!-- Vacancy 1 -->
                            <div class="p-4 bg-gray-50 dark:bg-gray-700/50 rounded-lg hover:bg-gray-100 dark:hover:bg-gray-700 transition-colors duration-200">
                                <div class="flex items-start justify-between mb-2">
                                    <h4 class="text-sm font-semibold text-gray-900 dark:text-white">Marketing Manager</h4>
                                    <span class="inline-flex items-center px-2 py-1 rounded-full text-xs font-medium bg-green-100 text-green-800 dark:bg-green-900/30 dark:text-green-400">
                                        Active
                                    </span>
                                </div>
                                <p class="text-xs text-gray-600 dark:text-gray-400 mb-3 line-clamp-2">
                                    Lead our marketing efforts and drive brand awareness...
                                </p>
                                <div class="flex items-center justify-between">
                                    <span class="text-xs text-gray-500 dark:text-gray-400">32 applications</span>
                                    <a href="#" class="text-xs font-medium text-indigo-600 dark:text-indigo-400 hover:text-indigo-700 dark:hover:text-indigo-300">
                                        View Details →
                                    </a>
                                </div>
                            </div>

                            <!-- Vacancy 2 -->
                            <div class="p-4 bg-gray-50 dark:bg-gray-700/50 rounded-lg hover:bg-gray-100 dark:hover:bg-gray-700 transition-colors duration-200">
                                <div class="flex items-start justify-between mb-2">
                                    <h4 class="text-sm font-semibold text-gray-900 dark:text-white">Content Strategist</h4>
                                    <span class="inline-flex items-center px-2 py-1 rounded-full text-xs font-medium bg-green-100 text-green-800 dark:bg-green-900/30 dark:text-green-400">
                                        Active
                                    </span>
                                </div>
                                <p class="text-xs text-gray-600 dark:text-gray-400 mb-3 line-clamp-2">
                                    Create compelling content strategies for our digital platforms...
                                </p>
                                <div class="flex items-center justify-between">
                                    <span class="text-xs text-gray-500 dark:text-gray-400">18 applications</span>
                                    <a href="#" class="text-xs font-medium text-indigo-600 dark:text-indigo-400 hover:text-indigo-700 dark:hover:text-indigo-300">
                                        View Details →
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Category 3: Design -->
                <div class="bg-white dark:bg-gray-800 rounded-xl shadow-lg overflow-hidden hover:shadow-xl transition-shadow duration-300">
                    <div class="p-6 border-b border-gray-200 dark:border-gray-700 bg-gradient-to-r from-green-50 to-emerald-50 dark:from-green-900/20 dark:to-emerald-900/20">
                        <div class="flex items-center justify-between">
                            <div class="flex items-center space-x-3">
                                <div class="p-3 bg-green-100 dark:bg-green-900/30 rounded-lg">
                                    <svg class="w-6 h-6 text-green-600 dark:text-green-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 21a4 4 0 01-4-4V5a2 2 0 012-2h4a2 2 0 012 2v12a4 4 0 01-4 4zm0 0h12a2 2 0 002-2v-4a2 2 0 00-2-2h-2.343M11 7.343l1.657-1.657a2 2 0 012.828 0l2.829 2.829a2 2 0 010 2.828l-8.486 8.485M7 17h.01"></path>
                                    </svg>
                                </div>
                                <div>
                                    <h3 class="text-lg font-semibold text-gray-900 dark:text-white">Design</h3>
                                    <p class="text-sm text-gray-500 dark:text-gray-400">4 vacancies</p>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="p-6">
                        <div class="space-y-4">
                            <!-- Vacancy 1 -->
                            <div class="p-4 bg-gray-50 dark:bg-gray-700/50 rounded-lg hover:bg-gray-100 dark:hover:bg-gray-700 transition-colors duration-200">
                                <div class="flex items-start justify-between mb-2">
                                    <h4 class="text-sm font-semibold text-gray-900 dark:text-white">UI/UX Designer</h4>
                                    <span class="inline-flex items-center px-2 py-1 rounded-full text-xs font-medium bg-green-100 text-green-800 dark:bg-green-900/30 dark:text-green-400">
                                        Active
                                    </span>
                                </div>
                                <p class="text-xs text-gray-600 dark:text-gray-400 mb-3 line-clamp-2">
                                    Design beautiful and intuitive user interfaces for our products...
                                </p>
                                <div class="flex items-center justify-between">
                                    <span class="text-xs text-gray-500 dark:text-gray-400">28 applications</span>
                                    <a href="#" class="text-xs font-medium text-indigo-600 dark:text-indigo-400 hover:text-indigo-700 dark:hover:text-indigo-300">
                                        View Details →
                                    </a>
                                </div>
                            </div>

                            <!-- Vacancy 2 -->
                            <div class="p-4 bg-gray-50 dark:bg-gray-700/50 rounded-lg hover:bg-gray-100 dark:hover:bg-gray-700 transition-colors duration-200">
                                <div class="flex items-start justify-between mb-2">
                                    <h4 class="text-sm font-semibold text-gray-900 dark:text-white">Graphic Designer</h4>
                                    <span class="inline-flex items-center px-2 py-1 rounded-full text-xs font-medium bg-green-100 text-green-800 dark:bg-green-900/30 dark:text-green-400">
                                        Active
                                    </span>
                                </div>
                                <p class="text-xs text-gray-600 dark:text-gray-400 mb-3 line-clamp-2">
                                    Create stunning visual content for marketing campaigns...
                                </p>
                                <div class="flex items-center justify-between">
                                    <span class="text-xs text-gray-500 dark:text-gray-400">21 applications</span>
                                    <a href="#" class="text-xs font-medium text-indigo-600 dark:text-indigo-400 hover:text-indigo-700 dark:hover:text-indigo-300">
                                        View Details →
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Category 4: Sales -->
                <div class="bg-white dark:bg-gray-800 rounded-xl shadow-lg overflow-hidden hover:shadow-xl transition-shadow duration-300">
                    <div class="p-6 border-b border-gray-200 dark:border-gray-700 bg-gradient-to-r from-orange-50 to-red-50 dark:from-orange-900/20 dark:to-red-900/20">
                        <div class="flex items-center justify-between">
                            <div class="flex items-center space-x-3">
                                <div class="p-3 bg-orange-100 dark:bg-orange-900/30 rounded-lg">
                                    <svg class="w-6 h-6 text-orange-600 dark:text-orange-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7h8m0 0v8m0-8l-8 8-4-4-6 6"></path>
                                    </svg>
                                </div>
                                <div>
                                    <h3 class="text-lg font-semibold text-gray-900 dark:text-white">Sales</h3>
                                    <p class="text-sm text-gray-500 dark:text-gray-400">3 vacancies</p>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="p-6">
                        <div class="space-y-4">
                            <!-- Vacancy 1 -->
                            <div class="p-4 bg-gray-50 dark:bg-gray-700/50 rounded-lg hover:bg-gray-100 dark:hover:bg-gray-700 transition-colors duration-200">
                                <div class="flex items-start justify-between mb-2">
                                    <h4 class="text-sm font-semibold text-gray-900 dark:text-white">Sales Representative</h4>
                                    <span class="inline-flex items-center px-2 py-1 rounded-full text-xs font-medium bg-green-100 text-green-800 dark:bg-green-900/30 dark:text-green-400">
                                        Active
                                    </span>
                                </div>
                                <p class="text-xs text-gray-600 dark:text-gray-400 mb-3 line-clamp-2">
                                    Drive sales growth and build strong client relationships...
                                </p>
                                <div class="flex items-center justify-between">
                                    <span class="text-xs text-gray-500 dark:text-gray-400">25 applications</span>
                                    <a href="#" class="text-xs font-medium text-indigo-600 dark:text-indigo-400 hover:text-indigo-700 dark:hover:text-indigo-300">
                                        View Details →
                                    </a>
                                </div>
                            </div>

                            <!-- Vacancy 2 -->
                            <div class="p-4 bg-gray-50 dark:bg-gray-700/50 rounded-lg hover:bg-gray-100 dark:hover:bg-gray-700 transition-colors duration-200">
                                <div class="flex items-start justify-between mb-2">
                                    <h4 class="text-sm font-semibold text-gray-900 dark:text-white">Account Manager</h4>
                                    <span class="inline-flex items-center px-2 py-1 rounded-full text-xs font-medium bg-green-100 text-green-800 dark:bg-green-900/30 dark:text-green-400">
                                        Active
                                    </span>
                                </div>
                                <p class="text-xs text-gray-600 dark:text-gray-400 mb-3 line-clamp-2">
                                    Manage key accounts and ensure client satisfaction...
                                </p>
                                <div class="flex items-center justify-between">
                                    <span class="text-xs text-gray-500 dark:text-gray-400">19 applications</span>
                                    <a href="#" class="text-xs font-medium text-indigo-600 dark:text-indigo-400 hover:text-indigo-700 dark:hover:text-indigo-300">
                                        View Details →
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Category 5: Customer Support -->
                <div class="bg-white dark:bg-gray-800 rounded-xl shadow-lg overflow-hidden hover:shadow-xl transition-shadow duration-300">
                    <div class="p-6 border-b border-gray-200 dark:border-gray-700 bg-gradient-to-r from-pink-50 to-rose-50 dark:from-pink-900/20 dark:to-rose-900/20">
                        <div class="flex items-center justify-between">
                            <div class="flex items-center space-x-3">
                                <div class="p-3 bg-pink-100 dark:bg-pink-900/30 rounded-lg">
                                    <svg class="w-6 h-6 text-pink-600 dark:text-pink-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M18.364 5.636l-3.536 3.536m0 5.656l3.536 3.536M9.172 9.172L5.636 5.636m3.536 9.192l-3.536 3.536M21 12a9 9 0 11-18 0 9 9 0 0118 0zm-5 0a4 4 0 11-8 0 4 4 0 018 0z"></path>
                                    </svg>
                                </div>
                                <div>
                                    <h3 class="text-lg font-semibold text-gray-900 dark:text-white">Customer Support</h3>
                                    <p class="text-sm text-gray-500 dark:text-gray-400">4 vacancies</p>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="p-6">
                        <div class="space-y-4">
                            <!-- Vacancy 1 -->
                            <div class="p-4 bg-gray-50 dark:bg-gray-700/50 rounded-lg hover:bg-gray-100 dark:hover:bg-gray-700 transition-colors duration-200">
                                <div class="flex items-start justify-between mb-2">
                                    <h4 class="text-sm font-semibold text-gray-900 dark:text-white">Customer Support Specialist</h4>
                                    <span class="inline-flex items-center px-2 py-1 rounded-full text-xs font-medium bg-green-100 text-green-800 dark:bg-green-900/30 dark:text-green-400">
                                        Active
                                    </span>
                                </div>
                                <p class="text-xs text-gray-600 dark:text-gray-400 mb-3 line-clamp-2">
                                    Provide exceptional support to our customers...
                                </p>
                                <div class="flex items-center justify-between">
                                    <span class="text-xs text-gray-500 dark:text-gray-400">26 applications</span>
                                    <a href="#" class="text-xs font-medium text-indigo-600 dark:text-indigo-400 hover:text-indigo-700 dark:hover:text-indigo-300">
                                        View Details →
                                    </a>
                                </div>
                            </div>

                            <!-- Vacancy 2 -->
                            <div class="p-4 bg-gray-50 dark:bg-gray-700/50 rounded-lg hover:bg-gray-100 dark:hover:bg-gray-700 transition-colors duration-200">
                                <div class="flex items-start justify-between mb-2">
                                    <h4 class="text-sm font-semibold text-gray-900 dark:text-white">Technical Support Engineer</h4>
                                    <span class="inline-flex items-center px-2 py-1 rounded-full text-xs font-medium bg-green-100 text-green-800 dark:bg-green-900/30 dark:text-green-400">
                                        Active
                                    </span>
                                </div>
                                <p class="text-xs text-gray-600 dark:text-gray-400 mb-3 line-clamp-2">
                                    Solve technical issues and assist customers with product usage...
                                </p>
                                <div class="flex items-center justify-between">
                                    <span class="text-xs text-gray-500 dark:text-gray-400">22 applications</span>
                                    <a href="#" class="text-xs font-medium text-indigo-600 dark:text-indigo-400 hover:text-indigo-700 dark:hover:text-indigo-300">
                                        View Details →
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>