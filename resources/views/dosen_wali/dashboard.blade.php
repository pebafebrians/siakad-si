@extends('layouts.role', ['title' => 'Dashboard Dosen Wali'])

@section('content')
    <h1 class="text-2xl font-bold text-[#0f2547] m-0 mb-6">Ringkasan Bimbingan Wali</h1>

    <div class="bg-white rounded-xl border border-gray-100 shadow-sm p-6">
        <h3 class="text-lg font-bold text-gray-800 mb-4">Mahasiswa Perlu Persetujuan KRS</h3>
        <div class="p-4 bg-orange-50 text-orange-700 rounded-lg border border-orange-100 mb-3 text-sm flex justify-between items-center">
            <span>Ahmad Fauzi (NIM: 2023001) - Menunggu persetujuan KRS Ganjil</span>
            <button class="px-3 py-1 bg-orange-600 text-white rounded text-xs font-semibold hover:bg-orange-700">Review</button>
        </div>
        <div class="p-4 bg-orange-50 text-orange-700 rounded-lg border border-orange-100 text-sm flex justify-between items-center">
            <span>Siti Aminah (NIM: 2023002) - Menunggu persetujuan KRS Ganjil</span>
            <button class="px-3 py-1 bg-orange-600 text-white rounded text-xs font-semibold hover:bg-orange-700">Review</button>
        </div>
    </div>
@endsection
