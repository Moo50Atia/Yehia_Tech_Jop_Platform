<x-app-layout>
    <x-slot name="header">
        <div class="flex items-center justify-between">
            <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">{{ __('Resumes') }}</h2>
            <a href="{{ route('resume.create') }}" class="inline-flex items-center px-4 py-2 bg-indigo-600 border border-transparent rounded-lg font-semibold text-xs text-white uppercase tracking-widest hover:bg-indigo-700 transition">{{ __('Add Resume') }}</a>
        </div>
    </x-slot>
    <div class="py-8">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            @if (session('success'))<div class="mb-6 bg-green-100 dark:bg-green-900/30 border border-green-400 text-green-700 dark:text-green-400 px-4 py-3 rounded-lg">{{ session('success') }}</div>@endif
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                @forelse ($resumes as $resume)
                <div class="bg-white dark:bg-gray-800 rounded-xl shadow-lg p-6 hover:shadow-xl transition">
                    <h3 class="text-lg font-semibold text-gray-900 dark:text-white mb-2">{{ $resume->user->name ?? 'N/A' }}</h3>
                    <p class="text-sm text-gray-600 dark:text-gray-400 mb-4">{{ Str::limit($resume->resume_content, 100) }}</p>
                    <div class="flex justify-end space-x-2">
                        <a href="{{ route('resume.show', $resume->id) }}" class="text-indigo-600 hover:text-indigo-900">View</a>
                        <a href="{{ route('resume.edit', $resume->id) }}" class="text-yellow-600 hover:text-yellow-900">Edit</a>
                        <form action="{{ route('resume.destroy', $resume->id) }}" method="POST" class="inline" onsubmit="return confirm('Are you sure?');">@csrf @method('DELETE')<button type="submit" class="text-red-600 hover:text-red-900">Delete</button></form>
                    </div>
                </div>
                @empty
                <div class="col-span-full text-center py-12">
                    <p class="text-gray-500 dark:text-gray-400">No resumes found.</p>
                </div>
                @endforelse
            </div>
            @if($resumes->hasPages())<div class="mt-6">{{ $resumes->links() }}</div>@endif
        </div>
    </div>
</x-app-layout>