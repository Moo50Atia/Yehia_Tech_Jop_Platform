<x-app-layout>
    <x-slot name="header">
        <div class="flex items-center justify-between">
            <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
                {{ __('Upload Resume') }}
            </h2>
            <a href="{{ route('seeker.resumes') }}" class="inline-flex items-center px-4 py-2 bg-gray-600 dark:bg-gray-500 border border-transparent rounded-lg font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 dark:hover:bg-gray-600 transition">
                <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"></path>
                </svg>
                {{ __('My Resumes') }}
            </a>
        </div>
    </x-slot>

    <style>
        @@keyframes fadeInUp {
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

        .upload-zone {
            transition: all 0.3s ease;
        }

        .upload-zone:hover {
            border-color: #6366f1;
            background-color: rgba(99, 102, 241, 0.05);
        }

        .upload-zone.dragover {
            border-color: #6366f1;
            background-color: rgba(99, 102, 241, 0.1);
            transform: scale(1.02);
        }
    </style>

    <div class="py-8">
        <div class="max-w-3xl mx-auto px-4 sm:px-6 lg:px-8">
            <!-- Upload Card -->
            <div class="bg-white dark:bg-gray-800 rounded-2xl shadow-xl overflow-hidden animate-fade-in-up" style="animation-fill-mode: forwards;">
                <div class="p-8">
                    <!-- Header -->
                    <div class="text-center mb-8">
                        <div class="inline-flex items-center justify-center w-16 h-16 bg-gradient-to-br from-indigo-500 to-purple-600 rounded-2xl mb-4">
                            <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 16a4 4 0 01-.88-7.903A5 5 0 1115.9 6L16 6a5 5 0 011 9.9M15 13l-3-3m0 0l-3 3m3-3v12"></path>
                            </svg>
                        </div>
                        <h3 class="text-2xl font-bold text-gray-900 dark:text-white mb-2">Upload Your Resume</h3>
                        <p class="text-gray-600 dark:text-gray-400">Upload a PDF file of your resume to use when applying for jobs.</p>
                    </div>

                    <!-- Error Messages -->
                    @if ($errors->any())
                    <div class="mb-6 p-4 bg-red-50 dark:bg-red-900/20 border border-red-200 dark:border-red-800 rounded-xl">
                        <div class="flex items-center mb-2">
                            <svg class="w-5 h-5 text-red-500 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                            </svg>
                            <span class="text-red-700 dark:text-red-400 font-semibold">Upload Error</span>
                        </div>
                        <ul class="list-disc list-inside text-sm text-red-600 dark:text-red-400">
                            @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                    @endif

                    <!-- Success Message -->
                    @if (session('success'))
                    <div class="mb-6 p-4 bg-green-50 dark:bg-green-900/20 border border-green-200 dark:border-green-800 rounded-xl">
                        <div class="flex items-center">
                            <svg class="w-5 h-5 text-green-500 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                            </svg>
                            <span class="text-green-700 dark:text-green-400 font-semibold">{{ session('success') }}</span>
                        </div>
                    </div>
                    @endif

                    <!-- Upload Form -->
                    <form method="POST" action="{{ route('seeker.resume.store') }}" enctype="multipart/form-data" id="uploadForm">
                        @csrf

                        <!-- Resume Title (Optional) -->
                        <div class="mb-6">
                            <label for="title" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">
                                Resume Title (Optional)
                            </label>
                            <input type="text" name="title" id="title" value="{{ old('title') }}"
                                class="block w-full px-4 py-3 rounded-xl border-gray-300 dark:border-gray-600 dark:bg-gray-700 dark:text-white focus:border-indigo-500 focus:ring-indigo-500 transition"
                                placeholder="e.g., Software Engineer Resume 2024">
                            <p class="mt-1 text-xs text-gray-500 dark:text-gray-400">Give your resume a name to easily identify it later.</p>
                        </div>

                        <!-- File Upload Zone -->
                        <div class="mb-6">
                            <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">
                                Resume File <span class="text-red-500">*</span>
                            </label>
                            <div class="upload-zone relative border-2 border-dashed border-gray-300 dark:border-gray-600 rounded-xl p-8 text-center cursor-pointer" id="dropZone">
                                <input type="file" name="resume" id="resumeInput" accept=".pdf" class="absolute inset-0 w-full h-full opacity-0 cursor-pointer" required>
                                <div id="uploadContent">
                                    <svg class="w-12 h-12 mx-auto text-gray-400 mb-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path>
                                    </svg>
                                    <p class="text-gray-600 dark:text-gray-400 mb-2">
                                        <span class="text-indigo-600 dark:text-indigo-400 font-semibold">Click to upload</span> or drag and drop
                                    </p>
                                    <p class="text-sm text-gray-500 dark:text-gray-500">PDF only (max 5MB)</p>
                                </div>
                                <div id="filePreview" class="hidden">
                                    <svg class="w-12 h-12 mx-auto text-green-500 mb-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                    </svg>
                                    <p class="text-gray-900 dark:text-white font-semibold" id="fileName"></p>
                                    <p class="text-sm text-gray-500 dark:text-gray-400" id="fileSize"></p>
                                    <button type="button" id="removeFile" class="mt-2 text-sm text-red-500 hover:text-red-600">Remove file</button>
                                </div>
                            </div>
                        </div>

                        <!-- Security Notice -->
                        <div class="mb-6 p-4 bg-blue-50 dark:bg-blue-900/20 border border-blue-200 dark:border-blue-800 rounded-xl">
                            <div class="flex items-start">
                                <svg class="w-5 h-5 text-blue-500 mr-3 mt-0.5 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                </svg>
                                <div class="text-sm text-blue-700 dark:text-blue-300">
                                    <p class="font-semibold mb-1">Security Information</p>
                                    <ul class="list-disc list-inside space-y-1 text-blue-600 dark:text-blue-400">
                                        <li>Only PDF files are accepted</li>
                                        <li>Maximum file size: 5MB</li>
                                        <li>Files are stored securely and only accessible by you</li>
                                        <li>PDFs with JavaScript or embedded content are not allowed</li>
                                    </ul>
                                </div>
                            </div>
                        </div>

                        <!-- Submit Button -->
                        <button type="submit" id="submitBtn" class="w-full py-4 px-6 bg-gradient-to-r from-indigo-600 to-purple-600 text-white font-semibold rounded-xl hover:from-indigo-700 hover:to-purple-700 transition-all shadow-lg hover:shadow-xl disabled:opacity-50 disabled:cursor-not-allowed">
                            <svg class="w-5 h-5 inline mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-8l-4-4m0 0L8 8m4-4v12"></path>
                            </svg>
                            Upload Resume
                        </button>
                    </form>
                </div>
            </div>

            <!-- Existing Resumes -->
            @if($resumes->count() > 0)
            <div class="mt-8 bg-white dark:bg-gray-800 rounded-2xl shadow-xl overflow-hidden animate-fade-in-up" style="animation-delay: 0.2s; animation-fill-mode: forwards;">
                <div class="p-6 border-b border-gray-200 dark:border-gray-700">
                    <h3 class="text-lg font-semibold text-gray-900 dark:text-white">Your Resumes</h3>
                </div>
                <div class="divide-y divide-gray-200 dark:divide-gray-700">
                    @foreach($resumes as $resume)
                    <div class="p-6 flex items-center justify-between hover:bg-gray-50 dark:hover:bg-gray-700/50 transition">
                        <div class="flex items-center">
                            <div class="w-10 h-10 bg-red-100 dark:bg-red-900/30 rounded-lg flex items-center justify-center mr-4">
                                <svg class="w-5 h-5 text-red-600 dark:text-red-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 21h10a2 2 0 002-2V9.414a1 1 0 00-.293-.707l-5.414-5.414A1 1 0 0012.586 3H7a2 2 0 00-2 2v14a2 2 0 002 2z"></path>
                                </svg>
                            </div>
                            <div>
                                <p class="font-medium text-gray-900 dark:text-white">{{ $resume->filename }}</p>
                                <p class="text-sm text-gray-500 dark:text-gray-400">Uploaded {{ $resume->created_at->diffForHumans() }}</p>
                            </div>
                        </div>
                        <div class="flex items-center space-x-2">
                            <a href="{{ route('seeker.resume.download', $resume) }}" class="p-2 text-indigo-600 dark:text-indigo-400 hover:bg-indigo-50 dark:hover:bg-indigo-900/30 rounded-lg transition" title="Download">
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-4l-4 4m0 0l-4-4m4 4V4"></path>
                                </svg>
                            </a>
                            <form method="POST" action="{{ route('seeker.resume.delete', $resume) }}" class="inline" onsubmit="return confirm('Are you sure you want to delete this resume?')">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="p-2 text-red-600 dark:text-red-400 hover:bg-red-50 dark:hover:bg-red-900/30 rounded-lg transition" title="Delete">
                                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"></path>
                                    </svg>
                                </button>
                            </form>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
            @endif
        </div>
    </div>

    <script>
        const dropZone = document.getElementById('dropZone');
        const resumeInput = document.getElementById('resumeInput');
        const uploadContent = document.getElementById('uploadContent');
        const filePreview = document.getElementById('filePreview');
        const fileName = document.getElementById('fileName');
        const fileSize = document.getElementById('fileSize');
        const removeFile = document.getElementById('removeFile');
        const submitBtn = document.getElementById('submitBtn');

        // Drag and drop handlers
        ['dragenter', 'dragover'].forEach(eventName => {
            dropZone.addEventListener(eventName, (e) => {
                e.preventDefault();
                dropZone.classList.add('dragover');
            });
        });

        ['dragleave', 'drop'].forEach(eventName => {
            dropZone.addEventListener(eventName, (e) => {
                e.preventDefault();
                dropZone.classList.remove('dragover');
            });
        });

        dropZone.addEventListener('drop', (e) => {
            const files = e.dataTransfer.files;
            if (files.length > 0) {
                handleFile(files[0]);
            }
        });

        resumeInput.addEventListener('change', (e) => {
            if (e.target.files.length > 0) {
                handleFile(e.target.files[0]);
            }
        });

        function handleFile(file) {
            // Validate file type
            if (file.type !== 'application/pdf') {
                alert('Only PDF files are allowed.');
                return;
            }

            // Validate file size (5MB)
            if (file.size > 5 * 1024 * 1024) {
                alert('File size must not exceed 5MB.');
                return;
            }

            // Update UI
            fileName.textContent = file.name;
            fileSize.textContent = formatFileSize(file.size);
            uploadContent.classList.add('hidden');
            filePreview.classList.remove('hidden');
        }

        removeFile.addEventListener('click', (e) => {
            e.preventDefault();
            resumeInput.value = '';
            uploadContent.classList.remove('hidden');
            filePreview.classList.add('hidden');
        });

        function formatFileSize(bytes) {
            if (bytes === 0) return '0 Bytes';
            const k = 1024;
            const sizes = ['Bytes', 'KB', 'MB', 'GB'];
            const i = Math.floor(Math.log(bytes) / Math.log(k));
            return parseFloat((bytes / Math.pow(k, i)).toFixed(2)) + ' ' + sizes[i];
        }

        // Form submission loading state
        document.getElementById('uploadForm').addEventListener('submit', function() {
            submitBtn.disabled = true;
            submitBtn.innerHTML = '<svg class="animate-spin w-5 h-5 inline mr-2" fill="none" viewBox="0 0 24 24"><circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle><path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path></svg> Uploading...';
        });
    </script>
</x-app-layout>