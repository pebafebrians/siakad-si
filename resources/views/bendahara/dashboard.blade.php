@extends('layouts.role', ['title' => 'Dashboard Bendahara'])

@section('content')
    <h1 class="text-2xl font-bold text-[#0f2547] m-0 mb-6">Ringkasan Keuangan</h1>

    <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mb-6">
        <div class="bg-white rounded-xl p-5 border border-gray-100 shadow-sm">
            <p class="text-sm font-medium text-gray-500 mb-1">Total Tagihan Belum Lunas</p>
            <h3 class="text-3xl font-bold text-red-600 m-0">Rp 45.000.000</h3>
        </div>
        <div class="bg-white rounded-xl p-5 border border-gray-100 shadow-sm">
            <p class="text-sm font-medium text-gray-500 mb-1">Pendapatan Bulan Ini</p>
            <h3 class="text-3xl font-bold text-green-600 m-0">Rp 125.500.000</h3>
        </div>
    </div>

    <div class="bg-white rounded-xl border border-gray-100 shadow-sm p-6">
        <h3 class="text-lg font-bold text-gray-800 mb-4">Aksi Cepat</h3>
        <div class="flex gap-4">
            <button class="px-4 py-2 bg-[#0f2547] text-white rounded-lg text-sm font-medium hover:bg-[#1a3c6e]">Verifikasi Pembayaran</button>
            <button class="px-4 py-2 border border-gray-300 text-gray-700 rounded-lg text-sm font-medium hover:bg-gray-50">Cetak Laporan</button>
        </div>
    </div>
@endsection
