<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">{{ __('Edit Application') }}</h2>
    </x-slot>
    <div class="py-8">
        <div class="max-w-2xl mx-auto px-4">
            <div class="bg-white dark:bg-gray-800 shadow-xl rounded-xl p-6">
                <form action="{{ route('application.update', $application->id) }}" method="POST" class="space-y-6">
                    @csrf @method('PUT')
                    <div>
                        <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">{{ __('Job Vacancy') }} *</label>
                        <select name="job_vacansy_id" required class="block w-full rounded-lg border-gray-300 dark:border-gray-600 dark:bg-gray-700 dark:text-white focus:border-indigo-500 focus:ring-indigo-500">
                            @foreach($jobVacancies as $job)
                            <option value="{{ $job->id }}" {{ $application->job_vacansy_id == $job->id ? 'selected' : '' }}>{{ $job->title }}</option>
                            @endforeach
                        </select>
                        @error('job_vacansy_id')<p class="mt-1 text-sm text-red-600">{{ $message }}</p>@enderror
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">{{ __('User') }} *</label>
                        <select name="user_id" required class="block w-full rounded-lg border-gray-300 dark:border-gray-600 dark:bg-gray-700 dark:text-white focus:border-indigo-500 focus:ring-indigo-500">
                            @foreach($users as $user)
                            <option value="{{ $user->id }}" {{ $application->user_id == $user->id ? 'selected' : '' }}>{{ $user->name }}</option>
                            @endforeach
                        </select>
                        @error('user_id')<p class="mt-1 text-sm text-red-600">{{ $message }}</p>@enderror
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">{{ __('Resume') }} *</label>
                        <select name="resume_id" required class="block w-full rounded-lg border-gray-300 dark:border-gray-600 dark:bg-gray-700 dark:text-white focus:border-indigo-500 focus:ring-indigo-500">
                            @foreach($resumes as $resume)
                            <option value="{{ $resume->id }}" {{ $application->resume_id == $resume->id ? 'selected' : '' }}>Resume #{{ $resume->id }}</option>
                            @endforeach
                        </select>
                        @error('resume_id')<p class="mt-1 text-sm text-red-600">{{ $message }}</p>@enderror
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">{{ __('Status') }} *</label>
                        <select name="status" required class="block w-full rounded-lg border-gray-300 dark:border-gray-600 dark:bg-gray-700 dark:text-white focus:border-indigo-500 focus:ring-indigo-500">
                            <option value="pending" {{ $application->status == 'pending' ? 'selected' : '' }}>{{ __('Pending') }}</option>
                            <option value="reviewed" {{ $application->status == 'reviewed' ? 'selected' : '' }}>{{ __('Reviewed') }}</option>
                            <option value="accepted" {{ $application->status == 'accepted' ? 'selected' : '' }}>{{ __('Accepted') }}</option>
                            <option value="rejected" {{ $application->status == 'rejected' ? 'selected' : '' }}>{{ __('Rejected') }}</option>
                        </select>
                        @error('status')<p class="mt-1 text-sm text-red-600">{{ $message }}</p>@enderror
                    </div>
                    <div class="flex justify-end space-x-3 pt-4 border-t border-gray-200 dark:border-gray-700">
                        <a href="{{ route('application.index') }}" class="px-4 py-2 bg-gray-300 dark:bg-gray-600 rounded-lg text-xs font-semibold text-gray-700 dark:text-gray-200 uppercase hover:bg-gray-400 transition">{{ __('Cancel') }}</a>
                        <button type="submit" class="px-4 py-2 bg-indigo-600 rounded-lg text-xs font-semibold text-white uppercase hover:bg-indigo-700 transition">{{ __('Update') }}</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>