<x-app-layout>
    <x-slot name="header">
        <div class="flex items-center justify-between">
            <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
                {{ $company->name }}
            </h2>
            <div class="flex space-x-2">
                <a href="{{ route('company.edit', $company->id) }}" class="inline-flex items-center px-4 py-2 bg-yellow-600 border border-transparent rounded-lg font-semibold text-xs text-white uppercase tracking-widest hover:bg-yellow-700 transition">{{ __('Edit') }}</a>
                <a href="{{ route('company.index') }}" class="inline-flex items-center px-4 py-2 bg-gray-600 border border-transparent rounded-lg font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 transition">{{ __('Back') }}</a>
            </div>
        </div>
    </x-slot>

    <div class="py-8">
        <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 space-y-6">
            <!-- Company Details -->
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-xl rounded-xl p-6">
                <h3 class="text-lg font-semibold text-gray-900 dark:text-white mb-4">{{ __('Company Information') }}</h3>
                <dl class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <div>
                        <dt class="text-sm font-medium text-gray-500 dark:text-gray-400">{{ __('Name') }}</dt>
                        <dd class="mt-1 text-sm text-gray-900 dark:text-white">{{ $company->name }}</dd>
                    </div>
                    <div>
                        <dt class="text-sm font-medium text-gray-500 dark:text-gray-400">{{ __('Industry') }}</dt>
                        <dd class="mt-1 text-sm text-gray-900 dark:text-white">{{ $company->industry }}</dd>
                    </div>
                    <div class="md:col-span-2">
                        <dt class="text-sm font-medium text-gray-500 dark:text-gray-400">{{ __('Address') }}</dt>
                        <dd class="mt-1 text-sm text-gray-900 dark:text-white">{{ $company->address }}</dd>
                    </div>
                    @if($company->website)
                    <div>
                        <dt class="text-sm font-medium text-gray-500 dark:text-gray-400">{{ __('Website') }}</dt>
                        <dd class="mt-1 text-sm"><a href="{{ $company->website }}" target="_blank" class="text-indigo-600 dark:text-indigo-400 hover:underline">{{ $company->website }}</a></dd>
                    </div>
                    @endif
                    <div>
                        <dt class="text-sm font-medium text-gray-500 dark:text-gray-400">{{ __('Owner') }}</dt>
                        <dd class="mt-1 text-sm text-gray-900 dark:text-white">{{ $company->owner->name ?? 'N/A' }}</dd>
                    </div>
                </dl>
            </div>

            <!-- Job Vacancies -->
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-xl rounded-xl p-6">
                <h3 class="text-lg font-semibold text-gray-900 dark:text-white mb-4">{{ __('Job Vacancies') }} ({{ $company->jobVacansies->count() }})</h3>
                @if($company->jobVacansies->count() > 0)
                <div class="space-y-3">
                    @foreach($company->jobVacansies as $job)
                    <div class="p-4 bg-gray-50 dark:bg-gray-700 rounded-lg">
                        <h4 class="font-medium text-gray-900 dark:text-white">{{ $job->title }}</h4>
                        <p class="text-sm text-gray-600 dark:text-gray-400 mt-1">{{ $job->location }}</p>
                    </div>
                    @endforeach
                </div>
                @else
                <p class="text-gray-500 dark:text-gray-400">{{ __('No job vacancies posted yet.') }}</p>
                @endif
            </div>
        </div>
    </div>
</x-app-layout>