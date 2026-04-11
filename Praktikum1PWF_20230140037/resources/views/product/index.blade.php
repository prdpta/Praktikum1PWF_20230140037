<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between items-center">
            <h2 class="font-semibold text-xl text-gray-200 leading-tight">Product Management</h2>
            @can('manage-product')
                <a href="{{ route('product.create') }}" class="bg-indigo-600 hover:bg-indigo-500 text-white px-5 py-2.5 rounded-xl text-sm font-bold shadow-lg transition-all duration-200 transform hover:scale-105">
                    + Add New Product
                </a>
            @endcan
        </div>
    </x-slot>

    <div class="py-12 bg-gray-900 min-h-screen">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-gray-800 overflow-hidden shadow-2xl sm:rounded-2xl border border-gray-700">
                <table class="w-full text-left border-collapse">
                    <thead class="bg-gray-700/50 text-gray-400 text-xs uppercase tracking-widest">
                        <tr>
                            <th class="px-6 py-5">#</th>
                            <th class="px-6 py-5">Product Name</th>
                            <th class="px-6 py-5">Stock</th>
                            <th class="px-6 py-5">Price</th>
                            <th class="px-6 py-5">Owner</th>
                            <th class="px-6 py-5 text-center">Actions</th>
                        </tr>
                    </thead>
                    <tbody class="text-gray-300 divide-y divide-gray-700">
                        @forelse ($products as $product)
                            <tr class="hover:bg-gray-700/30 transition-colors duration-200">
                                <td class="px-6 py-4 text-sm font-medium text-gray-500">{{ $loop->iteration }}</td>
                                <td class="px-6 py-4 font-bold text-white">{{ $product->name }}</td>
                                <td class="px-6 py-4">
                                    <span class="px-3 py-1 rounded-full text-xs font-semibold {{ $product->quantity < 5 ? 'bg-red-900/40 text-red-400 border border-red-800' : 'bg-green-900/40 text-green-400 border border-green-800' }}">
                                        {{ $product->quantity }} Pcs
                                    </span>
                                </td>
                                <td class="px-6 py-4 font-mono text-gray-400 text-sm">Rp {{ number_format($product->price, 0, ',', '.') }}</td>
                                <td class="px-6 py-4">
                                    <div class="flex items-center gap-2">
                                        <div class="w-7 h-7 rounded-full bg-indigo-900/50 flex items-center justify-center text-[10px] text-indigo-300 border border-indigo-700">
                                            {{ strtoupper(substr($product->user->name ?? 'S', 0, 1)) }}
                                        </div>
                                        <span class="text-sm italic text-gray-400">{{ $product->user->name ?? 'System' }}</span>
                                    </div>
                                </td>
                                <td class="px-6 py-4">
                                    <div class="flex justify-center items-center gap-2">
                                        <a href="{{ route('product.show', $product->id) }}" class="p-2 rounded-lg text-gray-400 hover:text-blue-400 hover:bg-blue-900/30 transition-all" title="View Detail">
                                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"/></svg>
                                        </a>

                                        @can('update', $product)
                                        <a href="{{ route('product.edit', $product->id) }}" class="p-2 rounded-lg text-gray-400 hover:text-yellow-400 hover:bg-yellow-900/30 transition-all" title="Edit Product">
                                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15.232 5.232l3.536 3.536m-2.036-5.036a2.5 2.5 0 113.536 3.536L6.5 21.036H3v-3.572L16.732 3.732z"/></svg>
                                        </a>
                                        @endcan

                                        @can('delete', $product)
                                        <form action="{{ route('product.delete', $product->id) }}" method="POST" onsubmit="return confirm('Are you sure?')">
                                            @csrf @method('DELETE')
                                            <button type="submit" class="p-2 rounded-lg text-gray-400 hover:text-red-500 hover:bg-red-900/30 transition-all" title="Delete Product">
                                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"/></svg>
                                            </button>
                                        </form>
                                        @endcan
                                    </div>
                                </td>
                            </tr>
                        @empty
                            <tr><td colspan="6" class="px-6 py-12 text-center text-gray-500 italic">No products available at the moment.</td></tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</x-app-layout>