@extends('layouts.role', ['title' => 'Dashboard Mahasiswa'])

@section('content')
    <div class="bg-[#e0f2fe] border border-[#bae6fd] text-[#0369a1] px-4 py-3 rounded-lg mb-6 flex items-center gap-3">
        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
        <p class="font-medium text-sm m-0">Selamat datang di Portal Akademik. Silakan lengkapi KRS Anda.</p>
    </div>

    <h1 class="text-2xl font-bold text-[#0f2547] m-0 mb-6">Ringkasan Mahasiswa</h1>

    <div class="grid grid-cols-1 md:grid-cols-3 gap-4 mb-6">
        <div class="bg-white rounded-xl p-5 border border-gray-100 shadow-sm">
            <p class="text-sm font-medium text-gray-500 mb-1">IPK Terakhir</p>
            <h3 class="text-3xl font-bold text-gray-800 m-0">3.85</h3>
        </div>
        <div class="bg-white rounded-xl p-5 border border-gray-100 shadow-sm">
            <p class="text-sm font-medium text-gray-500 mb-1">SKS Ditempuh</p>
            <h3 class="text-3xl font-bold text-gray-800 m-0">120</h3>
        </div>
        <div class="bg-white rounded-xl p-5 border border-gray-100 shadow-sm">
            <p class="text-sm font-medium text-gray-500 mb-1">Status KRS</p>
            <h3 class="text-xl font-bold text-orange-500 m-0 mt-1">Belum Disetujui</h3>
        </div>
    </div>

    <div class="bg-white rounded-xl border border-gray-100 shadow-sm p-6">
        <h3 class="text-lg font-bold text-gray-800 mb-4">Jadwal Hari Ini</h3>
        <p class="text-sm text-gray-500">Tidak ada jadwal perkuliahan hari ini.</p>
    </div>
@endsection
