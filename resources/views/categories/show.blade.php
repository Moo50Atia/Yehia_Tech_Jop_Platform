<x-app-layout>
    <x-slot name="header">
        <div class="flex items-center justify-between">
            <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">{{ $category->name }}</h2>
            <div class="flex space-x-2">
                <a href="{{ route('admin.categories.edit', $category->id) }}" class="inline-flex items-center px-4 py-2 bg-yellow-600 border border-transparent rounded-lg font-semibold text-xs text-white uppercase tracking-widest hover:bg-yellow-700 transition">{{ __('Edit') }}</a>
                <a href="{{ route('admin.categories.index') }}" class="inline-flex items-center px-4 py-2 bg-gray-600 border border-transparent rounded-lg font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 transition">{{ __('Back') }}</a>
            </div>
        </div>
    </x-slot>

    <div class="py-8">
        <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 space-y-6">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-xl rounded-xl p-6">
                <h3 class="text-lg font-semibold text-gray-900 dark:text-white mb-4">{{ __('Category Information') }}</h3>
                <dl class="space-y-4">
                    <div>
                        <dt class="text-sm font-medium text-gray-500 dark:text-gray-400">{{ __('Name') }}</dt>
                        <dd class="mt-1 text-sm text-gray-900 dark:text-white">{{ $category->name }}</dd>
                    </div>
                    @if($category->description)
                    <div>
                        <dt class="text-sm font-medium text-gray-500 dark:text-gray-400">{{ __('Description') }}</dt>
                        <dd class="mt-1 text-sm text-gray-900 dark:text-white">{{ $category->description }}</dd>
                    </div>
                    @endif
                </dl>
            </div>

            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-xl rounded-xl p-6">
                <h3 class="text-lg font-semibold text-gray-900 dark:text-white mb-4">{{ __('Job Vacancies') }} ({{ $category->jobVacansies->count() }})</h3>
                @if($category->jobVacansies->count() > 0)
                <div class="space-y-3">
                    @foreach($category->jobVacansies as $job)
                    <div class="p-4 bg-gray-50 dark:bg-gray-700 rounded-lg">
                        <h4 class="font-medium text-gray-900 dark:text-white">{{ $job->title }}</h4>
                        <p class="text-sm text-gray-600 dark:text-gray-400 mt-1">{{ $job->company->name ?? 'N/A' }} - {{ $job->location }}</p>
                    </div>
                    @endforeach
                </div>
                @else
                <p class="text-gray-500 dark:text-gray-400">{{ __('No job vacancies in this category yet.') }}</p>
                @endif
            </div>
        </div>
    </div>
</x-app-layout>