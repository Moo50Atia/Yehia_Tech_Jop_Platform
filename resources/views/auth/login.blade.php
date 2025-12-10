<x-guest-layout>
    <!-- Header -->
    <div class="text-center mb-8">
        <h2 class="text-2xl font-bold text-gray-900 dark:text-white">Welcome Back!</h2>
        <p class="mt-2 text-gray-600 dark:text-gray-400">Sign in to continue to your account</p>
    </div>

    <!-- Session Status -->
    <x-auth-session-status class="mb-4" :status="session('status')" />

    <form method="POST" action="{{ route('login') }}" class="space-y-6">
        @csrf

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
                    autofocus
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
                    class="block w-full pl-10 pr-12 py-3 rounded-xl border-gray-300 dark:border-gray-600 dark:bg-gray-700/50 focus:border-indigo-500 focus:ring-indigo-500 transition-all duration-300"
                    type="password"
                    name="password"
                    required
                    autocomplete="current-password"
                    placeholder="••••••••" />

                <!-- Toggle Password Visibility -->
                <button type="button" id="togglePasswordShow" class="absolute inset-y-0 right-0 flex items-center pr-3 text-gray-400 hover:text-gray-600 dark:hover:text-gray-300 transition-colors" onclick="togglePassword()">
                    <x-closed-eye />
                </button>
                <button type="button" id="togglePasswordHide" class="absolute inset-y-0 right-0 flex items-center pr-3 text-gray-400 hover:text-gray-600 dark:hover:text-gray-300 transition-colors hidden" onclick="togglePassword()">
                    <x-open-eye />
                </button>
            </div>
            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <script>
            function togglePassword() {
                const passwordInput = document.getElementById('password');
                const showButton = document.getElementById('togglePasswordShow');
                const hideButton = document.getElementById('togglePasswordHide');

                if (passwordInput.type === 'password') {
                    passwordInput.type = 'text';
                    showButton.classList.add('hidden');
                    hideButton.classList.remove('hidden');
                } else {
                    passwordInput.type = 'password';
                    showButton.classList.remove('hidden');
                    hideButton.classList.add('hidden');
                }
            }
        </script>

        <!-- Remember Me & Forgot Password -->
        <div class="flex items-center justify-between">
            <label for="remember_me" class="inline-flex items-center cursor-pointer">
                <input id="remember_me" type="checkbox" class="w-4 h-4 rounded border-gray-300 dark:border-gray-600 text-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 dark:focus:ring-offset-gray-800 transition-colors" name="remember">
                <span class="ms-2 text-sm text-gray-600 dark:text-gray-400">{{ __('Remember me') }}</span>
            </label>

            @if (Route::has('password.request'))
            <a class="text-sm text-indigo-600 dark:text-indigo-400 hover:text-indigo-800 dark:hover:text-indigo-300 font-medium transition-colors" href="{{ route('password.request') }}">
                {{ __('Forgot password?') }}
            </a>
            @endif
        </div>

        <!-- Submit Button -->
        <button type="submit" class="w-full py-3 px-4 bg-gradient-to-r from-indigo-600 to-purple-600 hover:from-indigo-700 hover:to-purple-700 text-white font-semibold rounded-xl shadow-lg hover:shadow-xl transform hover:scale-[1.02] transition-all duration-300">
            {{ __('Sign In') }}
        </button>
    </form>

    <!-- Divider -->
    <div class="relative my-6">
        <div class="absolute inset-0 flex items-center">
            <div class="w-full border-t border-gray-200 dark:border-gray-700"></div>
        </div>
        <div class="relative flex justify-center text-sm">
            <span class="px-4 bg-white dark:bg-gray-800 text-gray-500 dark:text-gray-400">Don't have an account?</span>
        </div>
    </div>

    <!-- Register Link -->
    <a href="{{ route('register') }}" class="block w-full py-3 px-4 text-center font-semibold text-indigo-600 dark:text-indigo-400 bg-indigo-50 dark:bg-indigo-900/30 hover:bg-indigo-100 dark:hover:bg-indigo-900/50 rounded-xl transition-all duration-300">
        {{ __('Create New Account') }}
    </a>
</x-guest-layout>