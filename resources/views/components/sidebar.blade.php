@if(Auth::user()->role === 'admin')
<x-sidebar-admin />
@elseif(Auth::user()->role === 'company_owner')
<x-sidebar-company />
@else
<!-- Default sidebar for other roles (job_seeker, etc.) -->
<aside id="sidebar" class="fixed top-0 left-0 z-40 w-64 h-screen transition-transform -translate-x-full lg:translate-x-0 bg-white dark:bg-gray-800 border-r border-gray-200 dark:border-gray-700">
    <div class="h-full flex flex-col">
        <!-- Logo Section -->
        <div class="flex items-center justify-between px-6 py-5 border-b border-gray-200 dark:border-gray-700">
            <a href="{{ route('seeker.dashboard') }}" class="flex items-center space-x-3">
                <x-application-logo class="h-8 w-auto fill-current text-indigo-600 dark:text-indigo-400" />
                <span class="text-xl font-bold text-gray-800 dark:text-white">{{ __('Shaghalni') }}</span>
            </a>
            <!-- Mobile close button -->
            <button type="button" class="lg:hidden text-gray-500 hover:text-gray-700 dark:text-gray-400 dark:hover:text-gray-200" onclick="toggleSidebar()">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                </svg>
            </button>
        </div>

        <!-- Navigation Links -->
        <nav class="flex-1 overflow-y-auto px-4 py-6">
            <ul class="space-y-2">
                <!-- Dashboard -->
                <x-sidebar-nav-link :href="route('seeker.dashboard')" :active="request()->routeIs('seeker.dashboard')">
                    <x-slot name="icon">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"></path>
                        </svg>
                    </x-slot>
                    {{ __('Dashboard') }}
                </x-sidebar-nav-link>

                <!-- Browse Jobs -->
                <x-sidebar-nav-link href="#" :active="false">
                    <x-slot name="icon">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
                        </svg>
                    </x-slot>
                    {{ __('Browse Jobs') }}
                </x-sidebar-nav-link>

                <!-- My Applications -->
                <x-sidebar-nav-link href="{{ route('seeker.my-applications') }}" :active="request()->routeIs('seeker.my-applications')">
                    <x-slot name="icon">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path>
                        </svg>
                    </x-slot>
                    {{ __('My Applications') }}
                </x-sidebar-nav-link>

                <!-- My Resume -->
                <x-sidebar-nav-link href="{{ route('seeker.resumes') }}" :active="request()->routeIs('seeker.resumes')">
                    <x-slot name="icon">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path>
                        </svg>
                    </x-slot>
                    {{ __('My Resume') }}
                </x-sidebar-nav-link>
            </ul>

            <!-- Divider -->
            <hr class="my-6 border-gray-200 dark:border-gray-700" />

            <!-- Logout -->
            <form method="POST" action="{{ route('logout') }}">
                @csrf
                <x-sidebar-nav-link :href="route('logout')"
                    class="text-red-600 dark:text-red-400 hover:bg-red-50 dark:hover:bg-red-900/20"
                    onclick="event.preventDefault(); this.closest('form').submit();">
                    <x-slot name="icon">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1"></path>
                        </svg>
                    </x-slot>
                    {{ __('Log Out') }}
                </x-sidebar-nav-link>
            </form>
        </nav>

        <!-- User Profile Section -->
        <div class="px-4 py-4 border-t border-gray-200 dark:border-gray-700">
            <div class="flex items-center space-x-3">
                <div class="flex-shrink-0">
                    <div class="w-10 h-10 rounded-full bg-indigo-600 dark:bg-indigo-500 flex items-center justify-center text-white font-semibold">
                        {{ substr(Auth::user()->name, 0, 1) }}
                    </div>
                </div>
                <div class="flex-1 min-w-0">
                    <p class="text-sm font-medium text-gray-900 dark:text-white truncate">
                        {{ Auth::user()->name }}
                    </p>
                    <p class="text-xs text-gray-500 dark:text-gray-400 truncate">
                        {{ Auth::user()->email }}
                    </p>
                </div>
            </div>
        </div>
    </div>
</aside>

<!-- Mobile sidebar backdrop -->
<div id="sidebar-backdrop" class="fixed inset-0 z-30 bg-gray-900/50 lg:hidden hidden" onclick="toggleSidebar()"></div>

<!-- Mobile menu button -->
<button type="button" class="fixed top-4 left-4 z-50 lg:hidden p-2 text-gray-500 rounded-lg bg-white dark:bg-gray-800 shadow-lg hover:bg-gray-100 dark:hover:bg-gray-700" onclick="toggleSidebar()">
    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"></path>
    </svg>
</button>

<script>
    function toggleSidebar() {
        const sidebar = document.getElementById('sidebar');
        const backdrop = document.getElementById('sidebar-backdrop');

        sidebar.classList.toggle('-translate-x-full');
        backdrop.classList.toggle('hidden');
    }
</script>
@endif