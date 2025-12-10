<x-app-layout>
    <x-slot name="header">
        <div class="flex items-center justify-between">
            <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
                {{ __('Edit Application') }}
            </h2>
            <a href="{{ route('admin.applications.index') }}" class="inline-flex items-center px-4 py-2 bg-gray-600 dark:bg-gray-500 border border-transparent rounded-lg font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 dark:hover:bg-gray-600 transition">
                <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"></path>
                </svg>
                {{ __('Back') }}
            </a>
        </div>
    </x-slot>

    <div class="py-8">
        <div class="max-w-2xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-xl rounded-xl">
                <form action="{{ route('admin.applications.update', $application->id) }}" method="POST" class="p-6 space-y-6">
                    @csrf
                    @method('PUT')

                    <!-- User Selection -->
                    <div>
                        <label for="user_id" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">
                            {{ __('Applicant') }} <span class="text-red-500">*</span>
                        </label>
                        <select name="user_id" id="user_id" required
                            class="block w-full rounded-lg border-gray-300 dark:border-gray-600 dark:bg-gray-700 dark:text-white focus:border-indigo-500 dark:focus:border-indigo-400 focus:ring-indigo-500 dark:focus:ring-indigo-400 shadow-sm">
                            <option value="">Select Applicant</option>
                            @foreach($users as $user)
                            <option value="{{ $user->id }}" {{ old('user_id', $application->user_id) == $user->id ? 'selected' : '' }}>
                                {{ $user->name }} ({{ $user->email }})
                            </option>
                            @endforeach
                        </select>
                        @error('user_id')
                        <p class="mt-1 text-sm text-red-600 dark:text-red-400">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Job Vacancy Selection -->
                    <div>
                        <label for="job_vacansy_id" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">
                            {{ __('Job Vacancy') }} <span class="text-red-500">*</span>
                        </label>
                        <select name="job_vacansy_id" id="job_vacansy_id" required
                            class="block w-full rounded-lg border-gray-300 dark:border-gray-600 dark:bg-gray-700 dark:text-white focus:border-indigo-500 dark:focus:border-indigo-400 focus:ring-indigo-500 dark:focus:ring-indigo-400 shadow-sm">
                            <option value="">Select Job Vacancy</option>
                            @foreach($vacancies as $vacancy)
                            <option value="{{ $vacancy->id }}" {{ old('job_vacansy_id', $application->job_vacansy_id) == $vacancy->id ? 'selected' : '' }}>
                                {{ $vacancy->title }} - {{ $vacancy->company->name ?? 'N/A' }}
                            </option>
                            @endforeach
                        </select>
                        @error('job_vacansy_id')
                        <p class="mt-1 text-sm text-red-600 dark:text-red-400">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Resume Selection -->
                    <div>
                        <label for="resume_id" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">
                            {{ __('Resume') }} <span class="text-red-500">*</span>
                        </label>
                        <select name="resume_id" id="resume_id" required
                            class="block w-full rounded-lg border-gray-300 dark:border-gray-600 dark:bg-gray-700 dark:text-white focus:border-indigo-500 dark:focus:border-indigo-400 focus:ring-indigo-500 dark:focus:ring-indigo-400 shadow-sm">
                            <option value="">Select Resume</option>
                            @foreach($resumes as $resume)
                            <option value="{{ $resume->id }}" {{ old('resume_id', $application->resume_id) == $resume->id ? 'selected' : '' }}>
                                {{ $resume->title ?? 'Resume' }} - {{ $resume->user->name ?? 'Unknown' }}
                            </option>
                            @endforeach
                        </select>
                        @error('resume_id')
                        <p class="mt-1 text-sm text-red-600 dark:text-red-400">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Company Selection -->
                    <div>
                        <label for="company_id" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">
                            {{ __('Company') }} <span class="text-red-500">*</span>
                        </label>
                        <select name="company_id" id="company_id" required
                            class="block w-full rounded-lg border-gray-300 dark:border-gray-600 dark:bg-gray-700 dark:text-white focus:border-indigo-500 dark:focus:border-indigo-400 focus:ring-indigo-500 dark:focus:ring-indigo-400 shadow-sm">
                            <option value="">Select Company</option>
                            @foreach($companies as $company)
                            <option value="{{ $company->id }}" {{ old('company_id', $application->company_id) == $company->id ? 'selected' : '' }}>
                                {{ $company->name }}
                            </option>
                            @endforeach
                        </select>
                        @error('company_id')
                        <p class="mt-1 text-sm text-red-600 dark:text-red-400">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Status -->
                    <div>
                        <label for="status" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">
                            {{ __('Status') }}
                        </label>
                        <select name="status" id="status"
                            class="block w-full rounded-lg border-gray-300 dark:border-gray-600 dark:bg-gray-700 dark:text-white focus:border-indigo-500 dark:focus:border-indigo-400 focus:ring-indigo-500 dark:focus:ring-indigo-400 shadow-sm">
                            <option value="pending" {{ old('status', $application->status) == 'pending' ? 'selected' : '' }}>Pending</option>
                            <option value="accepted" {{ old('status', $application->status) == 'accepted' ? 'selected' : '' }}>Accepted</option>
                            <option value="rejected" {{ old('status', $application->status) == 'rejected' ? 'selected' : '' }}>Rejected</option>
                        </select>
                        @error('status')
                        <p class="mt-1 text-sm text-red-600 dark:text-red-400">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- AI Generated Score -->
                    <div>
                        <label for="aiGeneratedScore" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">
                            {{ __('AI Generated Score') }}
                        </label>
                        <input type="number" name="aiGeneratedScore" id="aiGeneratedScore" value="{{ old('aiGeneratedScore', $application->aiGeneratedScore) }}" min="0" max="100" step="0.1"
                            class="block w-full rounded-lg border-gray-300 dark:border-gray-600 dark:bg-gray-700 dark:text-white focus:border-indigo-500 dark:focus:border-indigo-400 focus:ring-indigo-500 dark:focus:ring-indigo-400 shadow-sm">
                        @error('aiGeneratedScore')
                        <p class="mt-1 text-sm text-red-600 dark:text-red-400">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- AI Generated Feedback -->
                    <div>
                        <label for="aiGeneratedFeedback" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">
                            {{ __('AI Generated Feedback') }}
                        </label>
                        <textarea name="aiGeneratedFeedback" id="aiGeneratedFeedback" rows="4"
                            class="block w-full rounded-lg border-gray-300 dark:border-gray-600 dark:bg-gray-700 dark:text-white focus:border-indigo-500 dark:focus:border-indigo-400 focus:ring-indigo-500 dark:focus:ring-indigo-400 shadow-sm">{{ old('aiGeneratedFeedback', $application->aiGeneratedFeedback) }}</textarea>
                        @error('aiGeneratedFeedback')
                        <p class="mt-1 text-sm text-red-600 dark:text-red-400">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Submit Button -->
                    <div class="flex items-center justify-end space-x-3 pt-4 border-t border-gray-200 dark:border-gray-700">
                        <a href="{{ route('admin.applications.index') }}" class="inline-flex items-center px-4 py-2 bg-gray-300 dark:bg-gray-600 border border-transparent rounded-lg font-semibold text-xs text-gray-700 dark:text-gray-200 uppercase tracking-widest hover:bg-gray-400 dark:hover:bg-gray-500 transition">
                            {{ __('Cancel') }}
                        </a>
                        <button type="submit" class="inline-flex items-center px-4 py-2 bg-indigo-600 dark:bg-indigo-500 border border-transparent rounded-lg font-semibold text-xs text-white uppercase tracking-widest hover:bg-indigo-700 dark:hover:bg-indigo-600 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 dark:focus:ring-offset-gray-800 transition">
                            <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                            </svg>
                            {{ __('Update Application') }}
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>