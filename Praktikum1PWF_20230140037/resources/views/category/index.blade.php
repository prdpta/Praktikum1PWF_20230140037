<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-200 leading-tight">
            {{ __('Category Management') }}
        </h2>
    </x-slot>

    <div class="py-12 bg-gray-900 min-h-screen">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-gray-800 border border-gray-700 overflow-hidden shadow-2xl sm:rounded-2xl p-6">
                
                {{-- Bagian Header Tabel --}}
                <div class="flex justify-between items-center mb-6">
                    <div>
                        <h3 class="text-lg font-medium text-white">All Categories</h3>
                        <p class="text-sm text-gray-400">Manage and organize your product categories.</p>
                    </div>
                    <a href="{{ route('category.create') }}" class="inline-flex items-center px-4 py-2 bg-indigo-600 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-indigo-700 active:bg-indigo-900 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 transition ease-in-out duration-150">
                        + Add Category
                    </a>
                </div>

                {{-- Notifikasi Sukses --}}
                @if(session('success'))
                    <div class="mb-4 p-4 bg-green-900/40 border border-green-800 text-green-400 rounded-lg">
                        {{ session('success') }}
                    </div>
                @endif

                {{-- Notifikasi Error --}}
                @if(session('error'))
                    <div class="mb-4 p-4 bg-red-900/40 border border-red-800 text-red-400 rounded-lg">
                        {{ session('error') }}
                    </div>
                @endif

                {{-- Tabel Kategori --}}
                <div class="overflow-x-auto">
                    <table class="w-full text-left border-collapse text-gray-300">
                        <thead class="bg-gray-700/50 text-gray-400 text-xs uppercase tracking-widest">
                            <tr>
                                <th class="py-4 px-6 font-semibold border-b border-gray-700">Name</th>
                                <th class="py-4 px-6 font-semibold border-b border-gray-700 text-center">Total Products</th>
                                <th class="py-4 px-6 font-semibold border-b border-gray-700 text-center">Action</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-gray-700">
                            @forelse($categories as $category)
                            <tr class="hover:bg-gray-700/30 transition duration-150">
                                <td class="py-4 px-6 font-bold text-white uppercase">{{ $category->name }}</td>
                                <td class="py-4 px-6 text-center">
                                    <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-blue-900/40 text-blue-400 border border-blue-800">
                                        {{ $category->products_count }} Products
                                    </span>
                                </td>
                                <td class="py-4 px-6">
                                    <div class="flex justify-center items-center gap-4">
                                        {{-- Tombol Edit --}}
                                        <a href="{{ route('category.edit', $category->id) }}" class="text-gray-400 hover:text-yellow-500 transition" title="Edit Category">
                                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15.232 5.232l3.536 3.536m-2.036-5.036a2.5 2.5 0 113.536 3.536L6.5 21.036H3v-3.572L16.732 3.732z" />
                                            </svg>
                                        </a>

                                        {{-- Tombol Delete --}}
                                        <form action="{{ route('category.destroy', $category->id) }}" method="POST" onsubmit="return confirm('Yakin ingin menghapus kategori ini?')">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="text-gray-400 hover:text-red-500 transition" title="Delete Category">
                                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                                                </svg>
                                            </button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                            @empty
                            <tr>
                                <td colspan="3" class="py-12 text-center text-gray-500 italic">
                                    No categories found. Click "+ Add Category" to create one.
                                </td>
                            </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
                
            </div>
        </div>
    </div>
</x-app-layout>