<x-app-layout>
    <x-slot name="header">
        <div class="flex flex-col md:flex-row justify-between items-start md:items-center gap-4">
            <div>
                <h2 class="font-black text-3xl text-white tracking-tight leading-tight">Product <span class="text-indigo-500">Inventory</span></h2>
                <p class="text-slate-400 mt-1">Kelola stok dan detail produk Anda secara efisien.</p>
            </div>
            {{-- Tombol muncul jika login sebagai admin --}}
            @can('admin')
                <a href="{{ route('product.create') }}" class="btn-primary flex items-center gap-2">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4" /></svg>
                    <span>Tambah Produk</span>
                </a>
            @endcan
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="glass-card overflow-hidden sm:rounded-[2rem] border border-slate-800/50 shadow-2xl">
                <div class="overflow-x-auto">
                    <table class="w-full text-left border-collapse">
                        <thead>
                            <tr class="bg-slate-800/50 text-slate-500 text-xs uppercase tracking-[0.2em] font-black">
                                <th class="px-8 py-6">ID</th>
                                <th class="px-8 py-6">Informasi Produk</th>
                                <th class="px-8 py-6">Kategori</th>
                                <th class="px-8 py-6">Stok</th>
                                <th class="px-8 py-6">Harga</th>
                                <th class="px-8 py-6 text-center">Aksi</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-slate-800/50">
                            @forelse ($products as $product)
                                <tr class="hover:bg-slate-700/20 transition-all duration-300 group">
                                    <td class="px-8 py-6">
                                        <span class="text-slate-600 font-mono text-sm">#{{ str_pad($loop->iteration, 3, '0', STR_PAD_LEFT) }}</span>
                                    </td>
                                    <td class="px-8 py-6">
                                        <div class="flex items-center gap-4">
                                            <div class="w-12 h-12 rounded-2xl bg-gradient-to-br from-slate-700 to-slate-800 border border-slate-600 flex items-center justify-center text-xl shadow-inner group-hover:scale-110 transition-transform duration-500">
                                                📦
                                            </div>
                                            <div>
                                                <div class="text-white font-bold text-lg leading-tight">{{ $product->name }}</div>
                                                <div class="text-slate-500 text-xs mt-1 flex items-center gap-1">
                                                    <svg class="w-3 h-3" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/></svg>
                                                    {{ $product->user->name ?? 'System' }}
                                                </div>
                                            </div>
                                        </div>
                                    </td>
                                    <td class="px-8 py-6">
                                        <span class="text-slate-300 font-medium bg-slate-800/80 px-3 py-1 rounded-lg border border-slate-700/50 text-sm">
                                            {{ $product->category->name ?? 'Uncategorized' }}
                                        </span>
                                    </td>
                                    <td class="px-8 py-6">
                                        <div class="flex flex-col gap-1">
                                            <span class="text-white font-bold">{{ $product->quantity }} <span class="text-slate-500 font-normal text-xs uppercase tracking-tighter ml-1">Unit</span></span>
                                            <div class="w-20 h-1.5 bg-slate-800 rounded-full overflow-hidden mt-1">
                                                <div class="h-full {{ $product->quantity < 5 ? 'bg-rose-500' : 'bg-emerald-500' }}" style="width: {{ min(($product->quantity / 50) * 100, 100) }}%"></div>
                                            </div>
                                        </div>
                                    </td>
                                    <td class="px-8 py-6">
                                        <span class="text-indigo-400 font-black text-lg">Rp {{ number_format($product->price, 0, ',', '.') }}</span>
                                    </td>
                                    <td class="px-8 py-6">
                                        <div class="flex justify-center items-center gap-3">
                                            <a href="{{ route('product.show', $product->id) }}" class="p-2.5 rounded-xl bg-slate-800/80 text-slate-400 hover:text-white hover:bg-indigo-600 transition-all duration-300" title="Detail">
                                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" /><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" /></svg>
                                            </a>

                                            @can('update', $product)
                                            <a href="{{ route('product.edit', $product->id) }}" class="p-2.5 rounded-xl bg-slate-800/80 text-slate-400 hover:text-white hover:bg-amber-600 transition-all duration-300" title="Edit">
                                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" /></svg>
                                            </a>
                                            @endcan

                                            @can('delete', $product)
                                            <form action="{{ route('product.destroy', $product->id) }}" method="POST" onsubmit="return confirm('Apakah Anda yakin ingin menghapus produk ini?')">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="p-2.5 rounded-xl bg-slate-800/80 text-slate-400 hover:text-white hover:bg-rose-600 transition-all duration-300" title="Hapus">
                                                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" /></svg>
                                                </button>
                                            </form>
                                            @endcan
                                        </div>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="6" class="px-8 py-20 text-center">
                                        <div class="flex flex-col items-center opacity-30">
                                            <svg class="w-16 h-16 mb-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1" d="M20 13V6a2 2 0 00-2-2H6a2 2 0 00-2 2v7m16 0v5a2 2 0 01-2 2H6a2 2 0 01-2-2v-5m16 0h-2.586a1 1 0 00-.707.293l-2.414 2.414a1 1 0 01-.707.293h-3.172a1 1 0 01-.707-.293l-2.414-2.414A1 1 0 006.586 13H4" /></svg>
                                            <p class="text-xl font-medium tracking-tight">Belum ada produk yang terdaftar.</p>
                                        </div>
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