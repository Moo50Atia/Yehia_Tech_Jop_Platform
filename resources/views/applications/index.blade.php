<x-app-layout>
    <x-slot name="header">
        <div class="flex items-center justify-between">
            <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">{{ __('Applications') }}</h2>
            <a href="{{ route('application.create') }}" class="inline-flex items-center px-4 py-2 bg-indigo-600 border border-transparent rounded-lg font-semibold text-xs text-white uppercase tracking-widest hover:bg-indigo-700 transition">{{ __('New Application') }}</a>
        </div>
    </x-slot>
    <div class="py-8">
        <div class="mx-auto px-4 sm:px-6 lg:px-8">
            @if (session('success'))
            <div class="mb-6 bg-green-100 dark:bg-green-900/30 border border-green-400 text-green-700 dark:text-green-400 px-4 py-3 rounded-lg">{{ session('success') }}</div>
            @endif
            <div class="bg-white dark:bg-gray-800 shadow-xl rounded-xl overflow-hidden">
                <table class="min-w-full divide-y divide-gray-200 dark:divide-gray-700">
                    <thead class="bg-gray-50 dark:bg-gray-700">
                        <tr>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-300 uppercase">Job</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-300 uppercase">Applicant</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-300 uppercase">Status</th>
                            <th class="px-6 py-3 text-right text-xs font-medium text-gray-500 dark:text-gray-300 uppercase">Actions</th>
                        </tr>
                    </thead>
                    <tbody class="bg-white dark:bg-gray-800 divide-y divide-gray-200 dark:divide-gray-700">
                        @forelse ($applications as $app)
                        <tr class="hover:bg-gray-50 dark:hover:bg-gray-700">
                            <td class="px-6 py-4 text-sm text-gray-900 dark:text-white">{{ $app->jobVacansy->title ?? 'N/A' }}</td>
                            <td class="px-6 py-4 text-sm text-gray-900 dark:text-white">{{ $app->user->name ?? 'N/A' }}</td>
                            <td class="px-6 py-4"><span class="px-2 py-1 text-xs font-semibold rounded-full bg-blue-100 dark:bg-blue-900/30 text-blue-800 dark:text-blue-400">{{ ucfirst($app->status) }}</span></td>
                            <td class="px-6 py-4 text-right space-x-2">
                                <a href="{{ route('application.show', $app->id) }}" class="text-indigo-600 hover:text-indigo-900">View</a>
                                <a href="{{ route('application.edit', $app->id) }}" class="text-yellow-600 hover:text-yellow-900">Edit</a>
                                <form action="{{ route('application.destroy', $app->id) }}" method="POST" class="inline" onsubmit="return confirm('Are you sure?');">@csrf @method('DELETE')<button type="submit" class="text-red-600 hover:text-red-900">Delete</button></form>
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="4" class="px-6 py-12 text-center text-gray-500 dark:text-gray-400">No applications found.</td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
            @if($applications->hasPages())
            <div class="mt-6">{{ $applications->links() }}</div>
            @endif
        </div>
    </div>
</x-app-layout>