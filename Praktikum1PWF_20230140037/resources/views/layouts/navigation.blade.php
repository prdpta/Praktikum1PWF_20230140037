<nav x-data="{ open: false }" class="sticky top-0 z-50 bg-slate-900/60 backdrop-blur-lg border-b border-slate-800/50">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between h-20">
            <div class="flex items-center">
                <!-- Logo -->
                <div class="shrink-0 flex items-center">
                    <a href="{{ route('dashboard') }}" class="flex items-center gap-3 group">
                        <div class="p-2 bg-indigo-600 rounded-xl group-hover:rotate-12 transition-transform duration-300 shadow-lg shadow-indigo-500/20">
                            <x-application-logo class="block h-6 w-auto fill-current text-white" />
                        </div>
                        <span class="font-bold text-xl tracking-tight text-white">MY<span class="text-indigo-500">STORE</span></span>
                    </a>
                </div>

                <!-- Navigation Links -->
                <div class="hidden space-x-4 sm:-my-px sm:ms-10 sm:flex">
                    <x-nav-link :href="route('dashboard')" :active="request()->routeIs('dashboard')" class="text-sm font-medium hover:text-white transition-colors duration-200">
                        {{ __('Dashboard') }}
                    </x-nav-link>

                    <x-nav-link :href="route('product.index')" :active="request()->routeIs('product.*')" class="text-sm font-medium hover:text-white transition-colors duration-200">
                        {{ __('Products') }}
                    </x-nav-link>

                    @can('admin')
                    <x-nav-link :href="route('category.index')" :active="request()->routeIs('category.*')" class="text-sm font-medium hover:text-white transition-colors duration-200">
                        {{ __('Categories') }}
                    </x-nav-link>
                    @endcan

                    <x-nav-link :href="route('about')" :active="request()->routeIs('about')" class="text-sm font-medium hover:text-white transition-colors duration-200">
                        {{ __('About') }}
                    </x-nav-link>
                </div>
            </div>

            <!-- Settings Dropdown -->
            <div class="hidden sm:flex sm:items-center sm:ms-6">
                <x-dropdown align="right" width="48">
                    <x-slot name="trigger">
                        <button class="inline-flex items-center px-4 py-2 bg-slate-800/50 border border-slate-700/50 rounded-xl text-sm leading-4 font-medium text-slate-300 hover:text-white hover:bg-slate-700/50 transition-all duration-200 focus:outline-none">
                            <div class="flex items-center gap-2">
                                <div class="w-2 h-2 rounded-full {{ Auth::user()->role === 'admin' ? 'bg-indigo-500' : 'bg-emerald-500' }}"></div>
                                <span>{{ Auth::user()->name }}</span>
                            </div>

                            <div class="ms-2">
                                <svg class="fill-current h-4 w-4 opacity-50" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                                </svg>
                            </div>
                        </button>
                    </x-slot>

                    <x-slot name="content">
                        <x-dropdown-link :href="route('profile.edit')">
                            {{ __('Profile') }}
                        </x-dropdown-link>

                        <form method="POST" action="{{ route('logout') }}">
                            @csrf
                            <x-dropdown-link :href="route('logout')"
                                    onclick="event.preventDefault();
                                                this.closest('form').submit();">
                                {{ __('Log Out') }}
                            </x-dropdown-link>
                        </form>
                    </x-slot>
                </x-dropdown>
            </div>

            <!-- Hamburger -->
            <div class="-me-2 flex items-center sm:hidden">
                <button @click="open = ! open" class="inline-flex items-center justify-center p-2 rounded-xl text-slate-400 hover:text-white hover:bg-slate-800/50 transition duration-150">
                    <svg class="h-6 w-6" stroke="currentColor" fill="none" viewBox="0 0 24 24">
                        <path :class="{'hidden': open, 'inline-flex': ! open }" class="inline-flex" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                        <path :class="{'hidden': ! open, 'inline-flex': open }" class="hidden" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>
        </div>
    </div>

    <!-- Responsive Navigation Menu -->
    <div :class="{'block': open, 'hidden': ! open}" class="hidden sm:hidden bg-slate-900 border-b border-slate-800">
        <div class="pt-2 pb-3 space-y-1 px-4">
            <x-responsive-nav-link :href="route('dashboard')" :active="request()->routeIs('dashboard')">
                {{ __('Dashboard') }}
            </x-responsive-nav-link>
            <x-responsive-nav-link :href="route('product.index')" :active="request()->routeIs('product.*')">
                {{ __('Product') }}
            </x-responsive-nav-link>
            
            @can('admin')
            <x-responsive-nav-link :href="route('category.index')" :active="request()->routeIs('category.*')">
                {{ __('Category') }}
            </x-responsive-nav-link>
            @endcan

            <x-responsive-nav-link :href="route('about')" :active="request()->routeIs('about')">
                {{ __('About Me') }}
            </x-responsive-nav-link>
        </div>

        <div class="pt-4 pb-1 border-t border-slate-800">
            <div class="px-6 py-4 bg-slate-800/30 rounded-t-2xl mx-4 mb-4">
                <div class="font-bold text-white">{{ Auth::user()->name }}</div>
                <div class="text-sm text-slate-400">{{ Auth::user()->email }}</div>
            </div>

            <div class="px-4 space-y-1 mb-4">
                <x-responsive-nav-link :href="route('profile.edit')">
                    {{ __('Profile') }}
                </x-responsive-nav-link>

                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <x-responsive-nav-link :href="route('logout')"
                            onclick="event.preventDefault();
                                        this.closest('form').submit();">
                        {{ __('Log Out') }}
                    </x-responsive-nav-link>
                </form>
            </div>
        </div>
    </div>
</nav>