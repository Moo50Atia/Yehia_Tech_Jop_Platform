<x-app-layout>
    <x-slot name="header">
        <div class="flex items-center justify-between">
            <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">{{ $jobVacancy->title }}</h2>
            <div class="flex space-x-2">
                <a href="{{ route('job-vacancy.edit', $jobVacancy->id) }}" class="inline-flex items-center px-4 py-2 bg-yellow-600 border border-transparent rounded-lg font-semibold text-xs text-white uppercase tracking-widest hover:bg-yellow-700 transition">{{ __('Edit') }}</a>
                <a href="{{ route('job-vacancy.index') }}" class="inline-flex items-center px-4 py-2 bg-gray-600 border border-transparent rounded-lg font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 transition">{{ __('Back') }}</a>
            </div>
        </div>
    </x-slot>

    <div class="py-8">
        <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 space-y-6">
            <!-- Job Details -->
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-xl rounded-xl p-6">
                <h3 class="text-lg font-semibold text-gray-900 dark:text-white mb-4">{{ __('Job Information') }}</h3>
                <dl class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <div>
                        <dt class="text-sm font-medium text-gray-500 dark:text-gray-400">{{ __('Title') }}</dt>
                        <dd class="mt-1 text-sm text-gray-900 dark:text-white">{{ $jobVacancy->title }}</dd>
                    </div>
                    <div>
                        <dt class="text-sm font-medium text-gray-500 dark:text-gray-400">{{ __('Company') }}</dt>
                        <dd class="mt-1 text-sm text-gray-900 dark:text-white">{{ $jobVacancy->company->name ?? 'N/A' }}</dd>
                    </div>
                    <div>
                        <dt class="text-sm font-medium text-gray-500 dark:text-gray-400">{{ __('Category') }}</dt>
                        <dd class="mt-1 text-sm text-gray-900 dark:text-white">{{ $jobVacancy->jobCategory->name ?? 'N/A' }}</dd>
                    </div>
                    <div>
                        <dt class="text-sm font-medium text-gray-500 dark:text-gray-400">{{ __('Location') }}</dt>
                        <dd class="mt-1 text-sm text-gray-900 dark:text-white">{{ $jobVacancy->location }}</dd>
                    </div>
                    <div>
                        <dt class="text-sm font-medium text-gray-500 dark:text-gray-400">{{ __('Job Type') }}</dt>
                        <dd class="mt-1 text-sm text-gray-900 dark:text-white">{{ ucfirst(str_replace('_', ' ', $jobVacancy->job_type ?? 'N/A')) }}</dd>
                    </div>
                    @if($jobVacancy->salary_range)
                    <div>
                        <dt class="text-sm font-medium text-gray-500 dark:text-gray-400">{{ __('Salary Range') }}</dt>
                        <dd class="mt-1 text-sm text-gray-900 dark:text-white">{{ $jobVacancy->salary_range }}</dd>
                    </div>
                    @endif
                    <div class="md:col-span-2">
                        <dt class="text-sm font-medium text-gray-500 dark:text-gray-400">{{ __('Description') }}</dt>
                        <dd class="mt-1 text-sm text-gray-900 dark:text-white">{{ $jobVacancy->description }}</dd>
                    </div>
                    <div class="md:col-span-2">
                        <dt class="text-sm font-medium text-gray-500 dark:text-gray-400">{{ __('Requirements') }}</dt>
                        <dd class="mt-1 text-sm text-gray-900 dark:text-white">{{ $jobVacancy->requirements }}</dd>
                    </div>
                </dl>
            </div>

            <!-- Applications -->
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-xl rounded-xl p-6">
                <h3 class="text-lg font-semibold text-gray-900 dark:text-white mb-4">{{ __('Applications') }} ({{ $jobVacancy->JopApplications->count() }})</h3>
                @if($jobVacancy->JopApplications->count() > 0)
                <div class="space-y-3">
                    @foreach($jobVacancy->JopApplications as $application)
                    <div class="p-4 bg-gray-50 dark:bg-gray-700 rounded-lg">
                        <div class="flex items-center justify-between">
                            <div>
                                <h4 class="font-medium text-gray-900 dark:text-white">{{ $application->user->name ?? 'N/A' }}</h4>
                                <p class="text-sm text-gray-600 dark:text-gray-400 mt-1">{{ $application->user->email ?? 'N/A' }}</p>
                            </div>
                            <span class="px-3 py-1 text-xs font-semibold rounded-full bg-blue-100 dark:bg-blue-900/30 text-blue-800 dark:text-blue-400">
                                {{ ucfirst($application->status) }}
                            </span>
                        </div>
                    </div>
                    @endforeach
                </div>
                @else
                <p class="text-gray-500 dark:text-gray-400">{{ __('No applications yet.') }}</p>
                @endif
            </div>
        </div>
    </div>
</x-app-layout>