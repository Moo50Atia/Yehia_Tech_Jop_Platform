<x-app-layout>
    <x-slot name="header">
        <div class="flex items-center justify-between">
            <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
                {{ __('My Resumes') }}
            </h2>
            <a href="{{ route('seeker.resume.upload') }}" class="inline-flex items-center px-4 py-2 bg-indigo-600 dark:bg-indigo-500 border border-transparent rounded-lg font-semibold text-xs text-white uppercase tracking-widest hover:bg-indigo-700 dark:hover:bg-indigo-600 transition">
                <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"></path>
                </svg>
                {{ __('Upload New Resume') }}
            </a>
        </div>
    </x-slot>

    <style>
        @keyframes fadeInUp {
            from {
                opacity: 0;
                transform: translateY(20px);
            }

            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        .animate-fade-in-up {
            animation: fadeInUp 0.6s ease-out forwards;
        }
    </style>

    <div class="py-8">
        <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8">
            <!-- Success Message -->
            @if (session('success'))
            <div class="mb-6 p-4 bg-green-50 dark:bg-green-900/20 border border-green-200 dark:border-green-800 rounded-xl animate-fade-in-up">
                <div class="flex items-center">
                    <svg class="w-5 h-5 text-green-500 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                    </svg>
                    <span class="text-green-700 dark:text-green-400 font-semibold">{{ session('success') }}</span>
                </div>
            </div>
            @endif

            @if($resumes->count() > 0)
            <div class="bg-white dark:bg-gray-800 rounded-2xl shadow-xl overflow-hidden animate-fade-in-up">
                <div class="divide-y divide-gray-200 dark:divide-gray-700">
                    @foreach($resumes as $index => $resume)
                    <div class="p-6 flex items-center justify-between hover:bg-gray-50 dark:hover:bg-gray-700/50 transition animate-fade-in-up" style="animation-delay: {{ 0.1 * $index }}s; animation-fill-mode: forwards; opacity: 0;">
                        <div class="flex items-center">
                            <div class="w-12 h-12 bg-red-100 dark:bg-red-900/30 rounded-xl flex items-center justify-center mr-4">
                                <svg class="w-6 h-6 text-red-600 dark:text-red-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 21h10a2 2 0 002-2V9.414a1 1 0 00-.293-.707l-5.414-5.414A1 1 0 0012.586 3H7a2 2 0 00-2 2v14a2 2 0 002 2z"></path>
                                </svg>
                            </div>
                            <div>
                                <p class="font-semibold text-gray-900 dark:text-white">{{ $resume->filename }}</p>
                                <p class="text-sm text-gray-500 dark:text-gray-400">Uploaded {{ $resume->created_at->diffForHumans() }}</p>
                            </div>
                        </div>
                        <div class="flex items-center space-x-2">
                            <a href="{{ route('seeker.resume.download', $resume) }}"
                                class="inline-flex items-center px-4 py-2 bg-indigo-50 dark:bg-indigo-900/30 text-indigo-600 dark:text-indigo-400 rounded-lg font-medium hover:bg-indigo-100 dark:hover:bg-indigo-900/50 transition">
                                <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-4l-4 4m0 0l-4-4m4 4V4"></path>
                                </svg>
                                Download
                            </a>
                            <form method="POST" action="{{ route('seeker.resume.delete', $resume) }}" class="inline" onsubmit="return confirm('Are you sure you want to delete this resume?')">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="inline-flex items-center px-4 py-2 bg-red-50 dark:bg-red-900/30 text-red-600 dark:text-red-400 rounded-lg font-medium hover:bg-red-100 dark:hover:bg-red-900/50 transition">
                                    <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"></path>
                                    </svg>
                                    Delete
                                </button>
                            </form>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
            @else
            <!-- Empty State -->
            <div class="bg-white dark:bg-gray-800 rounded-2xl shadow-xl p-12 text-center animate-fade-in-up">
                <div class="inline-flex items-center justify-center w-16 h-16 bg-gray-100 dark:bg-gray-700 rounded-2xl mb-4">
                    <svg class="w-8 h-8 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path>
                    </svg>
                </div>
                <h3 class="text-lg font-semibold text-gray-900 dark:text-white mb-2">No Resumes Yet</h3>
                <p class="text-gray-500 dark:text-gray-400 mb-6">Upload your first resume to start applying for jobs.</p>
                <a href="{{ route('seeker.resume.upload') }}" class="inline-flex items-center px-6 py-3 bg-gradient-to-r from-indigo-600 to-purple-600 text-white font-semibold rounded-xl hover:from-indigo-700 hover:to-purple-700 transition-all shadow-lg hover:shadow-xl">
                    <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-8l-4-4m0 0L8 8m4-4v12"></path>
                    </svg>
                    Upload Resume
                </a>
            </div>
            @endif
        </div>
    </div>
</x-app-layout>