<x-app-layout>
    <x-slot name="header">
        <div class="flex items-center">
            <a href="{{ route('seeker.dashboard') }}" class="mr-4 p-2 rounded-lg hover:bg-gray-100 dark:hover:bg-gray-700 transition-colors">
                <svg class="w-5 h-5 text-gray-600 dark:text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"></path>
                </svg>
            </a>
            <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
                {{ __('Apply for Position') }}
            </h2>
        </div>
    </x-slot>

    <style>
        @keyframes slideInLeft {
            from {
                opacity: 0;
                transform: translateX(-30px);
            }

            to {
                opacity: 1;
                transform: translateX(0);
            }
        }

        @keyframes slideInRight {
            from {
                opacity: 0;
                transform: translateX(30px);
            }

            to {
                opacity: 1;
                transform: translateX(0);
            }
        }

        @keyframes fadeIn {
            from {
                opacity: 0;
            }

            to {
                opacity: 1;
            }
        }

        .animate-slide-in-left {
            animation: slideInLeft 0.6s ease-out forwards;
        }

        .animate-slide-in-right {
            animation: slideInRight 0.6s ease-out forwards;
        }

        .animate-fade-in {
            animation: fadeIn 0.5s ease-out forwards;
        }
    </style>

    <div class="py-8">
        <div class="max-w-5xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="grid grid-cols-1 lg:grid-cols-5 gap-8">
                <!-- Vacancy Details (Left Side) -->
                <div class="lg:col-span-2 animate-slide-in-left opacity-0" style="animation-fill-mode: forwards;">
                    <div class="bg-white dark:bg-gray-800 rounded-2xl shadow-xl overflow-hidden sticky top-8">
                        <!-- Company Header -->
                        <div class="bg-gradient-to-r from-indigo-600 to-purple-600 p-6">
                            <div class="flex items-center">
                                <div class="w-16 h-16 bg-white/20 rounded-xl flex items-center justify-center text-white font-bold text-2xl backdrop-blur-sm">
                                    {{ substr($vacancy->company->name ?? 'C', 0, 1) }}
                                </div>
                                <div class="ml-4">
                                    <h2 class="text-xl font-bold text-white">{{ $vacancy->title }}</h2>
                                    <p class="text-indigo-100">{{ $vacancy->company->name ?? 'Unknown Company' }}</p>
                                </div>
                            </div>
                        </div>

                        <div class="p-6 space-y-4">
                            <!-- Job Details -->
                            <div class="space-y-3">
                                <div class="flex items-center text-gray-600 dark:text-gray-400">
                                    <svg class="w-5 h-5 mr-3 text-indigo-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"></path>
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"></path>
                                    </svg>
                                    <span>{{ $vacancy->location ?? 'Location not specified' }}</span>
                                </div>
                                <div class="flex items-center text-gray-600 dark:text-gray-400">
                                    <svg class="w-5 h-5 mr-3 text-green-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                    </svg>
                                    <span>{{ $vacancy->salary ? '$' . number_format($vacancy->salary) . '/year' : 'Salary negotiable' }}</span>
                                </div>
                                <div class="flex items-center text-gray-600 dark:text-gray-400">
                                    <svg class="w-5 h-5 mr-3 text-purple-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 13.255A23.931 23.931 0 0112 15c-3.183 0-6.22-.62-9-1.745M16 6V4a2 2 0 00-2-2h-4a2 2 0 00-2 2v2m4 6h.01M5 20h14a2 2 0 002-2V8a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path>
                                    </svg>
                                    <span class="capitalize">{{ $vacancy->type }}</span>
                                </div>
                                @if($vacancy->jobCategory)
                                <div class="flex items-center text-gray-600 dark:text-gray-400">
                                    <svg class="w-5 h-5 mr-3 text-orange-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 7h.01M7 3h5c.512 0 1.024.195 1.414.586l7 7a2 2 0 010 2.828l-7 7a2 2 0 01-2.828 0l-7-7A1.994 1.994 0 013 12V7a4 4 0 014-4z"></path>
                                    </svg>
                                    <span>{{ $vacancy->jobCategory->name }}</span>
                                </div>
                                @endif
                            </div>

                            <!-- Description -->
                            @if($vacancy->description)
                            <div class="pt-4 border-t border-gray-200 dark:border-gray-700">
                                <h4 class="font-semibold text-gray-900 dark:text-white mb-2">Description</h4>
                                <p class="text-sm text-gray-600 dark:text-gray-400 leading-relaxed">{{ Str::limit($vacancy->description, 200) }}</p>
                            </div>
                            @endif
                        </div>
                    </div>
                </div>

                <!-- Application Form (Right Side) -->
                <div class="lg:col-span-3 animate-slide-in-right opacity-0" style="animation-delay: 0.2s; animation-fill-mode: forwards;">
                    <div class="bg-white dark:bg-gray-800 rounded-2xl shadow-xl p-8">
                        <h3 class="text-xl font-bold text-gray-900 dark:text-white mb-6">Submit Your Application</h3>

                        <form action="{{ route('seeker.apply.store', $vacancy->id) }}" method="POST" class="space-y-6">
                            @csrf

                            <!-- Resume Selection -->
                            <div>
                                <label for="resume_id" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">
                                    Select Resume (Optional)
                                </label>
                                @if($resumes->count() > 0)
                                <select name="resume_id" id="resume_id"
                                    class="block w-full py-3 px-4 rounded-xl border-gray-300 dark:border-gray-600 dark:bg-gray-700 dark:text-white focus:border-indigo-500 focus:ring-indigo-500 transition-all">
                                    <option value="">-- No Resume --</option>
                                    @foreach($resumes as $resume)
                                    <option value="{{ $resume->id }}">{{ $resume->title ?? 'Resume - ' . $resume->created_at->format('M d, Y') }}</option>
                                    @endforeach
                                </select>
                                @else
                                <div class="p-4 bg-yellow-50 dark:bg-yellow-900/20 border border-yellow-200 dark:border-yellow-800 rounded-xl">
                                    <div class="flex">
                                        <svg class="w-5 h-5 text-yellow-600 dark:text-yellow-400 mr-2" fill="currentColor" viewBox="0 0 20 20">
                                            <path fill-rule="evenodd" d="M8.257 3.099c.765-1.36 2.722-1.36 3.486 0l5.58 9.92c.75 1.334-.213 2.98-1.742 2.98H4.42c-1.53 0-2.493-1.646-1.743-2.98l5.58-9.92zM11 13a1 1 0 11-2 0 1 1 0 012 0zm-1-8a1 1 0 00-1 1v3a1 1 0 002 0V6a1 1 0 00-1-1z" clip-rule="evenodd" />
                                        </svg>
                                        <div>
                                            <p class="text-sm text-yellow-700 dark:text-yellow-300">No resumes found.</p>
                                            <a href="{{ route('seeker.resumes') }}" class="text-sm font-medium text-yellow-700 dark:text-yellow-300 underline hover:no-underline">
                                                Create your first resume →
                                            </a>
                                        </div>
                                    </div>
                                </div>
                                @endif
                                @error('resume_id')
                                <p class="mt-2 text-sm text-red-600 dark:text-red-400">{{ $message }}</p>
                                @enderror
                            </div>

                            <!-- Cover Letter -->
                            <div>
                                <label for="cover_letter" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">
                                    Cover Letter (Optional)
                                </label>
                                <textarea name="cover_letter" id="cover_letter" rows="6"
                                    class="block w-full py-3 px-4 rounded-xl border-gray-300 dark:border-gray-600 dark:bg-gray-700 dark:text-white focus:border-indigo-500 focus:ring-indigo-500 transition-all"
                                    placeholder="Write a brief introduction about yourself and why you're a great fit for this position...">{{ old('cover_letter') }}</textarea>
                                @error('cover_letter')
                                <p class="mt-2 text-sm text-red-600 dark:text-red-400">{{ $message }}</p>
                                @enderror
                            </div>

                            <!-- Submit Button -->
                            <div class="flex items-center justify-between pt-4 border-t border-gray-200 dark:border-gray-700">
                                <a href="{{ route('seeker.dashboard') }}" class="text-gray-600 dark:text-gray-400 hover:text-gray-900 dark:hover:text-white transition-colors">
                                    ← Back to Jobs
                                </a>
                                <button type="submit" class="px-8 py-3 bg-gradient-to-r from-indigo-600 to-purple-600 text-white font-semibold rounded-xl hover:from-indigo-700 hover:to-purple-700 transition-all shadow-lg hover:shadow-xl transform hover:scale-105">
                                    <svg class="w-5 h-5 inline mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 19l9 2-9-18-9 18 9-2zm0 0v-8"></path>
                                    </svg>
                                    Submit Application
                                </button>
                            </div>
                        </form>
                    </div>

                    <!-- Info Message -->
                    <div class="mt-6 bg-blue-50 dark:bg-blue-900/20 border border-blue-200 dark:border-blue-800 rounded-xl p-4 animate-fade-in opacity-0" style="animation-delay: 0.4s; animation-fill-mode: forwards;">
                        <div class="flex">
                            <svg class="w-5 h-5 text-blue-600 dark:text-blue-400 mr-3 mt-0.5" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z" clip-rule="evenodd" />
                            </svg>
                            <div>
                                <p class="text-sm text-blue-700 dark:text-blue-300">
                                    Your application will be reviewed by the company. You'll be able to track its status in your <strong>My Applications</strong> page.
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>