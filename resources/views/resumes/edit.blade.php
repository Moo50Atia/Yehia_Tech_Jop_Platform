{{-- ATTENTION: Backend logic commented out for frontend-only mode --}}
{{-- Original backend form action: route('resume.update', $resume->id) --}}

<x-app-layout>
    <x-slot name="header">
        <div class="flex items-center justify-between">
            <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
                {{ __('Edit Resume') }}
            </h2>
            <a href="#" class="inline-flex items-center px-4 py-2 bg-gray-600 dark:bg-gray-500 border border-transparent rounded-lg font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 dark:hover:bg-gray-600 transition">
                <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"></path>
                </svg>
                {{ __('Back to Resumes') }}
            </a>
        </div>
    </x-slot>

    <div class="py-8">
        <div class="max-w-3xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-xl rounded-xl">
                {{-- @csrf
                @method('PUT') --}}
                <form action="#" method="POST" enctype="multipart/form-data" class="p-6 space-y-6">

                    <!-- User Selection (Admin only) -->
                    <div>
                        <label for="user_id" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">
                            {{ __('User') }} <span class="text-red-500">*</span>
                        </label>
                        <select name="user_id" id="user_id" required
                            class="block w-full rounded-lg border-gray-300 dark:border-gray-600 dark:bg-gray-700 dark:text-white focus:border-indigo-500 dark:focus:border-indigo-400 focus:ring-indigo-500 dark:focus:ring-indigo-400 shadow-sm">
                            <option value="">Select User</option>
                            <option value="1" selected>John Doe</option>
                            <option value="2">Jane Smith</option>
                            <option value="3">Mike Johnson</option>
                        </select>
                        {{-- @error('user_id')
                        <p class="mt-1 text-sm text-red-600 dark:text-red-400">{{ $message }}</p>
                        @enderror --}}
                    </div>

                    <!-- Resume Content -->
                    <div>
                        <label for="resume_content" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">
                            {{ __('Resume Content') }} <span class="text-red-500">*</span>
                        </label>
                        <textarea name="resume_content" id="resume_content" rows="12" required
                            class="block w-full rounded-lg border-gray-300 dark:border-gray-600 dark:bg-gray-700 dark:text-white focus:border-indigo-500 dark:focus:border-indigo-400 focus:ring-indigo-500 dark:focus:ring-indigo-400 shadow-sm font-mono text-sm">PROFESSIONAL SUMMARY
Experienced software engineer with 5+ years in full-stack development. Proficient in React, Node.js, and Python.

WORK EXPERIENCE
Tech Corp - Senior Developer (2020 - Present)
• Led development of microservices architecture serving 1M+ users
• Improved application performance by 40% through optimization
• Mentored junior developers and conducted code reviews

StartupCo - Full Stack Developer (2018 - 2020)
• Built responsive web applications using React and Node.js
• Implemented RESTful APIs and database design
• Collaborated with cross-functional teams

EDUCATION
University of Technology - B.S. Computer Science (2018)
GPA: 3.8/4.0

