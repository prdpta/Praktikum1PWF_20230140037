<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-200 leading-tight uppercase">
            {{ __('Product Detail') }}
        </h2>
    </x-slot>

    <div class="py-12 min-h-screen bg-gray-900">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-gray-800 p-10 rounded-2xl border border-gray-700 shadow-2xl flex justify-between items-start">
                
                <div class="space-y-8">
                    <div>
                        <a href="{{ route('product.index') }}" class="text-indigo-400 hover:text-indigo-300 flex items-center gap-1 font-medium text-sm transition">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18" />
                            </svg>
                            Back to List
                        </a>
                    </div>

                    <div>
                        <p class="text-gray-500 text-xs uppercase font-bold tracking-widest mb-1">Product Name</p>
                        <h3 class="text-xl text-white uppercase">{{ $product->name }}</h3>
                    </div>

                    <div>
                        <p class="text-gray-500 text-xs uppercase font-bold tracking-widest mb-1">Quantity</p>
                        <p class="text-xl text-gray-200">{{ $product->quantity }} pcs</p>
                    </div>

                    <div>
                        <p class="text-gray-500 text-xs uppercase font-bold tracking-widest mb-1">Price</p>
                        <p class="text-xl text-gray-200">Rp {{ number_format($product->price, 0, ',', '.') }}</p>
                    </div>

                    <div>
                        <p class="text-gray-500 text-xs uppercase font-bold tracking-widest mb-1">Owner</p>
                        <p class="text-xl text-gray-200">{{ $product->user->name ?? 'Pradipta Putra' }}</p>
                    </div>
                </div>

                <div class="flex gap-3">
                    @can('update', $product)
                        <a href="{{ route('product.edit', $product->id) }}" class="bg-green-600 hover:bg-green-500 text-white px-6 py-2 rounded-lg font-bold transition">
                            Edit
                        </a>
                    @endcan
                    
                    @can('delete', $product)
                        <form action="{{ route('product.destroy', $product->id) }}" method="POST" onsubmit="return confirm('Apakah Anda yakin ingin menghapus produk ini?')">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="bg-red-600 hover:bg-red-500 text-white px-6 py-2 rounded-lg font-bold transition">
                                Delete
                            </button>
                        </form>
                    @endcan
                </div>

            </div>
        </div>
    </div>
</x-app-layout>