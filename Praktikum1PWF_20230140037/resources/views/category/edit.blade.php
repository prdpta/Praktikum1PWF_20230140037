<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-200 leading-tight">
            {{ __('Edit Category') }}
        </h2>
    </x-slot>

    <div class="py-12 bg-gray-900 min-h-screen">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-gray-800 border border-gray-700 overflow-hidden shadow-2xl sm:rounded-2xl p-6">
                
                {{-- Form Edit Kategori --}}
                <form action="{{ route('category.update', $category->id) }}" method="POST">
                    @csrf
                    @method('PUT')
                    
                    <div class="mb-6">
                        <label for="name" class="block text-gray-400 text-sm font-bold mb-2">
                            Category Name
                        </label>
                        <input type="text" 
                               name="name" 
                               id="name"
                               value="{{ old('name', $category->name) }}"
                               class="w-full bg-gray-700 border border-gray-600 rounded-lg py-2 px-4 text-white focus:outline-none focus:border-indigo-500 @error('name') border-red-500 @enderror" 
                               required>
                        
                        {{-- Pesan Error Validasi --}}
                        @error('name')
                            <p class="mt-2 text-sm text-red-500">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="flex justify-end items-center gap-4">
                        <a href="{{ route('category.index') }}" class="text-gray-400 hover:text-white transition duration-200">
                            Cancel
                        </a>
                        <button type="submit" class="bg-yellow-600 hover:bg-yellow-500 text-white px-6 py-2 rounded-lg font-bold shadow-lg transition-all duration-200 transform hover:scale-105">
                            Update Category
                        </button>
                    </div>
                </form>

            </div>
        </div>
    </div>
</x-app-layout>