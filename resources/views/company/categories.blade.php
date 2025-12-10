<x-app-layout>
    <x-slot name="header">
        <div class="flex items-center justify-between">
            <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
                {{ __('Job Categories') }}
            </h2>
        </div>
    </x-slot>

    <div class="py-8">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            {{-- Attention: categories relationship - Need to get categories that have vacancies from this company: Auth::user()->company->vacancies->pluck('category_id')->unique() then get those categories --}}

            <!-- Categories Grid -->
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                @foreach ($categoriesStats as $categoryName => $category)
                <div class="bg-white dark:bg-gray-800 rounded-xl shadow-lg overflow-hidden hover:shadow-xl transition-shadow duration-300">
                    <div class="p-6 border-b border-gray-200 dark:border-gray-700 bg-gradient-to-r from-blue-50 to-indigo-50 dark:from-blue-900/20 dark:to-indigo-900/20">
                        <div class="flex items-center justify-between">
                            <div class="flex items-center space-x-3">
                                <div>
                                    <h3 class="text-lg font-semibold text-gray-900 dark:text-white">{{ $categoryName }}</h3>
                                    <p class="text-sm text-gray-500 dark:text-gray-400">{{ $category['count'] }} vacancies</p>
                                </div>
                            </div>
                        </div>
                    </div>

                    {{-- Attention: vacancies relationship - Need to get vacancies for this category: category->vacancies->where('company_id', Auth::user()->company->id) --}}
                    <div class="p-6">
                        <div class="space-y-4">
                            @foreach ($category['vacancies'] as $vacancy)
                            <div class="p-4 bg-gray-50 dark:bg-gray-700/50 rounded-lg hover:bg-gray-100 dark:hover:bg-gray-700 transition-colors duration-200">
                                <div class="flex items-start justify-between mb-2">
                                    <h4 class="text-sm font-semibold text-gray-900 dark:text-white">{{ $vacancy->title }}</h4>
                                    <span class="inline-flex items-center px-2 py-1 rounded-full text-xs font-medium bg-green-100 text-green-800 dark:bg-green-900/30 dark:text-green-400">
                                        {{$vacancy->status}}
                                    </span>
                                </div>
                                <p class="text-xs text-gray-600 dark:text-gray-400 mb-3 line-clamp-2">
                                    {{ $vacancy->description }}
                                </p>
                                <div class="flex items-center justify-between">
                                    <span class="text-xs text-gray-500 dark:text-gray-400">{{ $vacancy->vacanciesCount }} applications</span>
                                    <a href="{{ route('admin.vacansies.show', $vacancy->id) }}" class="text-xs font-medium text-indigo-600 dark:text-indigo-400 hover:text-indigo-700 dark:hover:text-indigo-300">
                                        View Details →
                                    </a>
                                </div>
                            </div>
                            @endforeach
                        </div>
                    </div>
                </div>
                @endforeach
                <!-- ///////////// -->
            </div>
        </div>
    </div>
</x-app-layout>