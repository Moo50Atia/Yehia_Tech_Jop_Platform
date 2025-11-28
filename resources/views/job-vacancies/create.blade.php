<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">{{ __('Create Job Vacancy') }}</h2>
    </x-slot>
    <div class="py-8">
        <div class="max-w-3xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 shadow-xl rounded-xl p-6">
                <form action="{{ route('job-vacancy.store') }}" method="POST" class="space-y-6">
                    @csrf
                    <div><label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">Title *</label><input type="text" name="title" value="{{ old('title') }}" required class="block w-full rounded-lg border-gray-300 dark:border-gray-600 dark:bg-gray-700 dark:text-white focus:border-indigo-500 focus:ring-indigo-500">@error('title')<p class="mt-1 text-sm text-red-600">{{ $message }}</p>@enderror</div>
                    <div><label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">Description *</label><textarea name="description" rows="4" required class="block w-full rounded-lg border-gray-300 dark:border-gray-600 dark:bg-gray-700 dark:text-white focus:border-indigo-500 focus:ring-indigo-500">{{ old('description') }}</textarea>@error('description')<p class="mt-1 text-sm text-red-600">{{ $message }}</p>@enderror</div>
                    <div><label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">Requirements *</label><textarea name="requirements" rows="4" required class="block w-full rounded-lg border-gray-300 dark:border-gray-600 dark:bg-gray-700 dark:text-white focus:border-indigo-500 focus:ring-indigo-500">{{ old('requirements') }}</textarea>@error('requirements')<p class="mt-1 text-sm text-red-600">{{ $message }}</p>@enderror</div>
                    <div><label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">Location *</label><input type="text" name="location" value="{{ old('location') }}" required class="block w-full rounded-lg border-gray-300 dark:border-gray-600 dark:bg-gray-700 dark:text-white focus:border-indigo-500 focus:ring-indigo-500">@error('location')<p class="mt-1 text-sm text-red-600">{{ $message }}</p>@enderror</div>
                    <div><label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">Salary Range</label><input type="text" name="salary_range" value="{{ old('salary_range') }}" class="block w-full rounded-lg border-gray-300 dark:border-gray-600 dark:bg-gray-700 dark:text-white focus:border-indigo-500 focus:ring-indigo-500">@error('salary_range')<p class="mt-1 text-sm text-red-600">{{ $message }}</p>@enderror</div>
                    <div><label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">Job Type *</label><select name="job_type" required class="block w-full rounded-lg border-gray-300 dark:border-gray-600 dark:bg-gray-700 dark:text-white focus:border-indigo-500 focus:ring-indigo-500">
                            <option value="">Select Type</option>
                            <option value="full_time">Full Time</option>
                            <option value="part_time">Part Time</option>
                            <option value="contract">Contract</option>
                            <option value="internship">Internship</option>
                        </select>@error('job_type')<p class="mt-1 text-sm text-red-600">{{ $message }}</p>@enderror</div>
                    <div><label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">Company *</label><select name="company_id" required class="block w-full rounded-lg border-gray-300 dark:border-gray-600 dark:bg-gray-700 dark:text-white focus:border-indigo-500 focus:ring-indigo-500">
                            <option value="">Select Company</option>@foreach($companies as $company)<option value="{{ $company->id }}">{{ $company->name }}</option>@endforeach
                        </select>@error('company_id')<p class="mt-1 text-sm text-red-600">{{ $message }}</p>@enderror</div>
                    <div><label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">Category *</label><select name="job_category_id" required class="block w-full rounded-lg border-gray-300 dark:border-gray-600 dark:bg-gray-700 dark:text-white focus:border-indigo-500 focus:ring-indigo-500">
                            <option value="">Select Category</option>@foreach($categories as $category)<option value="{{ $category->id }}">{{ $category->name }}</option>@endforeach
                        </select>@error('job_category_id')<p class="mt-1 text-sm text-red-600">{{ $message }}</p>@enderror</div>
                    <div class="flex justify-end space-x-3 pt-4 border-t border-gray-200 dark:border-gray-700"><a href="{{ route('job-vacancy.index') }}" class="px-4 py-2 bg-gray-300 dark:bg-gray-600 rounded-lg text-xs font-semibold text-gray-700 dark:text-gray-200 uppercase hover:bg-gray-400 transition">Cancel</a><button type="submit" class="px-4 py-2 bg-indigo-600 rounded-lg text-xs font-semibold text-white uppercase hover:bg-indigo-700 transition">Create</button></div>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>