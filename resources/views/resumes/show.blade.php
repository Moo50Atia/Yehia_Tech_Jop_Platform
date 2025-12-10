{{-- ATTENTION: Backend logic commented out for frontend-only mode --}}

<x-app-layout>
    <x-slot name="header">
        <div class="flex items-center justify-between">
            <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
                {{ __('Resume Details') }}
            </h2>
            <div class="flex space-x-2">
                <a href="#" class="inline-flex items-center px-4 py-2 bg-yellow-600 dark:bg-yellow-500 border border-transparent rounded-lg font-semibold text-xs text-white uppercase tracking-widest hover:bg-yellow-700 dark:hover:bg-yellow-600 transition">
                    <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"></path>
                    </svg>
                    {{ __('Edit') }}
                </a>
                <a href="#" class="inline-flex items-center px-4 py-2 bg-gray-600 dark:bg-gray-500 border border-transparent rounded-lg font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 dark:hover:bg-gray-600 transition">
                    <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"></path>
                    </svg>
                    {{ __('Back') }}
                </a>
            </div>
        </div>
    </x-slot>

    <div class="py-8">
        <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8">
            <!-- User Info Card -->
            <div class="bg-white dark:bg-gray-800 rounded-xl shadow-lg p-6 mb-6">
                <div class="flex items-center justify-between">
                    <div class="flex items-center space-x-4">
                        <div class="w-16 h-16 bg-gradient-to-br from-indigo-600 to-purple-600 dark:from-indigo-500 dark:to-purple-500 rounded-full flex items-center justify-center text-white font-bold text-2xl shadow-lg">
                            JD
                        </div>
                        <div>
                            <h3 class="text-2xl font-bold text-gray-900 dark:text-white">John Doe</h3>
                            <p class="text-gray-600 dark:text-gray-400">Software Engineer</p>
                            <p class="text-sm text-gray-500 dark:text-gray-500">john.doe@example.com</p>
                        </div>
                    </div>
                    <div class="text-right">
                        <p class="text-sm text-gray-500 dark:text-gray-400">Last Updated</p>
                        <p class="text-sm font-medium text-gray-900 dark:text-white">2 days ago</p>
                    </div>
                </div>
            </div>

            <!-- Resume File Card -->
            <div class="bg-white dark:bg-gray-800 rounded-xl shadow-lg p-6 mb-6">
                <h4 class="text-lg font-semibold text-gray-900 dark:text-white mb-4">{{ __('Resume File') }}</h4>
                <div class="flex items-center justify-between p-4 bg-gray-50 dark:bg-gray-700 rounded-lg">
                    <div class="flex items-center space-x-3">
                        <svg class="w-10 h-10 text-red-600" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd" d="M4 4a2 2 0 012-2h4.586A2 2 0 0112 2.586L15.414 6A2 2 0 0116 7.414V16a2 2 0 01-2 2H6a2 2 0 01-2-2V4z" clip-rule="evenodd"></path>
                        </svg>
                        <div>
                            <p class="text-sm font-medium text-gray-900 dark:text-white">resume_john_doe.pdf</p>
                            <p class="text-xs text-gray-500 dark:text-gray-400">2.3 MB • PDF Document</p>
                        </div>
                    </div>
                    <div class="flex space-x-2">
                        <button class="inline-flex items-center px-3 py-2 bg-indigo-600 dark:bg-indigo-500 border border-transparent rounded-lg font-semibold text-xs text-white uppercase tracking-widest hover:bg-indigo-700 dark:hover:bg-indigo-600 transition">
                            <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path>
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"></path>
                            </svg>
                            View
                        </button>
                        <button class="inline-flex items-center px-3 py-2 bg-green-600 dark:bg-green-500 border border-transparent rounded-lg font-semibold text-xs text-white uppercase tracking-widest hover:bg-green-700 dark:hover:bg-green-600 transition">
                            <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-4l-4 4m0 0l-4-4m4 4V4"></path>
                            </svg>
                            Download
                        </button>
                    </div>
                </div>
            </div>

            <!-- Resume Content Card -->
            <div class="bg-white dark:bg-gray-800 rounded-xl shadow-lg p-6 mb-6">
                <h4 class="text-lg font-semibold text-gray-900 dark:text-white mb-4">{{ __('Resume Content') }}</h4>
                <div class="prose dark:prose-invert max-w-none">
                    <div class="bg-gray-50 dark:bg-gray-700 rounded-lg p-6 font-mono text-sm whitespace-pre-wrap text-gray-900 dark:text-gray-100">PROFESSIONAL SUMMARY
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
                        • DevOps: Docker, Kubernetes, AWS, CI/CD</div>
                </div>
            </div>

            <!-- Skills & Experience Card -->
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-6">
                <div class="bg-white dark:bg-gray-800 rounded-xl shadow-lg p-6">
                    <h4 class="text-lg font-semibold text-gray-900 dark:text-white mb-4">{{ __('Key Skills') }}</h4>
                    <div class="flex flex-wrap gap-2">
                        <span class="px-3 py-1 bg-indigo-100 dark:bg-indigo-900/30 text-indigo-800 dark:text-indigo-400 rounded-full text-sm font-medium">JavaScript</span>
                        <span class="px-3 py-1 bg-blue-100 dark:bg-blue-900/30 text-blue-800 dark:text-blue-400 rounded-full text-sm font-medium">React</span>
                        <span class="px-3 py-1 bg-green-100 dark:bg-green-900/30 text-green-800 dark:text-green-400 rounded-full text-sm font-medium">Node.js</span>
                        <span class="px-3 py-1 bg-purple-100 dark:bg-purple-900/30 text-purple-800 dark:text-purple-400 rounded-full text-sm font-medium">Python</span>
                        <span class="px-3 py-1 bg-yellow-100 dark:bg-yellow-900/30 text-yellow-800 dark:text-yellow-400 rounded-full text-sm font-medium">Docker</span>
                        <span class="px-3 py-1 bg-red-100 dark:bg-red-900/30 text-red-800 dark:text-red-400 rounded-full text-sm font-medium">AWS</span>
                    </div>
                </div>

                <div class="bg-white dark:bg-gray-800 rounded-xl shadow-lg p-6">
                    <h4 class="text-lg font-semibold text-gray-900 dark:text-white mb-4">{{ __('Experience') }}</h4>
                    <div class="flex items-center space-x-3">
                        <div class="p-3 bg-indigo-100 dark:bg-indigo-900/30 rounded-lg">
                            <svg class="w-8 h-8 text-indigo-600 dark:text-indigo-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 13.255A23.931 23.931 0 0112 15c-3.183 0-6.22-.62-9-1.745M16 6V4a2 2 0 00-2-2h-4a2 2 0 00-2 2v2m4 6h.01M5 20h14a2 2 0 002-2V8a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path>
                            </svg>
                        </div>
                        <div>
                            <p class="text-3xl font-bold text-gray-900 dark:text-white">5+</p>
                            <p class="text-sm text-gray-600 dark:text-gray-400">Years of Experience</p>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Actions -->
            <div class="bg-white dark:bg-gray-800 rounded-xl shadow-lg p-6">
                <div class="flex items-center justify-between">
                    <div>
                        <h4 class="text-lg font-semibold text-gray-900 dark:text-white">{{ __('Actions') }}</h4>
                        <p class="text-sm text-gray-600 dark:text-gray-400">Manage this resume</p>
                    </div>
                    <div class="flex space-x-3">
                        <a href="#" class="inline-flex items-center px-4 py-2 bg-yellow-600 dark:bg-yellow-500 border border-transparent rounded-lg font-semibold text-xs text-white uppercase tracking-widest hover:bg-yellow-700 dark:hover:bg-yellow-600 transition">
                            {{ __('Edit Resume') }}
                        </a>
                        <button type="button" onclick="return confirm('Are you sure you want to delete this resume?');" class="inline-flex items-center px-4 py-2 bg-red-600 dark:bg-red-500 border border-transparent rounded-lg font-semibold text-xs text-white uppercase tracking-widest hover:bg-red-700 dark:hover:bg-red-600 transition">
                            {{ __('Delete Resume') }}
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>