<x-app-layout>
    <x-slot name="header">
        <div class="flex items-center justify-between">
            <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
                {{ $vacansy->title }}
            </h2>
            <div class="flex space-x-2">
                <a href="{{ route('admin.vacansies.edit', $vacansy->id) }}" class="inline-flex items-center px-4 py-2 bg-yellow-600 dark:bg-yellow-500 border border-transparent rounded-lg font-semibold text-xs text-white uppercase tracking-widest hover:bg-yellow-700 dark:hover:bg-yellow-600 transition">
                    {{ __('Edit') }}
                </a>
                <a href="{{ route('admin.vacansies.index') }}" class="inline-flex items-center px-4 py-2 bg-gray-600 dark:bg-gray-500 border border-transparent rounded-lg font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 dark:hover:bg-gray-600 transition">
                    {{ __('Back') }}
                </a>
            </div>
        </div>
    </x-slot>

    <div class="py-8">
        <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-xl rounded-xl p-6">
                <!-- Job Icon and Title -->
                <div class="flex items-center mb-6">
                    <div class="p-4 bg-indigo-100 dark:bg-indigo-900/30 rounded-lg">
                        <svg class="w-12 h-12 text-indigo-600 dark:text-indigo-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 13.255A23.931 23.931 0 0112 15c-3.183 0-6.22-.62-9-1.745M16 6V4a2 2 0 00-2-2h-4a2 2 0 00-2 2v2m4 6h.01M5 20h14a2 2 0 002-2V8a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path>
                        </svg>
                    </div>
                    <div class="ml-4">
                        <h3 class="text-2xl font-bold text-gray-900 dark:text-white">{{ $vacansy->title }}</h3>
                        <p class="text-sm text-gray-500 dark:text-gray-400">{{ $vacansy->company->name ?? 'N/A' }}</p>
                    </div>
                </div>

                <!-- Job Details -->
                <div class="border-t border-gray-200 dark:border-gray-700 pt-6">
                    <dl class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <div>
                            <dt class="text-sm font-medium text-gray-500 dark:text-gray-400">{{ __('Location') }}</dt>
                            <dd class="mt-1 text-sm text-gray-900 dark:text-white">{{ $vacansy->location ?? 'N/A' }}</dd>
                        </div>
                        <div>
                            <dt class="text-sm font-medium text-gray-500 dark:text-gray-400">{{ __('Type') }}</dt>
                            <dd class="mt-1 text-sm text-gray-900 dark:text-white">{{ ucfirst($vacansy->type) }}</dd>
                        </div>
                        <div>
                            <dt class="text-sm font-medium text-gray-500 dark:text-gray-400">{{ __('Salary') }}</dt>
                            <dd class="mt-1 text-sm text-gray-900 dark:text-white">
                                @if($vacansy->salary)
                                ${{ number_format($vacansy->salary) }}/year
                                @else
                                N/A
                                @endif
                            </dd>
                        </div>
                        <div>
                            <dt class="text-sm font-medium text-gray-500 dark:text-gray-400">{{ __('Category') }}</dt>
                            <dd class="mt-1 text-sm text-gray-900 dark:text-white">{{ $vacansy->jobCategory->name ?? 'N/A' }}</dd>
                        </div>
                        <div>
                            <dt class="text-sm font-medium text-gray-500 dark:text-gray-400">{{ __('Status') }}</dt>
                            <dd class="mt-1">
                                @if($vacansy->status === 'active')
                                <span class="px-3 py-1 inline-flex text-xs leading-5 font-semibold rounded-full bg-green-100 dark:bg-green-900/30 text-green-800 dark:text-green-400">
                                    {{ ucfirst($vacansy->status) }}
                                </span>
                                @elseif($vacansy->status === 'pending')
                                <span class="px-3 py-1 inline-flex text-xs leading-5 font-semibold rounded-full bg-yellow-100 dark:bg-yellow-900/30 text-yellow-800 dark:text-yellow-400">
                                    {{ ucfirst($vacansy->status) }}
                                </span>
                                @else
                                <span class="px-3 py-1 inline-flex text-xs leading-5 font-semibold rounded-full bg-red-100 dark:bg-red-900/30 text-red-800 dark:text-red-400">
                                    {{ ucfirst($vacansy->status) }}
                                </span>
                                @endif
                            </dd>
                        </div>
                        <div>
                            <dt class="text-sm font-medium text-gray-500 dark:text-gray-400">{{ __('Posted') }}</dt>
                            <dd class="mt-1 text-sm text-gray-900 dark:text-white">{{ $vacansy->created_at->format('M d, Y') }}</dd>
                        </div>
                        <div>
                            <dt class="text-sm font-medium text-gray-500 dark:text-gray-400">{{ __('Last Updated') }}</dt>
                            <dd class="mt-1 text-sm text-gray-900 dark:text-white">{{ $vacansy->updated_at->format('M d, Y') }}</dd>
                        </div>
                        @if($vacansy->note)
                        <div>
                            <dt class="text-sm font-medium text-gray-500 dark:text-gray-400">{{ __('Note') }}</dt>
                            <dd class="mt-1 text-sm text-gray-900 dark:text-white">{{ $vacansy->note }}</dd>
                        </div>
                        @endif
                        <div class="col-span-full">
                            <dt class="text-sm font-medium text-gray-500 dark:text-gray-400 mb-2">{{ __('Description') }}</dt>
                            <dd class="text-sm text-gray-900 dark:text-white prose dark:prose-invert max-w-none">
                                {!! nl2br(e($vacansy->description)) !!}
                            </dd>
                        </div>
                    </dl>
                </div>

                <!-- Actions -->
                <div class="mt-6 pt-6 border-t border-gray-200 dark:border-gray-700 flex justify-end space-x-3">
                    <a href="{{ route('admin.vacansies.edit', $vacansy->id) }}" class="inline-flex items-center px-4 py-2 bg-yellow-600 dark:bg-yellow-500 border border-transparent rounded-lg font-semibold text-xs text-white uppercase tracking-widest hover:bg-yellow-700 dark:hover:bg-yellow-600 transition">
                        {{ __('Edit Vacancy') }}
                    </a>
                    <form action="{{ route('admin.vacansies.destroy', $vacansy->id) }}" method="POST" class="inline" onsubmit="return confirm('Are you sure you want to delete this vacancy?');">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="inline-flex items-center px-4 py-2 bg-red-600 dark:bg-red-500 border border-transparent rounded-lg font-semibold text-xs text-white uppercase tracking-widest hover:bg-red-700 dark:hover:bg-red-600 transition">
                            {{ __('Delete Vacancy') }}
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>