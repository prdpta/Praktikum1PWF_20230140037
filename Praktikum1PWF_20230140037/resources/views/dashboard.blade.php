<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg p-6">
                
                <div class="text-gray-900 dark:text-gray-100 text-2xl font-bold mb-4">
                    {{-- Mengecek role user --}}
                    @if(Auth::user()->role === 'admin')
                        Role : Admin
                    @else
                        Role : User
                    @endif
                </div>

                <div class="text-gray-600 dark:text-gray-400">
                    {{ __("You're logged in!") }}
                </div>

            </div>
        </div>
    </div>
</x-app-layout>