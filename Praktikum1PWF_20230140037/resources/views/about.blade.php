<x-app-layout>
    <x-slot name="header">
        <h2 class="font-black text-2xl text-white leading-tight uppercase tracking-[0.15em]">
            {{ __('Developer Profile') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-4xl mx-auto sm:px-6 lg:px-8">
            <div class="glass-card overflow-hidden sm:rounded-[2.5rem] relative">
                <!-- Background Decoration -->
                <div class="absolute top-0 right-0 w-64 h-64 bg-indigo-500/10 rounded-full blur-[80px] -mr-32 -mt-32"></div>
                <div class="absolute bottom-0 left-0 w-48 h-48 bg-purple-500/10 rounded-full blur-[60px] -ml-24 -mb-24"></div>

                <div class="p-10 md:p-16 relative z-10">
                    <div class="flex flex-col md:flex-row items-center gap-12">
                        <!-- Profile Image Placeholder -->
                        <div class="shrink-0">
                            <div class="w-48 h-48 rounded-[2.5rem] bg-gradient-to-br from-indigo-500 to-purple-600 p-1.5 shadow-2xl shadow-indigo-500/20 rotate-3 hover:rotate-0 transition-all duration-500">
                                <div class="w-full h-full rounded-[2rem] bg-slate-900 flex items-center justify-center text-6xl">
                                    👨‍💻
                                </div>
                            </div>
                        </div>

                        <!-- Info Content -->
                        <div class="flex-1 text-center md:text-left">
                            <h1 class="text-4xl font-black text-white tracking-tight mb-2">Pradipta Pratama Putra</h1>
                            <p class="text-indigo-400 font-bold text-lg uppercase tracking-widest mb-8">Fullstack Developer</p>
                            
                            <div class="grid grid-cols-1 sm:grid-cols-2 gap-8">
                                <div class="space-y-1">
                                    <p class="text-slate-500 text-xs font-black uppercase tracking-widest">NIM</p>
                                    <p class="text-white text-xl font-bold font-mono">20230140037</p>
                                </div>
                                <div class="space-y-1">
                                    <p class="text-slate-500 text-xs font-black uppercase tracking-widest">Program Studi</p>
                                    <p class="text-white text-xl font-bold">Teknologi Informasi</p>
                                </div>
                                <div class="space-y-1">
                                    <p class="text-slate-500 text-xs font-black uppercase tracking-widest">Hobi</p>
                                    <p class="text-white text-xl font-bold italic">Coding & Kulineran</p>
                                </div>
                                <div class="space-y-1">
                                    <p class="text-slate-500 text-xs font-black uppercase tracking-widest">Status</p>
                                    <p class="text-emerald-400 text-xl font-bold flex items-center justify-center md:justify-start gap-2">
                                        <span class="w-2 h-2 bg-emerald-500 rounded-full animate-pulse"></span>
                                        Available for Project
                                    </p>
                                </div>
                            </div>

                            <div class="mt-12 flex justify-center md:justify-start gap-4">
                                <button class="p-3 rounded-2xl bg-slate-800 text-slate-400 hover:text-white hover:bg-indigo-600 transition-all duration-300">
                                    <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 24 24"><path d="M12 0c-6.626 0-12 5.373-12 12 0 5.302 3.438 9.8 8.205 11.385.6.113.82-.258.82-.577 0-.285-.01-1.04-.015-2.04-3.338.724-4.042-1.61-4.042-1.61C4.422 18.07 3.633 17.7 3.633 17.7c-1.087-.744.084-.729.084-.729 1.205.084 1.838 1.236 1.838 1.236 1.07 1.835 2.809 1.305 3.495.998.108-.776.417-1.305.76-1.605-2.665-.3-5.466-1.332-5.466-5.93 0-1.31.465-2.38 1.235-3.22-.135-.303-.54-1.523.105-3.176 0 0 1.005-.322 3.3 1.23.96-.267 1.98-.399 3-.405 1.02.006 2.04.138 3 .405 2.28-1.552 3.285-1.23 3.285-1.23.645 1.653.24 2.873.12 3.176.765.84 1.23 1.91 1.23 3.22 0 4.61-2.805 5.625-5.475 5.92.43.372.82 1.102.82 2.222 0 1.606-.015 2.896-.015 3.286 0 .315.21.69.825.57C20.565 21.795 24 17.298 24 12c0-6.627-5.373-12-12-12z"/></svg>
                                </button>
                                <button class="p-3 rounded-2xl bg-slate-800 text-slate-400 hover:text-white hover:bg-blue-600 transition-all duration-300">
                                    <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 24 24"><path d="M19 0h-14c-2.761 0-5 2.239-5 5v14c0 2.761 2.239 5 5 5h14c2.761 0 5-2.239 5-5v-14c0-2.761-2.239-5-5-5zm-11 19h-3v-11h3v11zm-1.5-12.268c-.966 0-1.75-.79-1.75-1.764s.784-1.764 1.75-1.764 1.75.79 1.75 1.764-.783 1.764-1.75 1.764zm13.5 12.268h-3v-5.604c0-3.368-4-3.113-4 0v5.604h-3v-11h3v1.765c1.396-2.586 7-2.777 7 2.476v6.759z"/></svg>
                                </button>
                                <button class="p-3 rounded-2xl bg-slate-800 text-slate-400 hover:text-white hover:bg-rose-600 transition-all duration-300">
                                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" /></svg>
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>