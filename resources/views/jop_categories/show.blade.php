<x-app-layout>
    <x-slot name="header">
        <div class="flex items-center justify-between">
            <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
                {{ $category->name }}
            </h2>
            <div class="flex space-x-2">
                <a href="{{ route('admin.categories.edit', $category->id) }}" class="inline-flex items-center px-4 py-2 bg-yellow-600 dark:bg-yellow-500 border border-transparent rounded-lg font-semibold text-xs text-white uppercase tracking-widest hover:bg-yellow-700 dark:hover:bg-yellow-600 transition">
                    <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"></path>
                    </svg>
                    {{ __('Edit') }}
                </a>
                <a href="{{ route('admin.categories.index') }}" class="inline-flex items-center px-4 py-2 bg-gray-600 dark:bg-gray-500 border border-transparent rounded-lg font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 dark:hover:bg-gray-600 transition">
                    <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"></path>
                    </svg>
                    {{ __('Back') }}
                </a>
            </div>
        </div>
    </x-slot>

    <div class="py-8">
        <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 space-y-6">
            <!-- Category Details -->
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-xl rounded-xl p-6">
                <div class="flex items-center mb-6">
                    <div class="w-16 h-16 bg-gradient-to-br from-indigo-600 to-purple-600 dark:from-indigo-500 dark:to-purple-500 rounded-xl flex items-center justify-center shadow-lg">
                        <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 7h.01M7 3h5c.512 0 1.024.195 1.414.586l7 7a2 2 0 010 2.828l-7 7a2 2 0 01-2.828 0l-7-7A1.994 1.994 0 013 12V7a4 4 0 014-4z"></path>
                        </svg>
                    </div>
                    <div class="ml-4">
                        <h3 class="text-2xl font-bold text-gray-900 dark:text-white">{{ $category->name }}</h3>
                        <p class="text-sm text-gray-500 dark:text-gray-400">Job Category</p>
                    </div>
                </div>

                <dl class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <div>
                        <dt class="text-sm font-medium text-gray-500 dark:text-gray-400">{{ __('Category Name') }}</dt>
                        <dd class="mt-1 text-sm text-gray-900 dark:text-white">{{ $category->name }}</dd>
                    </div>
                    <div>
                        <dt class="text-sm font-medium text-gray-500 dark:text-gray-400">{{ __('Total Jobs') }}</dt>
                        <dd class="mt-1 text-sm text-gray-900 dark:text-white">{{ $category->jobVacansies->count() ?? 0 }} positions</dd>
                    </div>
                    <div>
                        <dt class="text-sm font-medium text-gray-500 dark:text-gray-400">{{ __('Created') }}</dt>
                        <dd class="mt-1 text-sm text-gray-900 dark:text-white">{{ $category->created_at->format('F d, Y') }}</dd>
                    </div>
                    <div>
                        <dt class="text-sm font-medium text-gray-500 dark:text-gray-400">{{ __('Last Updated') }}</dt>
                        <dd class="mt-1 text-sm text-gray-900 dark:text-white">{{ $category->updated_at->format('F d, Y') }}</dd>
                    </div>
                </dl>
            </div>

            <!-- Related Job Vacancies -->
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-xl rounded-xl p-6">
                <h3 class="text-lg font-semibold text-gray-900 dark:text-white mb-4">{{ __('Jobs in this Category') }} ({{ $category->jobVacansies->count() }})</h3>
                <div class="space-y-3">
                    @forelse($category->jobVacansies as $vacancy)
                    <div class="p-4 bg-gray-50 dark:bg-gray-700 rounded-lg hover:bg-gray-100 dark:hover:bg-gray-600 transition">
                        <div class="flex items-center justify-between">
                            <div class="flex-1">
                                <h4 class="font-medium text-gray-900 dark:text-white">{{ $vacancy->title }}</h4>
                                <p class="text-sm text-gray-600 dark:text-gray-400 mt-1">
                                    <svg class="w-4 h-4 inline mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"></path>
                                    </svg>
                                    {{ $vacancy->company->name ?? 'N/A' }} • {{ $vacancy->location ?? 'Remote' }}
                                </p>
                                <div class="flex items-center mt-2 space-x-2">
                                    <span class="px-2 py-1 text-xs font-medium bg-blue-100 dark:bg-blue-900/30 text-blue-800 dark:text-blue-400 rounded">{{ ucfirst($vacancy->type) }}</span>
                                    @if($vacancy->salary)
                                    <span class="px-2 py-1 text-xs font-medium bg-green-100 dark:bg-green-900/30 text-green-800 dark:text-green-400 rounded">${{ number_format($vacancy->salary) }}/year</span>
                                    @endif
                                </div>
                            </div>
                            <a href="{{ route('admin.vacansies.show', $vacancy->id) }}" class="ml-4 text-indigo-600 dark:text-indigo-400 hover:text-indigo-900 dark:hover:text-indigo-300">
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
                                </svg>
                            </a>
                        </div>
                    </div>
                    @empty
                    <div class="text-center py-8">
                        <svg class="w-12 h-12 text-gray-400 dark:text-gray-600 mx-auto mb-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 13.255A23.931 23.931 0 0112 15c-3.183 0-6.22-.62-9-1.745M16 6V4a2 2 0 00-2-2h-4a2 2 0 00-2 2v2m4 6h.01M5 20h14a2 2 0 002-2V8a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path>
                        </svg>
                        <p class="text-gray-500 dark:text-gray-400">{{ __('No jobs in this category yet') }}</p>
                    </div>
                    @endforelse
                </div>
            </div>

            <!-- Actions -->
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-xl rounded-xl p-6">
                <div class="flex justify-end space-x-3">
                    <a href="{{ route('admin.categories.edit', $category->id) }}" class="inline-flex items-center px-4 py-2 bg-yellow-600 dark:bg-yellow-500 border border-transparent rounded-lg font-semibold text-xs text-white uppercase tracking-widest hover:bg-yellow-700 dark:hover:bg-yellow-600 transition">
                        {{ __('Edit Category') }}
                    </a>
                    <form action="{{ route('admin.categories.destroy', $category->id) }}" method="POST" class="inline" onsubmit="return confirm('Are you sure you want to delete this category?');">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="inline-flex items-center px-4 py-2 bg-red-600 dark:bg-red-500 border border-transparent rounded-lg font-semibold text-xs text-white uppercase tracking-widest hover:bg-red-700 dark:hover:bg-red-600 transition">
                            {{ __('Delete Category') }}
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>