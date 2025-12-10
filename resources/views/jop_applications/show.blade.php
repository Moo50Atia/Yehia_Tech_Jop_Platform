<x-app-layout>
    <x-slot name="header">
        <div class="flex items-center justify-between">
            <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
                {{ __('Application Details') }}
            </h2>
            <div class="flex space-x-2">
                <a href="{{ route('admin.applications.edit', $application->id) }}" class="inline-flex items-center px-4 py-2 bg-yellow-600 dark:bg-yellow-500 border border-transparent rounded-lg font-semibold text-xs text-white uppercase tracking-widest hover:bg-yellow-700 dark:hover:bg-yellow-600 transition">
                    {{ __('Edit') }}
                </a>
                <a href="{{ route('admin.applications.index') }}" class="inline-flex items-center px-4 py-2 bg-gray-600 dark:bg-gray-500 border border-transparent rounded-lg font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 dark:hover:bg-gray-600 transition">
                    {{ __('Back') }}
                </a>
            </div>
        </div>
    </x-slot>

    <div class="py-8">
        <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 space-y-6">
            <!-- Application Details -->
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-xl rounded-xl p-6">
                <h3 class="text-lg font-semibold text-gray-900 dark:text-white mb-4">{{ __('Application Information') }}</h3>
                <dl class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <div>
                        <dt class="text-sm font-medium text-gray-500 dark:text-gray-400">{{ __('Applicant') }}</dt>
                        <dd class="mt-1 text-sm text-gray-900 dark:text-white">{{ $application->user->name ?? 'N/A' }}</dd>
                    </div>
                    <div>
                        <dt class="text-sm font-medium text-gray-500 dark:text-gray-400">{{ __('Email') }}</dt>
                        <dd class="mt-1 text-sm text-gray-900 dark:text-white">{{ $application->user->email ?? 'N/A' }}</dd>
                    </div>
                    <div>
                        <dt class="text-sm font-medium text-gray-500 dark:text-gray-400">{{ __('Job Vacancy') }}</dt>
                        <dd class="mt-1 text-sm text-gray-900 dark:text-white">{{ $application->jobVacansy->title ?? 'N/A' }}</dd>
                    </div>
                    <div>
                        <dt class="text-sm font-medium text-gray-500 dark:text-gray-400">{{ __('Company') }}</dt>
                        <dd class="mt-1 text-sm text-gray-900 dark:text-white">{{ $application->company->name ?? 'N/A' }}</dd>
                    </div>
                    <div>
                        <dt class="text-sm font-medium text-gray-500 dark:text-gray-400">{{ __('Status') }}</dt>
                        <dd class="mt-1">
                            @if($application->status === 'pending')
                            <span class="px-3 py-1 inline-flex text-xs leading-5 font-semibold rounded-full bg-yellow-100 dark:bg-yellow-900/30 text-yellow-800 dark:text-yellow-400">
                                {{ ucfirst($application->status) }}
                            </span>
                            @elseif($application->status === 'accepted')
                            <span class="px-3 py-1 inline-flex text-xs leading-5 font-semibold rounded-full bg-green-100 dark:bg-green-900/30 text-green-800 dark:text-green-400">
                                {{ ucfirst($application->status) }}
                            </span>
                            @else
                            <span class="px-3 py-1 inline-flex text-xs leading-5 font-semibold rounded-full bg-red-100 dark:bg-red-900/30 text-red-800 dark:text-red-400">
                                {{ ucfirst($application->status) }}
                            </span>
                            @endif
                        </dd>
                    </div>
                    <div>
                        <dt class="text-sm font-medium text-gray-500 dark:text-gray-400">{{ __('AI Score') }}</dt>
                        <dd class="mt-1 text-sm text-gray-900 dark:text-white">
                            @if($application->aiGeneratedScore)
                            {{ round($application->aiGeneratedScore / 10, 1) }}/10
                            @else
                            N/A
                            @endif
                        </dd>
                    </div>
                    <div>
                        <dt class="text-sm font-medium text-gray-500 dark:text-gray-400">{{ __('Applied At') }}</dt>
                        <dd class="mt-1 text-sm text-gray-900 dark:text-white">{{ $application->created_at->format('M d, Y h:i A') }}</dd>
                    </div>
                    <div>
                        <dt class="text-sm font-medium text-gray-500 dark:text-gray-400">{{ __('Last Updated') }}</dt>
                        <dd class="mt-1 text-sm text-gray-900 dark:text-white">{{ $application->updated_at->format('M d, Y h:i A') }}</dd>
                    </div>
                    @if($application->aiGeneratedFeedback)
                    <div class="col-span-full">
                        <dt class="text-sm font-medium text-gray-500 dark:text-gray-400">{{ __('AI Feedback') }}</dt>
                        <dd class="mt-1 text-sm text-gray-900 dark:text-white">
                            {{ $application->aiGeneratedFeedback }}
                        </dd>
                    </div>
                    @endif
                </dl>
            </div>

            <!-- Resume Information -->
            @if($application->resume)
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-xl rounded-xl p-6">
                <h3 class="text-lg font-semibold text-gray-900 dark:text-white mb-4">{{ __('Resume') }}</h3>
                <div class="flex items-center justify-between p-4 bg-gray-50 dark:bg-gray-700 rounded-lg">
                    <div class="flex items-center">
                        <svg class="w-10 h-10 text-red-600 mr-3" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd" d="M4 4a2 2 0 012-2h4.586A2 2 0 0112 2.586L15.414 6A2 2 0 0116 7.414V16a2 2 0 01-2 2H6a2 2 0 01-2-2V4z" clip-rule="evenodd"></path>
                        </svg>
                        <div>
                            <p class="text-sm font-medium text-gray-900 dark:text-white">{{ $application->resume->filename ?? 'Resume' }}</p>
                            <p class="text-xs text-gray-500 dark:text-gray-400">{{ $application->resume->user->name ?? 'Unknown' }}</p>
                        </div>
                    </div>
                    @if($application->resume->fileURL)
                    <div class="flex space-x-2">
                        <a href="{{ $application->resume->fileURL }}" target="_blank" class="inline-flex items-center px-3 py-2 bg-indigo-600 dark:bg-indigo-500 border border-transparent rounded-lg font-semibold text-xs text-white uppercase tracking-widest hover:bg-indigo-700 dark:hover:bg-indigo-600 transition">
                            <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path>
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"></path>
                            </svg>
                            View
                        </a>
                    </div>
                    @endif
                </div>
            </div>
            @endif

            <!-- Actions -->
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-xl rounded-xl p-6">
                <h3 class="text-lg font-semibold text-gray-900 dark:text-white mb-4">{{ __('Actions') }}</h3>
                <div class="flex justify-end space-x-3">
                    <a href="{{ route('admin.applications.edit', $application->id) }}" class="inline-flex items-center px-4 py-2 bg-yellow-600 dark:bg-yellow-500 border border-transparent rounded-lg font-semibold text-xs text-white uppercase tracking-widest hover:bg-yellow-700 dark:hover:bg-yellow-600 transition">
                        {{ __('Edit Application') }}
                    </a>
                    <form action="{{ route('admin.applications.destroy', $application->id) }}" method="POST" class="inline" onsubmit="return confirm('Are you sure you want to delete this application?');">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="inline-flex items-center px-4 py-2 bg-red-600 dark:bg-red-500 border border-transparent rounded-lg font-semibold text-xs text-white uppercase tracking-widest hover:bg-red-700 dark:hover:bg-red-600 transition">
                            {{ __('Delete Application') }}
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>