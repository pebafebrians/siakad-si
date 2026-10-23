<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Login - SIAKAD</title>

    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">

    <!-- Memanggil Tailwind CSS via Vite (bawaan Laravel 12) -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <!-- Tambahan CSS murni untuk fallback font -->
    <style>
        body {
            font-family: 'Inter', sans-serif;
            margin: 0;
            padding: 0;
        }
    </style>
</head>
<body class="bg-gray-50 antialiased">

    <!-- Container Utama -->
    <div class="min-h-screen flex">

        <!-- ================= SISI KIRI (BRANDING) ================= -->
        <div class="hidden lg:flex lg:w-1/2 bg-[#0f2547] flex-col justify-between p-12 relative overflow-hidden">
            <!-- Ornamen Lingkaran -->
            <div class="absolute -top-24 -left-24 w-96 h-96 bg-white opacity-5 rounded-full blur-3xl"></div>
            <div class="absolute top-1/3 left-1/4 w-[35rem] h-[35rem] border border-white opacity-10 rounded-full"></div>

            <!-- Logo -->
            <div class="relative z-10 flex items-center gap-4">
                <div class="w-12 h-12 bg-white/10 rounded-xl flex items-center justify-center border border-white/20">
                    <!-- Ikon Gedung -->
                    <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"></path></svg>
                </div>
                <div>
                    <h1 class="text-white font-bold text-xl tracking-wide m-0">SIAKAD</h1>
                    <p class="text-blue-300 text-xs tracking-widest uppercase m-0">Sistem Informasi Akademik</p>
                </div>
            </div>

            <!-- Teks Utama -->
            <div class="relative z-10 mb-20">
                <p class="text-blue-300 text-sm tracking-widest uppercase mb-4">Portal Akademik</p>
                <h2 class="text-4xl lg:text-5xl font-bold text-white leading-tight mb-6">
                    Awali langkah<br>akademik Anda.
                </h2>
                <p class="text-blue-200 text-lg max-w-md">
                    Masuk ke portal akademik untuk mengakses informasi dan layanan perkuliahan Anda.
                </p>
            </div>

            <!-- Copyright -->
            <div class="relative z-10 text-blue-300 text-sm">
                &copy; {{ date('Y') }} Sistem Informasi Akademik
            </div>
        </div>

        <!-- ================= SISI KANAN (FORM LOGIN) ================= -->
        <div class="w-full lg:w-1/2 flex items-center justify-center p-6">
            <!-- Kotak Form -->
            <div class="w-full max-w-md bg-white rounded-2xl shadow-xl p-8 lg:p-10 border border-gray-100">

                <h2 class="text-3xl font-bold text-[#0f2547] mb-2 mt-0">Selamat datang</h2>
                <p class="text-gray-500 text-sm mb-8">Masukkan identitas akun Anda untuk melanjutkan.</p>

                <!-- Menampilkan Pesan Error dari Laravel (Murni HTML/Tailwind) -->
                @if ($errors->any())
                    <div class="mb-6 p-4 rounded-lg bg-red-50 border border-red-200">
                        <ul class="list-disc list-inside text-sm text-red-600 m-0 p-0">
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <!-- Form HTML Biasa -->
                <form method="POST" action="{{ route('login') }}">
                    @csrf

                    <!-- Input Email -->
                    <div class="mb-5">
                        <label for="email" class="block text-sm font-semibold text-[#0f2547] mb-2">Username</label>
                        <input
                            id="email"
                            type="email"
                            name="email"
                            value="{{ old('email') }}"
                            required
                            autofocus
                            autocomplete="username"
                            placeholder="Masukkan Username"
                            class="w-full rounded-lg border border-gray-300 py-3 px-4 text-sm text-gray-800 placeholder-gray-400 focus:outline-none focus:border-[#0f2547] focus:ring-1 focus:ring-[#0f2547] transition-colors"
                        >
                    </div>

                    <!-- Input Password -->
                    <div class="mb-6">
                        <label for="password" class="block text-sm font-semibold text-[#0f2547] mb-2">Kata sandi</label>
                        <div class="relative">
                            <input
                                id="password"
                                type="password"
                                name="password"
                                required
                                autocomplete="current-password"
                                placeholder="Masukkan kata sandi"
                                class="w-full rounded-lg border border-gray-300 py-3 px-4 pr-24 text-sm text-gray-800 placeholder-gray-400 focus:outline-none focus:border-[#0f2547] focus:ring-1 focus:ring-[#0f2547] transition-colors"
                            >

                            <!-- Tombol Tampilkan -->
                            <button type="button" onclick="togglePassword()" class="absolute inset-y-0 right-0 pr-4 flex items-center text-sm font-semibold text-[#0f2547] hover:text-blue-700 focus:outline-none border-none bg-transparent cursor-pointer">
                                <span id="toggleText">Tampilkan</span>
                            </button>
                        </div>
                    </div>

                    <!-- Tombol Masuk -->
                    <button type="submit" class="w-full flex justify-center items-center gap-2 bg-[#0f2547] hover:bg-[#1a3c6e] text-white font-semibold py-3 px-4 rounded-lg transition-colors border-none cursor-pointer">
                        Masuk
                        <!-- Ikon Panah -->
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"></path></svg>
                    </button>
                </form>

                <!-- Garis Pemisah & Footer -->
                <div class="mt-8 pt-6 border-t border-gray-100 text-center flex items-center justify-center gap-2 text-xs text-gray-400 uppercase tracking-widest">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z"></path></svg>
                    Universitas Sistem Informasi
                </div>
            </div>
        </div>
    </div>

    <!-- Script JS untuk Toggle Password -->
    <script>
        function togglePassword() {
            const passwordInput = document.getElementById('password');
            const toggleText = document.getElementById('toggleText');

            if (passwordInput.type === 'password') {
                passwordInput.type = 'text';
                toggleText.textContent = 'Sembunyikan';
            } else {
                passwordInput.type = 'password';
                toggleText.textContent = 'Tampilkan';
            }
        }
    </script>

</body>
</html>
