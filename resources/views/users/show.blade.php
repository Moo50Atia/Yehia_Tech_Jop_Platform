<x-app-layout>
    <x-slot name="header">
        <div class="flex items-center justify-between">
            <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
                @if(Auth::user()->role === 'admin')
                {{ $user->name }}
                @else
                {{ __('Applicant Profile') }}
                @endif
            </h2>
            <div class="flex space-x-2">
                @if(Auth::user()->role === 'admin')
                <a href="{{ route('admin.users.edit', $user->id) }}" class="inline-flex items-center px-4 py-2 bg-yellow-600 border border-transparent rounded-lg font-semibold text-xs text-white uppercase tracking-widest hover:bg-yellow-700 transition">
                    {{ __('Edit') }}
                </a>
                @endif
                <a href="{{ route('admin.users.index') }}" class="inline-flex items-center px-4 py-2 bg-gray-600 border border-transparent rounded-lg font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 transition">
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
                    @if(Auth::user()->role === 'admin')
                    {{ __('User Information') }}
                    @else
                    {{ __('Applicant Information') }}
                    @endif
                </h3>
                <dl class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <div>
                        <dt class="text-sm font-medium text-gray-500 dark:text-gray-400">{{ __('Name') }}</dt>
                        <dd class="mt-1 text-sm text-gray-900 dark:text-white">{{ $user->name }}</dd>
                    </div>
                    @if(Auth::user()->role === 'admin')
                    <div>
                        <dt class="text-sm font-medium text-gray-500 dark:text-gray-400">{{ __('Email') }}</dt>
                        <dd class="mt-1 text-sm text-gray-900 dark:text-white">{{ $user->email }}</dd>
                    </div>
                    @endif
                    <div>
                        <dt class="text-sm font-medium text-gray-500 dark:text-gray-400">{{ __('Role') }}</dt>
                        <dd class="mt-1">
                            <span class="px-3 py-1 inline-flex text-xs leading-5 font-semibold rounded-full bg-purple-100 dark:bg-purple-900/30 text-purple-800 dark:text-purple-400">
                                {{ ucfirst(str_replace('_', ' ', $user->role)) }}
                            </span>
                        </dd>
                    </div>
                    @if(Auth::user()->role === 'admin')
                    <div>
                        <dt class="text-sm font-medium text-gray-500 dark:text-gray-400">{{ __('Joined') }}</dt>
                        <dd class="mt-1 text-sm text-gray-900 dark:text-white">{{ $user->created_at->format('M d, Y') }}</dd>
                    </div>
                    @endif
                </dl>
            </div>

            @if(Auth::user()->role === 'admin' && $user->role == 'company_owner' && $user->company)
            <!-- Company (if company owner) - Admin Only -->
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-xl rounded-xl p-6">
                <h3 class="text-lg font-semibold text-gray-900 dark:text-white mb-4">{{ __('Company') }}</h3>
                <div class="p-4 bg-gray-50 dark:bg-gray-700 rounded-lg">
                    <h4 class="font-medium text-gray-900 dark:text-white">{{ $user->company->name }}</h4>
                    <p class="text-sm text-gray-600 dark:text-gray-400 mt-1">{{ $user->company->industry }}</p>
                </div>
            </div>
            @endif

            <!-- Resumes (if job seeker) -->
            @if($user->resumes->count() > 0)
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-xl rounded-xl p-6">
                <h3 class="text-lg font-semibold text-gray-900 dark:text-white mb-4">
                    {{ __('Resumes') }} ({{ $user->resumes->count() }})
                </h3>
                <div class="space-y-4">
                    @foreach($user->resumes as $resume)
                    <div class="p-4 bg-gray-50 dark:bg-gray-700 rounded-lg border border-gray-200 dark:border-gray-600">
                        @if($resume->fileURL)
                        <div class="flex items-center justify-between mb-3">
                            <div class="flex items-center">
                                <svg class="w-8 h-8 text-indigo-500 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 21h10a2 2 0 002-2V9.414a1 1 0 00-.293-.707l-5.414-5.414A1 1 0 0012.586 3H7a2 2 0 00-2 2v14a2 2 0 002 2z"></path>
                                </svg>
                                <div>
                                    <p class="text-sm font-medium text-gray-900 dark:text-white">{{ $resume->filename ?? 'Resume.pdf' }}</p>
                                    <p class="text-xs text-gray-500 dark:text-gray-400">{{ __('Uploaded') }}: {{ $resume->created_at->format('M d, Y') }}</p>
                                </div>
                            </div>
                            <a href="{{ $resume->fileURL }}" target="_blank" class="inline-flex items-center px-3 py-2 bg-indigo-600 hover:bg-indigo-700 text-white text-xs font-medium rounded-lg transition">
                                <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-4l-4 4m0 0l-4-4m4 4V4"></path>
                                </svg>
                                {{ __('Download') }}
                            </a>
                        </div>
                        @endif

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

                        @if($resume->experience)
                        <div class="mb-3">
                            <h4 class="text-xs font-semibold text-gray-700 dark:text-gray-300 uppercase mb-1">{{ __('Experience') }}</h4>
                            <p class="text-sm text-gray-900 dark:text-white whitespace-pre-line">{{ $resume->experience }}</p>
                        </div>
                        @endif

                        @if($resume->education)
                        <div>
                            <h4 class="text-xs font-semibold text-gray-700 dark:text-gray-300 uppercase mb-1">{{ __('Education') }}</h4>
                            <p class="text-sm text-gray-900 dark:text-white whitespace-pre-line">{{ $resume->education }}</p>
                        </div>
                        @endif
                    </div>
                    @endforeach
                </div>
            </div>
            @endif

            <!-- Applications -->
            @if($user->jobApplications->count() > 0)
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-xl rounded-xl p-6">
                <h3 class="text-lg font-semibold text-gray-900 dark:text-white mb-4">
                    @if(Auth::user()->role === 'admin')
                    {{ __('Job Applications') }} ({{ $user->jobApplications->count() }})
                    @else
                    {{ __('Applications to Your Company') }} ({{ $user->jobApplications->count() }})
                    @endif
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
                                    {{ $application->jobVacansy->company->name ?? 'N/A' }}
                                </p>
                                <p class="text-xs text-gray-500 dark:text-gray-400 mt-1">
                                    {{ __('Applied') }}: {{ $application->created_at->format('M d, Y') }}
                                </p>
                            </div>
                            <span class="px-3 py-1 text-xs font-semibold rounded-full 
                                {{ $application->status == 'accepted' ? 'bg-green-100 dark:bg-green-900/30 text-green-800 dark:text-green-400' : '' }}
                                {{ $application->status == 'rejected' ? 'bg-red-100 dark:bg-red-900/30 text-red-800 dark:text-red-400' : '' }}
                                {{ $application->status == 'pending' ? 'bg-yellow-100 dark:bg-yellow-900/30 text-yellow-800 dark:text-yellow-400' : '' }}
                                {{ $application->status == 'reviewed' ? 'bg-blue-100 dark:bg-blue-900/30 text-blue-800 dark:text-blue-400' : '' }}">
                                {{ ucfirst($application->status) }}
                            </span>
                        </div>
                        @if($application->aiGeneratedScore)
                        <div class="mt-2 pt-2 border-t border-gray-200 dark:border-gray-600">
                            <p class="text-xs text-gray-600 dark:text-gray-400">
                                <strong>{{ __('AI Score') }}:</strong> {{ $application->aiGeneratedScore }}
                            </p>
                        </div>
                        @endif
                        @if($application->aiGeneratedFeedback)
                        <div class="mt-1">
                            <p class="text-xs text-gray-600 dark:text-gray-400">
                                <strong>{{ __('AI Feedback') }}:</strong> {{ $application->aiGeneratedFeedback }}
                            </p>
                        </div>
                        @endif
                    </div>
                    @endforeach
                </div>
            </div>
            @endif

            @if($user->resumes->count() == 0 && $user->jobApplications->count() == 0)
            <!-- No Data Available -->
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-xl rounded-xl p-12">
                <div class="text-center">
                    <svg class="w-16 h-16 text-gray-400 dark:text-gray-600 mx-auto mb-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path>
                    </svg>
                    <p class="text-gray-500 dark:text-gray-400 text-lg font-medium">{{ __('No additional information available') }}</p>
                    <p class="text-gray-400 dark:text-gray-500 text-sm mt-2">{{ __('This user has not uploaded any resumes or submitted applications yet.') }}</p>
                </div>
            </div>
            @endif
        </div>
    </div>
</x-app-layout>