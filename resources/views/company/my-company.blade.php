<x-app-layout>
    <x-slot name="header">
        <div class="flex items-center justify-between">
            <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
                {{ __('My Company') }}
            </h2>
            <a href="{{ route('vacansies.index') }}" class="inline-flex items-center px-4 py-2 bg-indigo-600 dark:bg-indigo-500 border border-transparent rounded-lg font-semibold text-xs text-white uppercase tracking-widest hover:bg-indigo-700 dark:hover:bg-indigo-600 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 dark:focus:ring-offset-gray-800 transition ease-in-out duration-150">
                <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 13.255A23.931 23.931 0 0112 15c-3.183 0-6.22-.62-9-1.745M16 6V4a2 2 0 00-2-2h-4a2 2 0 00-2 2v2m4 6h.01M5 20h14a2 2 0 002-2V8a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path>
                </svg>
                {{ __('Manage Vacancies') }}
            </a>
        </div>
    </x-slot>

    <div class="py-8">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            {{-- Attention: company relationship - All company data from Auth::user()->company --}}

            <!-- Company Information Card -->
            <div class="bg-white dark:bg-gray-800 rounded-xl shadow-lg overflow-hidden mb-8">
                <div class="relative h-32 bg-gradient-to-r from-indigo-600 to-purple-600 dark:from-indigo-700 dark:to-purple-700">
                    <div class="absolute -bottom-12 left-8">
                        <div class="w-24 h-24 bg-white dark:bg-gray-800 rounded-xl shadow-lg flex items-center justify-center border-4 border-white dark:border-gray-800">
                            <svg class="w-12 h-12 text-indigo-600 dark:text-indigo-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"></path>
                            </svg>
                        </div>
                    </div>
                </div>

                <div class="pt-16 px-8 pb-8">
                    <div class="flex flex-col md:flex-row md:items-center md:justify-between mb-6">
                        <div>
                            <h1 class="text-3xl font-bold text-gray-900 dark:text-white mb-2">{{$company->name}}</h1>
                            <p class="text-gray-600 dark:text-gray-400 flex items-center">
                                <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"></path>
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"></path>
                                </svg>
                                {{$company->address}}
                                <!-- , {{$company->FristAlphapetInCompanyCountry}} -->
                            </p>
                        </div>
                        <div class="mt-4 md:mt-0">
                            <span class="inline-flex items-center px-4 py-2 rounded-full text-sm font-medium bg-green-100 text-green-800 dark:bg-green-900/30 dark:text-green-400">
                                <svg class="w-4 h-4 mr-2" fill="currentColor" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"></path>
                                </svg>
                                Active
                            </span>
                        </div>
                    </div>

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-6">
                        <div>
                            <h3 class="text-sm font-semibold text-gray-500 dark:text-gray-400 uppercase tracking-wider mb-2">{{ __('About') }}</h3>
                            <p class="text-gray-700 dark:text-gray-300 leading-relaxed">
                                {{$company->about}}
                            </p>
                        </div>
                        <div class="space-y-3">
                            <div class="flex items-center">
                                <svg class="w-5 h-5 text-gray-400 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 12a9 9 0 01-9 9m9-9a9 9 0 00-9-9m9 9H3m9 9a9 9 0 01-9-9m9 9c1.657 0 3-4.03 3-9s-1.343-9-3-9m0 18c-1.657 0-3-4.03-3-9s1.343-9 3-9m-9 9a9 9 0 019-9"></path>
                                </svg>
                                <a href="#" class="text-indigo-600 dark:text-indigo-400 hover:underline">{{$company->website}}</a>
                            </div>
                            <div class="flex items-center">
                                <svg class="w-5 h-5 text-gray-400 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"></path>
                                </svg>
                                <span class="text-gray-700 dark:text-gray-300">{{$company->industry}}</span>
                            </div>
                            <div class="flex items-center">
                                <svg class="w-5 h-5 text-gray-400 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                                </svg>
                                <span class="text-gray-700 dark:text-gray-300">Established: {{$YearTheCompanyEstablished}}</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Performance Overview Cards -->
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 mb-8">
                {{-- Attention: company relationship - Need company->employees_count or similar field --}}
                <!-- Total Employees Card -->
                <div class="bg-white dark:bg-gray-800 rounded-xl shadow-lg overflow-hidden hover:shadow-xl transition-shadow duration-300">
                    <div class="p-6">
                        <div class="flex items-center justify-between mb-4">
                            <div class="p-3 bg-blue-100 dark:bg-blue-900/30 rounded-lg">
                                <svg class="w-8 h-8 text-blue-600 dark:text-blue-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"></path>
                                </svg>
                            </div>
                        </div>
                        <h3 class="text-gray-500 dark:text-gray-400 text-sm font-medium mb-1">{{ __('Total Applications') }}</h3>
                        <p class="text-3xl font-bold text-gray-900 dark:text-white"> {{$totalJobApplication}}</p>
                    </div>
                </div>

                {{-- Attention: vacancies relationship - Count from company->vacancies->count() --}}
                <!-- Total Vacancies Card -->
                <div class="bg-white dark:bg-gray-800 rounded-xl shadow-lg overflow-hidden hover:shadow-xl transition-shadow duration-300">
                    <div class="p-6">
                        <div class="flex items-center justify-between mb-4">
                            <div class="p-3 bg-purple-100 dark:bg-purple-900/30 rounded-lg">
                                <svg class="w-8 h-8 text-purple-600 dark:text-purple-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 13.255A23.931 23.931 0 0112 15c-3.183 0-6.22-.62-9-1.745M16 6V4a2 2 0 00-2-2h-4a2 2 0 00-2 2v2m4 6h.01M5 20h14a2 2 0 002-2V8a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path>
                                </svg>
                            </div>
                        </div>
                        <h3 class="text-gray-500 dark:text-gray-400 text-sm font-medium mb-1">{{ __('Total Vacancies') }}</h3>
                        <p class="text-3xl font-bold text-gray-900 dark:text-white">{{$totalJobVacancy}}</p>
                    </div>
                </div>

                {{-- Attention: applications relationship - Count from company->applications->count() --}}
                <!-- Total Applicants Card -->
                <div class="bg-white dark:bg-gray-800 rounded-xl shadow-lg overflow-hidden hover:shadow-xl transition-shadow duration-300">
                    <div class="p-6">
                        <div class="flex items-center justify-between mb-4">
                            <div class="p-3 bg-green-100 dark:bg-green-900/30 rounded-lg">
                                <svg class="w-8 h-8 text-green-600 dark:text-green-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z"></path>
                                </svg>
                            </div>
                        </div>
                        <h3 class="text-gray-500 dark:text-gray-400 text-sm font-medium mb-1">{{ __('Total Applicants') }}</h3>
                        <p class="text-3xl font-bold text-gray-900 dark:text-white">{{$totalApplicants}}</p>
                    </div>
                </div>

                {{-- Attention: applications relationship - Average from company->applications->avg('score') --}}
                <!-- Avg Applicant Score Card -->
                <div class="bg-white dark:bg-gray-800 rounded-xl shadow-lg overflow-hidden hover:shadow-xl transition-shadow duration-300">
                    <div class="p-6">
                        <div class="flex items-center justify-between mb-4">
                            <div class="p-3 bg-orange-100 dark:bg-orange-900/30 rounded-lg">
                                <svg class="w-8 h-8 text-orange-600 dark:text-orange-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11.049 2.927c.3-.921 1.603-.921 1.902 0l1.519 4.674a1 1 0 00.95.69h4.915c.969 0 1.371 1.24.588 1.81l-3.976 2.888a1 1 0 00-.363 1.118l1.518 4.674c.3.922-.755 1.688-1.538 1.118l-3.976-2.888a1 1 0 00-1.176 0l-3.976 2.888c-.783.57-1.838-.197-1.538-1.118l1.518-4.674a1 1 0 00-.363-1.118l-3.976-2.888c-.784-.57-.38-1.81.588-1.81h4.914a1 1 0 00.951-.69l1.519-4.674z"></path>
                                </svg>
                            </div>
                        </div>
                        <h3 class="text-gray-500 dark:text-gray-400 text-sm font-medium mb-1">{{ __('Avg Applicant Score') }}</h3>
                        <p class="text-3xl font-bold text-gray-900 dark:text-white">{{$AVGapllicantScore}}<span class="text-lg text-gray-500 dark:text-gray-400">/10</span></p>
                    </div>
                </div>
            </div>

            <!-- Vacancy Performance Chart -->
            <div class="bg-white dark:bg-gray-800 rounded-xl shadow-lg overflow-hidden">
                <div class="px-6 py-5 border-b border-gray-200 dark:border-gray-700">
                    <h3 class="text-lg font-semibold text-gray-900 dark:text-white">{{ __('Vacancy Performance') }}</h3>
                    <p class="text-sm text-gray-500 dark:text-gray-400 mt-1">{{ __('Applications received per vacancy') }}</p>
                </div>
                <div class="p-6">
                    {{-- Attention: vacancies relationship - Need to get vacancies with applications count --}}
                    <div class="space-y-6">
                        @foreach ($applications_received_per_vacancy as $application)
                        <!-- Vacancy 1 -->
                        <div>
                            <div class="flex items-center justify-between mb-2">
                                <div class="flex-1">
                                    <h4 class="text-sm font-medium text-gray-900 dark:text-white">{{$application['title']}}</h4>

                                </div>
                                <span class="text-sm font-semibold text-gray-900 dark:text-white ml-4">{{$application['applications']}} applications</span>
                            </div>
                            <div class="w-full bg-gray-200 dark:bg-gray-700 rounded-full h-3">
                                <div class="bg-gradient-to-r from-blue-500 to-blue-600 h-3 rounded-full flex items-center justify-end pr-2" style="width: 90%">
                                    <span class="text-xs font-medium text-white">{{$application['percentage']}}%</span>
                                </div>
                            </div>
                        </div>
                        @endforeach
                        <!-- Vacancy 2
                        <div>
                            <div class="flex items-center justify-between mb-2">
                                <div class="flex-1">
                                    <h4 class="text-sm font-medium text-gray-900 dark:text-white">Marketing Manager</h4>
                                    <p class="text-xs text-gray-500 dark:text-gray-400">Marketing</p>
                                </div>
                                <span class="text-sm font-semibold text-gray-900 dark:text-white ml-4">32 applications</span>
                            </div>
                            <div class="w-full bg-gray-200 dark:bg-gray-700 rounded-full h-3">
                                <div class="bg-gradient-to-r from-purple-500 to-purple-600 h-3 rounded-full flex items-center justify-end pr-2" style="width: 64%">
                                    <span class="text-xs font-medium text-white">64%</span>
                                </div>
                            </div>
                        </div>

                         Vacancy 3 
                        <div>
                            <div class="flex items-center justify-between mb-2">
                                <div class="flex-1">
                                    <h4 class="text-sm font-medium text-gray-900 dark:text-white">UI/UX Designer</h4>
                                    <p class="text-xs text-gray-500 dark:text-gray-400">Design</p>
                                </div>
                                <span class="text-sm font-semibold text-gray-900 dark:text-white ml-4">28 applications</span>
                            </div>
                            <div class="w-full bg-gray-200 dark:bg-gray-700 rounded-full h-3">
                                <div class="bg-gradient-to-r from-green-500 to-green-600 h-3 rounded-full flex items-center justify-end pr-2" style="width: 56%">
                                    <span class="text-xs font-medium text-white">56%</span>
                                </div>
                            </div>
                        </div>

                        Vacancy 4 
                        <div>
                            <div class="flex items-center justify-between mb-2">
                                <div class="flex-1">
                                    <h4 class="text-sm font-medium text-gray-900 dark:text-white">Sales Representative</h4>
                                    <p class="text-xs text-gray-500 dark:text-gray-400">Sales</p>
                                </div>
                                <span class="text-sm font-semibold text-gray-900 dark:text-white ml-4">25 applications</span>
                            </div>
                            <div class="w-full bg-gray-200 dark:bg-gray-700 rounded-full h-3">
                                <div class="bg-gradient-to-r from-orange-500 to-orange-600 h-3 rounded-full flex items-center justify-end pr-2" style="width: 50%">
                                    <span class="text-xs font-medium text-white">50%</span>
                                </div>
                            </div>
                        </div>

                        Vacancy 5 
                        <div>
                            <div class="flex items-center justify-between mb-2">
                                <div class="flex-1">
                                    <h4 class="text-sm font-medium text-gray-900 dark:text-white">Customer Support Specialist</h4>
                                    <p class="text-xs text-gray-500 dark:text-gray-400">Customer Support</p>
                                </div>
                                <span class="text-sm font-semibold text-gray-900 dark:text-white ml-4">26 applications</span>
                            </div>
                            <div class="w-full bg-gray-200 dark:bg-gray-700 rounded-full h-3">
                                <div class="bg-gradient-to-r from-pink-500 to-pink-600 h-3 rounded-full flex items-center justify-end pr-2" style="width: 52%">
                                    <span class="text-xs font-medium text-white">52%</span>
                                </div>
                            </div>
                        </div> -->
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>