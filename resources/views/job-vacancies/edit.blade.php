<x-app-layout>
    <x-slot name="header">
        <div class="flex items-center justify-between">
            <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">{{ __('Edit Job Vacancy') }}</h2>
            <a href="{{ route('job-vacancy.index') }}" class="inline-flex items-center px-4 py-2 bg-gray-600 border border-transparent rounded-lg font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 transition">{{ __('Back') }}</a>
        </div>
    </x-slot>

    <div class="py-8">
        <div class="max-w-3xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 shadow-xl rounded-xl p-6">
                <form action="{{ route('job-vacancy.update', $jobVacancy->id) }}" method="POST" class="space-y-6">
                    @csrf
                    @method('PUT')

                    <div>
                        <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">{{ __('Title') }} *</label>
                        <input type="text" name="title" value="{{ old('title', $jobVacancy->title) }}" required class="block w-full rounded-lg border-gray-300 dark:border-gray-600 dark:bg-gray-700 dark:text-white focus:border-indigo-500 focus:ring-indigo-500">
                        @error('title')<p class="mt-1 text-sm text-red-600">{{ $message }}</p>@enderror
                    </div>

                    <div>
                        <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">{{ __('Description') }} *</label>
                        <textarea name="description" rows="4" required class="block w-full rounded-lg border-gray-300 dark:border-gray-600 dark:bg-gray-700 dark:text-white focus:border-indigo-500 focus:ring-indigo-500">{{ old('description', $jobVacancy->description) }}</textarea>
                        @error('description')<p class="mt-1 text-sm text-red-600">{{ $message }}</p>@enderror
                    </div>

                    <div>
                        <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">{{ __('Requirements') }} *</label>
                        <textarea name="requirements" rows="4" required class="block w-full rounded-lg border-gray-300 dark:border-gray-600 dark:bg-gray-700 dark:text-white focus:border-indigo-500 focus:ring-indigo-500">{{ old('requirements', $jobVacancy->requirements) }}</textarea>
                        @error('requirements')<p class="mt-1 text-sm text-red-600">{{ $message }}</p>@enderror
                    </div>

                    <div>
                        <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">{{ __('Location') }} *</label>
                        <input type="text" name="location" value="{{ old('location', $jobVacancy->location) }}" required class="block w-full rounded-lg border-gray-300 dark:border-gray-600 dark:bg-gray-700 dark:text-white focus:border-indigo-500 focus:ring-indigo-500">
                        @error('location')<p class="mt-1 text-sm text-red-600">{{ $message }}</p>@enderror
                    </div>

                    <div>
                        <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">{{ __('Salary Range') }}</label>
                        <input type="text" name="salary_range" value="{{ old('salary_range', $jobVacancy->salary_range) }}" class="block w-full rounded-lg border-gray-300 dark:border-gray-600 dark:bg-gray-700 dark:text-white focus:border-indigo-500 focus:ring-indigo-500">
                        @error('salary_range')<p class="mt-1 text-sm text-red-600">{{ $message }}</p>@enderror
                    </div>

                    <div>
                        <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">{{ __('Job Type') }} *</label>
                        <select name="job_type" required class="block w-full rounded-lg border-gray-300 dark:border-gray-600 dark:bg-gray-700 dark:text-white focus:border-indigo-500 focus:ring-indigo-500">
                            <option value="">{{ __('Select Type') }}</option>
                            <option value="full_time" {{ old('job_type', $jobVacancy->job_type) == 'full_time' ? 'selected' : '' }}>{{ __('Full Time') }}</option>
                            <option value="part_time" {{ old('job_type', $jobVacancy->job_type) == 'part_time' ? 'selected' : '' }}>{{ __('Part Time') }}</option>
                            <option value="contract" {{ old('job_type', $jobVacancy->job_type) == 'contract' ? 'selected' : '' }}>{{ __('Contract') }}</option>
                            <option value="internship" {{ old('job_type', $jobVacancy->job_type) == 'internship' ? 'selected' : '' }}>{{ __('Internship') }}</option>
                        </select>
                        @error('job_type')<p class="mt-1 text-sm text-red-600">{{ $message }}</p>@enderror
                    </div>

                    <div>
                        <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">{{ __('Company') }} *</label>
                        <select name="company_id" required class="block w-full rounded-lg border-gray-300 dark:border-gray-600 dark:bg-gray-700 dark:text-white focus:border-indigo-500 focus:ring-indigo-500">
                            <option value="">{{ __('Select Company') }}</option>
                            @foreach($companies as $company)
                            <option value="{{ $company->id }}" {{ old('company_id', $jobVacancy->company_id) == $company->id ? 'selected' : '' }}>{{ $company->name }}</option>
                            @endforeach
                        </select>
                        @error('company_id')<p class="mt-1 text-sm text-red-600">{{ $message }}</p>@enderror
                    </div>

                    <div>
                        <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">{{ __('Category') }} *</label>
                        <select name="job_category_id" required class="block w-full rounded-lg border-gray-300 dark:border-gray-600 dark:bg-gray-700 dark:text-white focus:border-indigo-500 focus:ring-indigo-500">
                            <option value="">{{ __('Select Category') }}</option>
                            @foreach($categories as $category)
                            <option value="{{ $category->id }}" {{ old('job_category_id', $jobVacancy->job_category_id) == $category->id ? 'selected' : '' }}>{{ $category->name }}</option>
                            @endforeach
                        </select>
                        @error('job_category_id')<p class="mt-1 text-sm text-red-600">{{ $message }}</p>@enderror
                    </div>

                    <div class="flex justify-end space-x-3 pt-4 border-t border-gray-200 dark:border-gray-700">
                        <a href="{{ route('job-vacancy.index') }}" class="px-4 py-2 bg-gray-300 dark:bg-gray-600 rounded-lg text-xs font-semibold text-gray-700 dark:text-gray-200 uppercase hover:bg-gray-400 transition">{{ __('Cancel') }}</a>
                        <button type="submit" class="px-4 py-2 bg-indigo-600 rounded-lg text-xs font-semibold text-white uppercase hover:bg-indigo-700 transition">{{ __('Update Job') }}</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>