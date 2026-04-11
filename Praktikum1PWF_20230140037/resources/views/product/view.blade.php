<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Product Detail') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg p-6 text-gray-900 dark:text-gray-100">
                <div class="mb-6">
                    <a href="{{ route('product.index') }}" class="text-indigo-600 hover:text-indigo-900 text-sm">← Back to List</a>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <div class="space-y-4">
                        <div>
                            <h3 class="text-sm font-medium text-gray-500">Product Name</h3>
                            <p class="text-lg font-bold">{{ $product->name }}</p>
                        </div>
                        <div>
                            <h3 class="text-sm font-medium text-gray-500">Quantity</h3>
                            <p class="text-lg">{{ $product->quantity }} pcs</p>
                        </div>
                        <div>
                            <h3 class="text-sm font-medium text-gray-500">Price</h3>
                            <p class="text-lg">Rp {{ number_format($product->price, 0, ',', '.') }}</p>
                        </div>
                        <div>
                            <h3 class="text-sm font-medium text-gray-500">Owner</h3>
                            <p class="text-lg">{{ $product->user->name }}</p>
                        </div>
                    </div>

                    <div class="flex items-start justify-end gap-2">
                        @can('update', $product)
                            <a href="{{ route('product.edit', $product->id) }}" class="bg-green-600 text-white px-4 py-2 rounded shadow hover:bg-green-700">Edit</a>
                        @endcan
                        @can('delete', $product)
                            <form action="{{ route('product.delete', $product->id) }}" method="POST" onsubmit="return confirm('Yakin hapus?')">
                                @csrf
                                @method('DELETE')
                                <button class="bg-red-600 text-white px-4 py-2 rounded shadow hover:bg-red-700">Delete</button>
                            </form>
                        @endcan
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>