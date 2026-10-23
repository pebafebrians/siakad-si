<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ $title ?? 'Dashboard' }} — {{ config('app.name') }}</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="font-sans antialiased bg-[#f8fafc] flex h-screen overflow-hidden">

    <!-- ================= SIDEBAR KIRI ================= -->
    <aside class="w-64 bg-[#0f2547] text-white flex flex-col justify-between hidden md:flex flex-shrink-0">
        <!-- Logo Atas -->
        <div class="p-6 flex items-center gap-3 border-b border-white/10">
            <div class="w-10 h-10 bg-white/10 rounded-lg flex items-center justify-center border border-white/20">
                <svg class="w-5 h-5 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"></path></svg>
            </div>
            <div>
                <h1 class="font-bold text-lg leading-tight m-0 tracking-wide">SIAKAD</h1>
                <p class="text-[10px] text-blue-300 tracking-widest uppercase m-0">Sistem Informasi<br>Akademik</p>
            </div>
        </div>

        <!-- Menu Navigasi -->
        <div class="flex-1 overflow-y-auto py-6 px-4">
            <p class="text-xs text-blue-300/70 uppercase tracking-wider mb-4 px-2">Menu {{ ucfirst(auth()->user()->role) }}</p>
            <nav class="space-y-1">
                <!-- Menu Aktif -->
                <a href="#" class="flex items-center gap-3 px-3 py-2.5 bg-white/10 rounded-lg text-white text-sm font-medium">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"></path></svg>
                    Beranda
                </a>

                <!-- Menu Statis Contoh (Bisa disesuaikan per role nanti) -->
                <a href="#" class="flex items-center gap-3 px-3 py-2.5 text-blue-100 hover:bg-white/5 rounded-lg text-sm transition-colors">
                    <svg class="w-5 h-5 opacity-70" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z"></path></svg>
                    Data Pengguna
                </a>
            </nav>
        </div>

        <!-- Kotak Info Bawah Sidebar -->
        <div class="p-4 m-4 bg-[#1a3c6e] rounded-lg border border-white/10">
            <p class="text-xs font-semibold mb-1">Mode Prototipe</p>
            <p class="text-[10px] text-blue-200 leading-snug">Tampilan ini menggunakan data statis/dummy untuk keperluan UI.</p>
        </div>
    </aside>

    <!-- ================= AREA KANAN (HEADER & KONTEN) ================= -->
    <div class="flex-1 flex flex-col h-screen overflow-hidden">

        <!-- Header Atas -->
        <header class="bg-white border-b border-gray-200 h-20 flex items-center justify-between px-8 flex-shrink-0">
            <div>
                <h2 class="text-xl font-bold text-gray-800 m-0">{{ $title ?? 'Dashboard' }}</h2>
                <p class="text-sm text-gray-500 m-0">Beranda / Ringkasan sistem</p>
            </div>

            <div class="flex items-center gap-4 border-l border-gray-200 pl-4">
                <div class="text-right hidden sm:block">
                    <p class="text-sm font-semibold text-gray-800 m-0">{{ auth()->user()->name }}</p>
                    <p class="text-xs text-gray-500 m-0">Role: {{ ucfirst(auth()->user()->role) }}</p>
                </div>
                <!-- Avatar -->
                <div class="w-10 h-10 bg-blue-100 text-blue-700 font-bold rounded-full flex items-center justify-center uppercase">
                    {{ substr(auth()->user()->name, 0, 2) }}
                </div>
                <!-- Tombol Logout -->
                <form method="POST" action="{{ route('logout') }}" class="m-0">
                    @csrf
                    <button type="submit" class="text-red-500 hover:text-red-700 bg-red-50 hover:bg-red-100 p-2 rounded-lg transition-colors" title="Logout">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1"></path></svg>
                    </button>
                </form>
            </div>
        </header>

        <!-- Area Konten (Scrollable) -->
        <main class="flex-1 overflow-y-auto p-8">
            @yield('content')
        </main>
    </div>

</body>
</html>
