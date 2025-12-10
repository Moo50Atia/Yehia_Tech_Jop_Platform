<x-app-layout>
    <x-slot name="header">
        <div class="flex items-center justify-between">
            <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
                {{ $user->name }}
            </h2>
            <div class="flex space-x-2">
                <a href="{{ route('admin.users.edit', $user->id) }}" class="inline-flex items-center px-4 py-2 bg-yellow-600 dark:bg-yellow-500 border border-transparent rounded-lg font-semibold text-xs text-white uppercase tracking-widest hover:bg-yellow-700 dark:hover:bg-yellow-600 transition">
                    {{ __('Edit') }}
                </a>
                <a href="{{ route('admin.users.index') }}" class="inline-flex items-center px-4 py-2 bg-gray-600 dark:bg-gray-500 border border-transparent rounded-lg font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 dark:hover:bg-gray-600 transition">
                    {{ __('Back') }}
                </a>
            </div>
        </div>
    </x-slot>

    <div class="py-8">
        <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 space-y-6">
            <!-- User Information -->
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-xl rounded-xl p-6">
                <h3 class="text-lg font-semibold text-gray-900 dark:text-white mb-4">
                    {{ __('User Information') }}
                </h3>
                <dl class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <div>
                        <dt class="text-sm font-medium text-gray-500 dark:text-gray-400">{{ __('Name') }}</dt>
                        <dd class="mt-1 text-sm text-gray-900 dark:text-white">{{ $user->name }}</dd>
                    </div>
                    <div>
                        <dt class="text-sm font-medium text-gray-500 dark:text-gray-400">{{ __('Email') }}</dt>
                        <dd class="mt-1 text-sm text-gray-900 dark:text-white">{{ $user->email }}</dd>
                    </div>
                    <div>
                        <dt class="text-sm font-medium text-gray-500 dark:text-gray-400">{{ __('Role') }}</dt>
                        <dd class="mt-1">
                            <span class="px-3 py-1 inline-flex text-xs leading-5 font-semibold rounded-full bg-purple-100 dark:bg-purple-900/30 text-purple-800 dark:text-purple-400">
                                {{ ucfirst(str_replace('_', ' ', $user->role)) }}
                            </span>
                        </dd>
                    </div>
                    <div>
                        <dt class="text-sm font-medium text-gray-500 dark:text-gray-400">{{ __('Joined') }}</dt>
                        <dd class="mt-1 text-sm text-gray-900 dark:text-white">{{ $user->created_at->format('M d, Y') }}</dd>
                    </div>
                </dl>
            </div>

            <!-- Company (if company owner) -->
            @if($user->role === 'company_owner' && $user->company)
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-xl rounded-xl p-6">
                <h3 class="text-lg font-semibold text-gray-900 dark:text-white mb-4">{{ __('Company') }}</h3>
                <div class="p-4 bg-gray-50 dark:bg-gray-700 rounded-lg">
                    <h4 class="font-medium text-gray-900 dark:text-white">{{ $user->company->name }}</h4>
                    <p class="text-sm text-gray-600 dark:text-gray-400 mt-1">{{ $user->company->industry ?? 'N/A' }}</p>
                </div>
            </div>
            @endif

            <!-- Resumes (if job seeker) -->
            @if($user->role === 'jop_seeker' && $user->resumes && $user->resumes->count() > 0)
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-xl rounded-xl p-6">
                <h3 class="text-lg font-semibold text-gray-900 dark:text-white mb-4">
                    {{ __('Resumes') }} ({{ $user->resumes->count() }})
                </h3>
                <div class="space-y-4">
                    @foreach($user->resumes as $resume)
                    <div class="p-4 bg-gray-50 dark:bg-gray-700 rounded-lg border border-gray-200 dark:border-gray-600">
                        <div class="flex items-center justify-between mb-3">
                            <div class="flex items-center">
                                <svg class="w-8 h-8 text-indigo-500 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 21h10a2 2 0 002-2V9.414a1 1 0 00-.293-.707l-5.414-5.414A1 1 0 0012.586 3H7a2 2 0 00-2 2v14a2 2 0 002 2z"></path>
                                </svg>
                                <div>
                                    <p class="text-sm font-medium text-gray-900 dark:text-white">{{ $resume->filename ?? 'Resume' }}</p>
                                    <p class="text-xs text-gray-500 dark:text-gray-400">{{ __('Uploaded') }}: {{ $resume->created_at->format('M d, Y') }}</p>
                                </div>
                            </div>
                            @if($resume->fileURL)
                            <a href="{{ $resume->fileURL }}" target="_blank" class="inline-flex items-center px-3 py-2 bg-indigo-600 hover:bg-indigo-700 text-white text-xs font-medium rounded-lg transition">
                                <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-4l-4 4m0 0l-4-4m4 4V4"></path>
                                </svg>
                                {{ __('Download') }}
                            </a>
                            @endif
                        </div>
                        @if($resume->summary)
                        <div class="mb-3">
                            <h4 class="text-xs font-semibold text-gray-700 dark:text-gray-300 uppercase mb-1">{{ __('Summary') }}</h4>
                            <p class="text-sm text-gray-900 dark:text-white">{{ $resume->summary }}</p>
                        </div>
                        @endif
                        @if($resume->skills)
                        <div class="mb-3">
                            <h4 class="text-xs font-semibold text-gray-700 dark:text-gray-300 uppercase mb-1">{{ __('Skills') }}</h4>
                            <p class="text-sm text-gray-900 dark:text-white">{{ $resume->skills }}</p>
                        </div>
                        @endif
                    </div>
                    @endforeach
                </div>
            </div>
            @endif

            <!-- Applications (if job seeker) -->
            @if($user->role === 'jop_seeker' && $user->jobApplications && $user->jobApplications->count() > 0)
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-xl rounded-xl p-6">
                <h3 class="text-lg font-semibold text-gray-900 dark:text-white mb-4">
                    {{ __('Job Applications') }} ({{ $user->jobApplications->count() }})
                </h3>
                <div class="space-y-3">
                    @foreach($user->jobApplications as $application)
                    <div class="p-4 bg-gray-50 dark:bg-gray-700 rounded-lg">
                        <div class="flex justify-between items-start mb-2">
                            <div class="flex-1">
                                <h4 class="font-medium text-gray-900 dark:text-white">{{ $application->jobVacansy->title ?? 'N/A' }}</h4>
                                <p class="text-sm text-gray-600 dark:text-gray-400 mt-1">
                                    <svg class="w-4 h-4 inline mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"></path>
                                    </svg>
                                    {{ $application->company->name ?? 'N/A' }}
                                </p>
                                <p class="text-xs text-gray-500 dark:text-gray-400 mt-1">
                                    {{ __('Applied') }}: {{ $application->created_at->format('M d, Y') }}
                                </p>
                            </div>
                            @if($application->status === 'pending')
                            <span class="px-3 py-1 text-xs font-semibold rounded-full bg-yellow-100 dark:bg-yellow-900/30 text-yellow-800 dark:text-yellow-400">
                                {{ ucfirst($application->status) }}
                            </span>
                            @elseif($application->status === 'accepted')
                            <span class="px-3 py-1 text-xs font-semibold rounded-full bg-green-100 dark:bg-green-900/30 text-green-800 dark:text-green-400">
                                {{ ucfirst($application->status) }}
                            </span>
                            @else
                            <span class="px-3 py-1 text-xs font-semibold rounded-full bg-red-100 dark:bg-red-900/30 text-red-800 dark:text-red-400">
                                {{ ucfirst($application->status) }}
                            </span>
                            @endif
                        </div>
                        @if($application->aiGeneratedScore || $application->aiGeneratedFeedback)
                        <div class="mt-2 pt-2 border-t border-gray-200 dark:border-gray-600">
                            @if($application->aiGeneratedScore)
                            <p class="text-xs text-gray-600 dark:text-gray-400">
                                <strong>{{ __('AI Score') }}:</strong> {{ round($application->aiGeneratedScore / 10, 1) }}/10
                            </p>
                            @endif
                            @if($application->aiGeneratedFeedback)
                            <p class="text-xs text-gray-600 dark:text-gray-400 mt-1">
                                <strong>{{ __('AI Feedback') }}:</strong> {{ Str::limit($application->aiGeneratedFeedback, 100) }}
                            </p>
                            @endif
                        </div>
                        @endif
                    </div>
                    @endforeach
                </div>
            </div>
            @endif

            <!-- Actions -->
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-xl rounded-xl p-6">
                <div class="flex justify-end space-x-3">
                    <a href="{{ route('admin.users.edit', $user->id) }}" class="inline-flex items-center px-4 py-2 bg-yellow-600 dark:bg-yellow-500 border border-transparent rounded-lg font-semibold text-xs text-white uppercase tracking-widest hover:bg-yellow-700 dark:hover:bg-yellow-600 transition">
                        {{ __('Edit User') }}
                    </a>
                    <form action="{{ route('admin.users.destroy', $user->id) }}" method="POST" class="inline" onsubmit="return confirm('Are you sure you want to delete this user?');">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="inline-flex items-center px-4 py-2 bg-red-600 dark:bg-red-500 border border-transparent rounded-lg font-semibold text-xs text-white uppercase tracking-widest hover:bg-red-700 dark:hover:bg-red-600 transition">
                            {{ __('Delete User') }}
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>