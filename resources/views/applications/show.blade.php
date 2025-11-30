<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">{{ __('Application Details') }}</h2>
    </x-slot>
    <div class="py-8">
        <div class="max-w-4xl mx-auto px-4">
            <div class="bg-white dark:bg-gray-800 shadow-xl rounded-xl p-6">
                <dl class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <div>
                        <dt class="text-sm font-medium text-gray-500 dark:text-gray-400">{{ __('Job') }}</dt>
                        <dd class="mt-1 text-sm text-gray-900 dark:text-white">{{ $application->jobVacansy->title ?? 'N/A' }}</dd>
                    </div>
                    <div>
                        <dt class="text-sm font-medium text-gray-500 dark:text-gray-400">{{ __('Applicant') }}</dt>
                        <dd class="mt-1 text-sm text-gray-900 dark:text-white">{{ $application->user->name ?? 'N/A' }}</dd>
                    </div>
                    <div>
                        <dt class="text-sm font-medium text-gray-500 dark:text-gray-400">{{ __('Email') }}</dt>
                        <dd class="mt-1 text-sm text-gray-900 dark:text-white">{{ $application->user->email ?? 'N/A' }}</dd>
                    </div>
                    <div>
                        <dt class="text-sm font-medium text-gray-500 dark:text-gray-400">{{ __('Status') }}</dt>
                        <dd class="mt-1"><span class="px-3 py-1 text-xs font-semibold rounded-full bg-blue-100 dark:bg-blue-900/30 text-blue-800 dark:text-blue-400">{{ ucfirst($application->status) }}</span></dd>
                    </div>
                    <div>
                        <dt class="text-sm font-medium text-gray-500 dark:text-gray-400">{{ __('Applied Date') }}</dt>
                        <dd class="mt-1 text-sm text-gray-900 dark:text-white">{{ $application->created_at->format('M d, Y') }}</dd>
                    </div>
                </dl>
                <div class="mt-6 flex justify-end space-x-2">
                    <a href="{{ route('admin.applications.edit', $application->id) }}" class="px-4 py-2 bg-yellow-600 rounded-lg text-xs font-semibold text-white uppercase hover:bg-yellow-700 transition">{{ __('Edit') }}</a>
                    <a href="{{ route('admin.applications.index') }}" class="px-4 py-2 bg-gray-600 rounded-lg text-xs font-semibold text-white uppercase hover:bg-gray-700 transition">{{ __('Back') }}</a>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>