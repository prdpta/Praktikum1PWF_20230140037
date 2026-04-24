<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-200 leading-tight uppercase">
            {{ __('Product Detail') }}
        </h2>
    </x-slot>

    <div class="py-12 min-h-screen bg-gray-900">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-gray-800 p-10 rounded-2xl border border-gray-700 shadow-2xl flex justify-between items-start">
                
                <div class="space-y-8 w-full mr-10">
                    <div>
                        <a href="{{ route('product.index') }}" class="text-indigo-400 hover:text-indigo-300 flex items-center gap-1 font-medium text-sm transition">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18" />
                            </svg>
                            Back to List
                        </a>
                    </div>

                    <div class="border-b border-gray-700 pb-4">
                        <p class="text-gray-500 text-xs uppercase font-bold tracking-widest mb-1">Product Name</p>
                        <h3 class="text-xl text-white uppercase">{{ $product->name }}</h3>
                    </div>

                    <div class="border-b border-gray-700 pb-4 flex justify-between items-center">
                        <div>
                            <p class="text-gray-500 text-xs uppercase font-bold tracking-widest mb-1">Quantity</p>
                            <span class="bg-green-900/50 text-green-400 px-3 py-1 rounded-full text-xs font-bold border border-green-800">
                                {{ $product->quantity }} In Stock
                            </span>
                        </div>
                    </div>

                    <div class="border-b border-gray-700 pb-4">
                        <p class="text-gray-500 text-xs uppercase font-bold tracking-widest mb-1">Price</p>
                        <p class="text-xl text-gray-200">Rp {{ number_format($product->price, 0, ',', '.') }}</p>
                    </div>

                    <div class="border-b border-gray-700 pb-4">
                        <p class="text-gray-500 text-xs uppercase font-bold tracking-widest mb-1">Owner</p>
                        <p class="text-xl text-gray-200">{{ $product->user->name ?? 'Pradipta Putra' }}</p>
                    </div>

                    <div class="border-b border-gray-700 pb-4">
                        <p class="text-gray-500 text-xs uppercase font-bold tracking-widest mb-1">Created At</p>
                        <p class="text-lg text-gray-300">{{ $product->created_at->format('d M Y, H:i') }}</p>
                    </div>

                    <div class="pb-4">
                        <p class="text-gray-500 text-xs uppercase font-bold tracking-widest mb-1">Updated At</p>
                        <p class="text-lg text-gray-300">{{ $product->updated_at->format('d M Y, H:i') }}</p>
                    </div>
                </div>

                <div class="flex gap-3">
                    @can('update', $product)
                        <a href="{{ route('product.edit', $product->id) }}" class="bg-green-600 hover:bg-green-500 text-white px-6 py-2 rounded-lg font-bold transition flex items-center gap-2">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/></svg>
                            Edit
                        </a>
                    @endcan
                    
                    @can('delete', $product)
                        <form action="{{ route('product.destroy', $product->id) }}" method="POST" onsubmit="return confirm('Apakah Anda yakin ingin menghapus produk ini?')">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="bg-red-600 hover:bg-red-500 text-white px-6 py-2 rounded-lg font-bold transition flex items-center gap-2">
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/></svg>
                                Delete
                            </button>
                        </form>
                    @endcan
                </div>

            </div>
        </div>
    </div>
</x-app-layout>