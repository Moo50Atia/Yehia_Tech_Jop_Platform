<x-app-layout>
    <x-slot name="header">
        <div class="flex items-center justify-between">
            <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
                {{ __('My Applications') }}
            </h2>
            <a href="{{ route('seeker.dashboard') }}" class="inline-flex items-center px-4 py-2 bg-indigo-600 dark:bg-indigo-500 border border-transparent rounded-lg font-semibold text-xs text-white uppercase tracking-widest hover:bg-indigo-700 dark:hover:bg-indigo-600 transition">
                <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
                </svg>
                {{ __('Browse Jobs') }}
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

        .delay-400 {
            animation-delay: 0.4s;
        }
    </style>

    <div class="py-8">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <!-- Success/Info Messages -->
            @if(session('success'))
            <div class="mb-6 bg-green-100 dark:bg-green-900/30 border border-green-400 dark:border-green-600 text-green-700 dark:text-green-400 px-4 py-3 rounded-lg animate-fade-in" style="animation-fill-mode: forwards;">
                {{ session('success') }}
            </div>
            @endif
            @if(session('info'))
            <div class="mb-6 bg-blue-100 dark:bg-blue-900/30 border border-blue-400 dark:border-blue-600 text-blue-700 dark:text-blue-400 px-4 py-3 rounded-lg animate-fade-in" style="animation-fill-mode: forwards;">
                {{ session('info') }}
            </div>
            @endif

            <!-- Stats Cards -->
            <div class="grid grid-cols-2 md:grid-cols-4 gap-4 mb-8">
                <div class="bg-white dark:bg-gray-800 rounded-xl shadow-lg p-5 animate-fade-in-up opacity-0" style="animation-fill-mode: forwards;">
                    <div class="flex items-center justify-between">
                        <div>
                            <p class="text-sm text-gray-500 dark:text-gray-400">Total</p>
                            <p class="text-2xl font-bold text-gray-900 dark:text-white">{{ $totalApplications }}</p>
                        </div>
                        <div class="p-3 bg-indigo-100 dark:bg-indigo-900/30 rounded-lg">
                            <svg class="w-6 h-6 text-indigo-600 dark:text-indigo-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path>
                            </svg>
                        </div>
                    </div>
                </div>
                <div class="bg-white dark:bg-gray-800 rounded-xl shadow-lg p-5 animate-fade-in-up opacity-0 delay-100" style="animation-fill-mode: forwards;">
                    <div class="flex items-center justify-between">
                        <div>
                            <p class="text-sm text-gray-500 dark:text-gray-400">Pending</p>
                            <p class="text-2xl font-bold text-yellow-600 dark:text-yellow-400">{{ $pendingApplications }}</p>
                        </div>
                        <div class="p-3 bg-yellow-100 dark:bg-yellow-900/30 rounded-lg">
                            <svg class="w-6 h-6 text-yellow-600 dark:text-yellow-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                            </svg>
                        </div>
                    </div>
                </div>
                <div class="bg-white dark:bg-gray-800 rounded-xl shadow-lg p-5 animate-fade-in-up opacity-0 delay-200" style="animation-fill-mode: forwards;">
                    <div class="flex items-center justify-between">
                        <div>
                            <p class="text-sm text-gray-500 dark:text-gray-400">Accepted</p>
                            <p class="text-2xl font-bold text-green-600 dark:text-green-400">{{ $acceptedApplications }}</p>
                        </div>
                        <div class="p-3 bg-green-100 dark:bg-green-900/30 rounded-lg">
                            <svg class="w-6 h-6 text-green-600 dark:text-green-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                            </svg>
                        </div>
                    </div>
                </div>
                <div class="bg-white dark:bg-gray-800 rounded-xl shadow-lg p-5 animate-fade-in-up opacity-0 delay-300" style="animation-fill-mode: forwards;">
                    <div class="flex items-center justify-between">
                        <div>
                            <p class="text-sm text-gray-500 dark:text-gray-400">Rejected</p>
                            <p class="text-2xl font-bold text-red-600 dark:text-red-400">{{ $rejectedApplications }}</p>
                        </div>
                        <div class="p-3 bg-red-100 dark:bg-red-900/30 rounded-lg">
                            <svg class="w-6 h-6 text-red-600 dark:text-red-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 14l2-2m0 0l2-2m-2 2l-2-2m2 2l2 2m7-2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                            </svg>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Applications List -->
            <div class="bg-white dark:bg-gray-800 rounded-xl shadow-lg overflow-hidden animate-fade-in-up opacity-0 delay-400" style="animation-fill-mode: forwards;">
                <div class="px-6 py-4 border-b border-gray-200 dark:border-gray-700">
                    <h3 class="text-lg font-semibold text-gray-900 dark:text-white">Application History</h3>
                </div>

                @if($applications->count() > 0)
                <div class="divide-y divide-gray-200 dark:divide-gray-700">
                    @foreach($applications as $index => $application)
                    <div class="p-6 hover:bg-gray-50 dark:hover:bg-gray-700/50 transition-colors animate-fade-in opacity-0" style="animation-delay: {{ 0.1 * $index }}s; animation-fill-mode: forwards;">
                        <div class="flex flex-col md:flex-row md:items-center md:justify-between gap-4">
                            <div class="flex items-start space-x-4">
                                <!-- Company Initial -->
                                <div class="w-12 h-12 bg-gradient-to-br from-indigo-500 to-purple-500 rounded-xl flex items-center justify-center text-white font-bold text-lg flex-shrink-0">
                                    {{ substr($application->jobVacansy->company->name ?? 'C', 0, 1) }}
                                </div>
                                <div>
                                    <h4 class="text-lg font-semibold text-gray-900 dark:text-white">
                                        {{ $application->jobVacansy->title ?? 'Position Removed' }}
                                    </h4>
                                    <p class="text-sm text-gray-600 dark:text-gray-400">
                                        {{ $application->jobVacansy->company->name ?? 'Unknown Company' }}
                                    </p>
                                    <div class="flex items-center gap-4 mt-2 text-sm text-gray-500 dark:text-gray-400">
                                        <span class="flex items-center">
                                            <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                                            </svg>
                                            {{ $application->created_at->format('M d, Y') }}
                                        </span>
                                        @if($application->jobVacansy->location)
                                        <span class="flex items-center">
                                            <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"></path>
                                            </svg>
                                            {{ $application->jobVacansy->location }}
                                        </span>
                                        @endif
                                    </div>
                                </div>
                            </div>

                            <div class="flex items-center gap-4">
                                <!-- Status Badge -->
                                <span class="px-4 py-2 text-sm font-semibold rounded-full 
                                    @if($application->status == 'pending') bg-yellow-100 text-yellow-700 dark:bg-yellow-900/30 dark:text-yellow-400
                                    @elseif($application->status == 'accepted') bg-green-100 text-green-700 dark:bg-green-900/30 dark:text-green-400
                                    @elseif($application->status == 'rejected') bg-red-100 text-red-700 dark:bg-red-900/30 dark:text-red-400
                                    @else bg-gray-100 text-gray-700 dark:bg-gray-700 dark:text-gray-300
                                    @endif">
                                    {{ ucfirst($application->status) }}
                                </span>

                                <!-- AI Score -->
                                @if($application->aiGeneratedScore)
                                <div class="text-center">
                                    <div class="text-lg font-bold 
                                        @if($application->aiGeneratedScore >= 80) text-green-600 dark:text-green-400
                                        @elseif($application->aiGeneratedScore >= 60) text-yellow-600 dark:text-yellow-400
                                        @else text-red-600 dark:text-red-400
                                        @endif">
                                        {{ $application->aiGeneratedScore }}%
                                    </div>
                                    <div class="text-xs text-gray-500 dark:text-gray-400">Match Score</div>
                                </div>
                                @endif
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>

                <!-- Pagination -->
                @if($applications->hasPages())
                <div class="px-6 py-4 border-t border-gray-200 dark:border-gray-700">
                    {{ $applications->links() }}
                </div>
                @endif
                @else
                <!-- Empty State -->
                <div class="p-12 text-center">
                    <svg class="w-16 h-16 mx-auto text-gray-400 mb-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path>
                    </svg>
                    <h3 class="text-lg font-medium text-gray-900 dark:text-white mb-2">No Applications Yet</h3>
                    <p class="text-gray-500 dark:text-gray-400 mb-6">You haven't applied to any jobs yet. Start exploring opportunities!</p>
                    <a href="{{ route('seeker.dashboard') }}" class="inline-flex items-center px-6 py-3 bg-gradient-to-r from-indigo-600 to-purple-600 text-white font-semibold rounded-xl hover:from-indigo-700 hover:to-purple-700 transition-all shadow-lg hover:shadow-xl">
                        <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
                        </svg>
                        Browse Jobs
                    </a>
                </div>
                @endif
            </div>
        </div>
    </div>
</x-app-layout>