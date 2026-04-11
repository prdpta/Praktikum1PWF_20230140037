<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('About Me') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-8 text-gray-900 dark:text-gray-100">
                    <div class="space-y-4">
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-4 border-b pb-4 border-gray-200 dark:border-gray-700">
                            <span class="font-bold text-gray-600 dark:text-gray-400">Nama:</span>
                            <span class="text-lg">Pradipta Pratama Putra</span>
                        </div>
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-4 border-b pb-4 border-gray-200 dark:border-gray-700">
                            <span class="font-bold text-gray-600 dark:text-gray-400">NIM:</span>
                            <span class="text-lg text-indigo-600 font-semibold">20230140037</span>
                        </div>
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-4 border-b pb-4 border-gray-200 dark:border-gray-700">
                            <span class="font-bold text-gray-600 dark:text-gray-400">Program Studi:</span>
                            <span class="text-lg">Teknologi Informasi</span>
                        </div>
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                            <span class="font-bold text-gray-600 dark:text-gray-400">Hobi:</span>
                            <span class="text-lg">Coding & Kulineran</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>