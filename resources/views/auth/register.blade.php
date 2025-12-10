<x-guest-layout>
    <!-- Header -->
    <div class="text-center mb-8">
        <h2 class="text-2xl font-bold text-gray-900 dark:text-white">Create Your Account</h2>
        <p class="mt-2 text-gray-600 dark:text-gray-400">Join thousands of professionals today</p>
    </div>

    <form method="POST" action="{{ route('register') }}" class="space-y-5">
        @csrf

        <!-- Role Selection -->
        <div>
            <x-input-label :value="__('I want to...')" class="text-gray-700 dark:text-gray-300 font-medium mb-3" />
            <div class="grid grid-cols-2 gap-4">
                <!-- Job Seeker Option -->
                <label class="relative cursor-pointer">
                    <input type="radio" name="role" value="jop_seeker" class="peer sr-only" {{ old('role', 'jop_seeker') == 'jop_seeker' ? 'checked' : '' }} required>
                    <div class="p-4 rounded-xl border-2 border-gray-200 dark:border-gray-600 bg-white dark:bg-gray-700/50 peer-checked:border-indigo-500 peer-checked:bg-indigo-50 dark:peer-checked:bg-indigo-900/30 hover:border-gray-300 dark:hover:border-gray-500 transition-all duration-300">
                        <div class="flex flex-col items-center text-center">
                            <div class="w-12 h-12 bg-gradient-to-br from-green-400 to-emerald-500 rounded-xl flex items-center justify-center mb-3 shadow-lg">
                                <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
                                </svg>
                            </div>
                            <span class="font-semibold text-gray-900 dark:text-white text-sm">Find a Job</span>
                            <span class="text-xs text-gray-500 dark:text-gray-400 mt-1">Job Seeker</span>
                        </div>
                    </div>
                    <div class="absolute top-2 right-2 w-5 h-5 bg-indigo-500 rounded-full hidden peer-checked:flex items-center justify-center">
                        <svg class="w-3 h-3 text-white" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd" />
                        </svg>
                    </div>
                </label>

                <!-- Company Owner Option -->
                <label class="relative cursor-pointer">
                    <input type="radio" name="role" value="company_owner" class="peer sr-only" {{ old('role') == 'company_owner' ? 'checked' : '' }}>
                    <div class="p-4 rounded-xl border-2 border-gray-200 dark:border-gray-600 bg-white dark:bg-gray-700/50 peer-checked:border-indigo-500 peer-checked:bg-indigo-50 dark:peer-checked:bg-indigo-900/30 hover:border-gray-300 dark:hover:border-gray-500 transition-all duration-300">
                        <div class="flex flex-col items-center text-center">
                            <div class="w-12 h-12 bg-gradient-to-br from-blue-400 to-indigo-500 rounded-xl flex items-center justify-center mb-3 shadow-lg">
                                <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4" />
                                </svg>
                            </div>
                            <span class="font-semibold text-gray-900 dark:text-white text-sm">Hire Talent</span>
                            <span class="text-xs text-gray-500 dark:text-gray-400 mt-1">Company Owner</span>
                        </div>
                    </div>
                    <div class="absolute top-2 right-2 w-5 h-5 bg-indigo-500 rounded-full hidden peer-checked:flex items-center justify-center">
                        <svg class="w-3 h-3 text-white" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd" />
                        </svg>
                    </div>
                </label>
            </div>
            <x-input-error :messages="$errors->get('role')" class="mt-2" />
        </div>

        <!-- Name -->
        <div class="group">
            <x-input-label for="name" :value="__('Full Name')" class="text-gray-700 dark:text-gray-300 font-medium" />
            <div class="relative mt-2">
                <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                    <svg class="w-5 h-5 text-gray-400 group-focus-within:text-indigo-500 transition-colors" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                    </svg>
                </div>
                <x-text-input id="name"
                    class="block w-full pl-10 pr-4 py-3 rounded-xl border-gray-300 dark:border-gray-600 dark:bg-gray-700/50 focus:border-indigo-500 focus:ring-indigo-500 transition-all duration-300"
                    type="text"
                    name="name"
                    :value="old('name')"
                    required
                    autofocus
                    autocomplete="name"
                    placeholder="John Doe" />
            </div>
            <x-input-error :messages="$errors->get('name')" class="mt-2" />
        </div>

        <!-- Email Address -->
        <div class="group">
            <x-input-label for="email" :value="__('Email Address')" class="text-gray-700 dark:text-gray-300 font-medium" />
            <div class="relative mt-2">
                <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                    <svg class="w-5 h-5 text-gray-400 group-focus-within:text-indigo-500 transition-colors" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 12a4 4 0 10-8 0 4 4 0 008 0zm0 0v1.5a2.5 2.5 0 005 0V12a9 9 0 10-9 9m4.5-1.206a8.959 8.959 0 01-4.5 1.207" />
                    </svg>
                </div>
                <x-text-input id="email"
                    class="block w-full pl-10 pr-4 py-3 rounded-xl border-gray-300 dark:border-gray-600 dark:bg-gray-700/50 focus:border-indigo-500 focus:ring-indigo-500 transition-all duration-300"
                    type="email"
                    name="email"
                    :value="old('email')"
                    required
                    autocomplete="username"
                    placeholder="name@company.com" />
            </div>
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <!-- Password -->
        <div class="group">
            <x-input-label for="password" :value="__('Password')" class="text-gray-700 dark:text-gray-300 font-medium" />
            <div class="relative mt-2">
                <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                    <svg class="w-5 h-5 text-gray-400 group-focus-within:text-indigo-500 transition-colors" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z" />
                    </svg>
                </div>
                <x-text-input id="password"
                    class="block w-full pl-10 pr-4 py-3 rounded-xl border-gray-300 dark:border-gray-600 dark:bg-gray-700/50 focus:border-indigo-500 focus:ring-indigo-500 transition-all duration-300"
                    type="password"
                    name="password"
                    required
                    autocomplete="new-password"
                    placeholder="••••••••" />
            </div>
            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <!-- Confirm Password -->
        <div class="group">
            <x-input-label for="password_confirmation" :value="__('Confirm Password')" class="text-gray-700 dark:text-gray-300 font-medium" />
            <div class="relative mt-2">
                <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                    <svg class="w-5 h-5 text-gray-400 group-focus-within:text-indigo-500 transition-colors" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z" />
                    </svg>
                </div>
                <x-text-input id="password_confirmation"
                    class="block w-full pl-10 pr-4 py-3 rounded-xl border-gray-300 dark:border-gray-600 dark:bg-gray-700/50 focus:border-indigo-500 focus:ring-indigo-500 transition-all duration-300"
                    type="password"
                    name="password_confirmation"
                    required
                    autocomplete="new-password"
                    placeholder="••••••••" />
            </div>
            <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
        </div>

        <!-- Submit Button -->
        <button type="submit" class="w-full py-3 px-4 bg-gradient-to-r from-indigo-600 to-purple-600 hover:from-indigo-700 hover:to-purple-700 text-white font-semibold rounded-xl shadow-lg hover:shadow-xl transform hover:scale-[1.02] transition-all duration-300">
            {{ __('Create Account') }}
        </button>
    </form>

    <!-- Divider -->
    <div class="relative my-6">
        <div class="absolute inset-0 flex items-center">
            <div class="w-full border-t border-gray-200 dark:border-gray-700"></div>
        </div>
        <div class="relative flex justify-center text-sm">
            <span class="px-4 bg-white dark:bg-gray-800 text-gray-500 dark:text-gray-400">Already have an account?</span>
        </div>
    </div>

    <!-- Login Link -->
    <a href="{{ route('login') }}" class="block w-full py-3 px-4 text-center font-semibold text-indigo-600 dark:text-indigo-400 bg-indigo-50 dark:bg-indigo-900/30 hover:bg-indigo-100 dark:hover:bg-indigo-900/50 rounded-xl transition-all duration-300">
        {{ __('Sign In Instead') }}
    </a>
</x-guest-layout>