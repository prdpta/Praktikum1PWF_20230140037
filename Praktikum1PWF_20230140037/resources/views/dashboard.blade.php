<x-app-layout>
    <x-slot name="header">
        <h2 class="font-bold text-2xl text-white leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="glass-card overflow-hidden sm:rounded-3xl p-8 md:p-12 relative">
                <!-- Decorative element -->
                <div class="absolute -top-24 -right-24 w-64 h-64 bg-indigo-500/10 rounded-full blur-3xl pointer-events-none"></div>
                
                <div class="relative z-10">
                    <div class="flex items-center gap-6 mb-8">
                        <div class="w-20 h-20 bg-gradient-to-br from-indigo-500 to-purple-600 rounded-3xl flex items-center justify-center shadow-2xl shadow-indigo-500/20 text-3xl transform -rotate-3 hover:rotate-0 transition-transform duration-300">
                            👋
                        </div>
                        <div>
                            <h1 class="text-4xl font-black text-white tracking-tight">Selamat Datang, <span class="text-transparent bg-clip-text bg-gradient-to-r from-indigo-400 to-purple-400">{{ Auth::user()->name }}</span>!</h1>
                            <p class="text-slate-400 mt-2 text-lg">Kelola produk dan kategori Anda dengan sistem yang lebih modern.</p>
                        </div>
                    </div>

                    <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mt-12">
                        <div class="p-8 bg-slate-800/40 border border-slate-700/50 rounded-[2rem] hover:bg-slate-800/60 hover:border-indigo-500/50 transition-all duration-500 group">
                            <div class="w-12 h-12 bg-indigo-500/10 rounded-xl flex items-center justify-center mb-6 group-hover:scale-110 transition-transform duration-500">
                                <svg class="w-6 h-6 text-indigo-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" /></svg>
                            </div>
                            <h3 class="text-slate-500 text-sm font-bold uppercase tracking-widest mb-2">Peran Anda</h3>
                            <div class="flex items-center gap-3">
                                <span class="px-4 py-1 rounded-full {{ Auth::user()->role === 'admin' ? 'bg-indigo-500/20 text-indigo-400 border border-indigo-500/30' : 'bg-emerald-500/20 text-emerald-400 border border-emerald-500/30' }} text-xs font-black uppercase tracking-tighter">
                                    {{ Auth::user()->role }}
                                </span>
                            </div>
                        </div>

                        <div class="p-8 bg-slate-800/40 border border-slate-700/50 rounded-[2rem] hover:bg-slate-800/60 hover:border-indigo-500/50 transition-all duration-500 group">
                            <div class="w-12 h-12 bg-emerald-500/10 rounded-xl flex items-center justify-center mb-6 group-hover:scale-110 transition-transform duration-500">
                                <svg class="w-6 h-6 text-emerald-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" /></svg>
                            </div>
                            <h3 class="text-slate-500 text-sm font-bold uppercase tracking-widest mb-2">Status Akun</h3>
                            <p class="text-white text-xl font-bold italic tracking-tight">Verified & Active</p>
                        </div>

                        <div class="p-8 bg-slate-800/40 border border-slate-700/50 rounded-[2rem] hover:bg-slate-800/60 hover:border-indigo-500/50 transition-all duration-500 group">
                            <div class="w-12 h-12 bg-amber-500/10 rounded-xl flex items-center justify-center mb-6 group-hover:scale-110 transition-transform duration-500">
                                <svg class="w-6 h-6 text-amber-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" /></svg>
                            </div>
                            <h3 class="text-slate-500 text-sm font-bold uppercase tracking-widest mb-2">Sesi Saat Ini</h3>
                            <p class="text-white text-xl font-bold tracking-tight">{{ now()->format('l, d M Y') }}</p>
                        </div>
                    </div>

                    <div class="mt-12 flex flex-wrap gap-4">
                        <a href="{{ route('product.index') }}" class="btn-primary flex items-center gap-2">
                            <span>Mulai Kelola Produk</span>
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3" /></svg>
                        </a>
                        <a href="{{ route('about') }}" class="px-8 py-3 rounded-2xl border border-slate-700 text-slate-300 font-bold hover:bg-slate-800 hover:text-white transition-all duration-300 flex items-center gap-2">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" /></svg>
                            <span>Info Pengembang</span>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>