SKILLS
• Frontend: React, Vue.js, TypeScript, HTML/CSS
• Backend: Node.js, Python, Django, Express
• Database: PostgreSQL, MongoDB, Redis
• DevOps: Docker, Kubernetes, AWS, CI/CD</textarea>
                        {{-- @error('resume_content')
                        <p class="mt-1 text-sm text-red-600 dark:text-red-400">{{ $message }}</p>
                        @enderror --}}
                    </div>

                    <!-- Current Resume File -->
                    <div>
                        <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">
                            {{ __('Current Resume File') }}
                        </label>
                        <div class="flex items-center space-x-3 p-3 bg-gray-50 dark:bg-gray-700 rounded-lg">
                            <svg class="w-8 h-8 text-red-600" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M4 4a2 2 0 012-2h4.586A2 2 0 0112 2.586L15.414 6A2 2 0 0116 7.414V16a2 2 0 01-2 2H6a2 2 0 01-2-2V4z" clip-rule="evenodd"></path>
                            </svg>
                            <div class="flex-1">
                                <p class="text-sm font-medium text-gray-900 dark:text-white">resume_john_doe.pdf</p>
                                <p class="text-xs text-gray-500 dark:text-gray-400">2.3 MB • Uploaded 2 days ago</p>
                            </div>
                            <a href="#" class="text-indigo-600 dark:text-indigo-400 hover:text-indigo-900 dark:hover:text-indigo-300 text-sm font-medium">Download</a>
                        </div>
                    </div>

                    <!-- Resume File Upload (Replace) -->
                    <div>
                        <label for="resume_file" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">
                            {{ __('Replace Resume File (Optional)') }}
                        </label>
                        <div class="mt-1 flex justify-center px-6 pt-5 pb-6 border-2 border-gray-300 dark:border-gray-600 border-dashed rounded-lg hover:border-indigo-500 dark:hover:border-indigo-400 transition">
                            <div class="space-y-1 text-center">
                                <svg class="mx-auto h-12 w-12 text-gray-400 dark:text-gray-500" stroke="currentColor" fill="none" viewBox="0 0 48 48">
                                    <path d="M28 8H12a4 4 0 00-4 4v20m32-12v8m0 0v8a4 4 0 01-4 4H12a4 4 0 01-4-4v-4m32-4l-3.172-3.172a4 4 0 00-5.656 0L28 28M8 32l9.172-9.172a4 4 0 015.656 0L28 28m0 0l4 4m4-24h8m-4-4v8m-12 4h.02" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                                </svg>
                                <div class="flex text-sm text-gray-600 dark:text-gray-400">
                                    <label for="resume_file" class="relative cursor-pointer bg-white dark:bg-gray-800 rounded-md font-medium text-indigo-600 dark:text-indigo-400 hover:text-indigo-500 focus-within:outline-none focus-within:ring-2 focus-within:ring-offset-2 focus-within:ring-indigo-500">
                                        <span>Upload a file</span>
                                        <input id="resume_file" name="resume_file" type="file" accept=".pdf,.doc,.docx" class="sr-only">
                                    </label>
                                    <p class="pl-1">or drag and drop</p>
                                </div>
                                <p class="text-xs text-gray-500 dark:text-gray-400">PDF, DOC, DOCX up to 10MB</p>
                            </div>
                        </div>
                        {{-- @error('resume_file')
                        <p class="mt-1 text-sm text-red-600 dark:text-red-400">{{ $message }}</p>
                        @enderror --}}
                    </div>

                    <!-- Skills -->
                    <div>
                        <label for="skills" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">
                            {{ __('Key Skills') }}
                        </label>
                        <input type="text" name="skills" id="skills" value="JavaScript, React, Node.js, Python, Docker, AWS"
                            class="block w-full rounded-lg border-gray-300 dark:border-gray-600 dark:bg-gray-700 dark:text-white focus:border-indigo-500 dark:focus:border-indigo-400 focus:ring-indigo-500 dark:focus:ring-indigo-400 shadow-sm">
                        <p class="mt-1 text-sm text-gray-500 dark:text-gray-400">Separate skills with commas</p>
                    </div>

                    <!-- Experience Years -->
                    <div>
                        <label for="experience_years" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">
                            {{ __('Years of Experience') }}
                        </label>
                        <input type="number" name="experience_years" id="experience_years" value="5" min="0" max="50"
                            class="block w-full rounded-lg border-gray-300 dark:border-gray-600 dark:bg-gray-700 dark:text-white focus:border-indigo-500 dark:focus:border-indigo-400 focus:ring-indigo-500 dark:focus:ring-indigo-400 shadow-sm">
                    </div>

                    <!-- Submit Button -->
                    <div class="flex items-center justify-end space-x-3 pt-4 border-t border-gray-200 dark:border-gray-700">
                        <a href="#" class="inline-flex items-center px-4 py-2 bg-gray-300 dark:bg-gray-600 border border-transparent rounded-lg font-semibold text-xs text-gray-700 dark:text-gray-200 uppercase tracking-widest hover:bg-gray-400 dark:hover:bg-gray-500 transition">
                            {{ __('Cancel') }}
                        </a>
                        <button type="submit" class="inline-flex items-center px-4 py-2 bg-indigo-600 dark:bg-indigo-500 border border-transparent rounded-lg font-semibold text-xs text-white uppercase tracking-widest hover:bg-indigo-700 dark:hover:bg-indigo-600 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 dark:focus:ring-offset-gray-800 transition">
                            <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                            </svg>
                            {{ __('Update Resume') }}
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>