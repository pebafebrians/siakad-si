@extends('layouts.role', ['title' => 'Dashboard Admin'])

@section('content')
    <!-- Banner Peringatan Prototipe -->
    <div class="bg-[#fff9e6] border border-[#fceeb5] text-[#856404] px-4 py-3 rounded-lg mb-6 flex items-start gap-3">
        <svg class="w-5 h-5 flex-shrink-0 mt-0.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z"></path></svg>
        <div>
            <p class="font-bold text-sm m-0">Prototipe frontend — semua nama dan angka adalah data contoh.</p>
            <p class="text-xs m-0 mt-0.5">Halaman ini belum terhubung ke autentikasi, backend, atau database.</p>
        </div>
    </div>

    <!-- Header Title & Filter -->
    <div class="flex flex-col md:flex-row justify-between items-start md:items-center mb-6 gap-4">
        <div>
            <h1 class="text-2xl font-bold text-[#0f2547] m-0">Ringkasan administrasi</h1>
            <p class="text-sm text-gray-500 m-0 mt-1">Ikhtisar data akademik contoh untuk pratinjau dashboard.</p>
        </div>
        <div class="flex items-center gap-2 bg-white border border-gray-200 text-gray-700 px-4 py-2 rounded-lg text-sm font-medium">
            <svg class="w-4 h-4 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path></svg>
            Semester Ganjil 2026/2027 - contoh
        </div>
    </div>

    <!-- Kartu Statistik (4 Grid) -->
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-4 mb-6">
        <!-- Mahasiswa -->
        <div class="bg-white rounded-xl p-5 border border-gray-100 shadow-sm flex justify-between items-start">
            <div>
                <p class="text-sm font-medium text-gray-500 mb-1">Jumlah mahasiswa</p>
                <h3 class="text-3xl font-bold text-gray-800 m-0">{{ \App\Models\User::where('role', 'mahasiswa')->count() }}</h3>
                <p class="text-xs text-gray-400 mt-2 m-0">Dummy - seluruh status</p>
            </div>
            <div class="p-2 bg-blue-50 text-blue-600 rounded-lg">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z"></path></svg>
            </div>
        </div>
        <!-- Dosen -->
        <div class="bg-white rounded-xl p-5 border border-gray-100 shadow-sm flex justify-between items-start">
            <div>
                <p class="text-sm font-medium text-gray-500 mb-1">Jumlah dosen</p>
                <h3 class="text-3xl font-bold text-gray-800 m-0">{{ \App\Models\User::whereIn('role', ['dosen', 'dosen_wali'])->count() }}</h3>
                <p class="text-xs text-gray-400 mt-2 m-0">Dummy - seluruh status</p>
            </div>
            <div class="p-2 bg-green-50 text-green-600 rounded-lg">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z"></path></svg>
            </div>
        </div>
        <!-- Prodi -->
        <div class="bg-white rounded-xl p-5 border border-gray-100 shadow-sm flex justify-between items-start">
            <div>
                <p class="text-sm font-medium text-gray-500 mb-1">Program studi</p>
                <h3 class="text-3xl font-bold text-gray-800 m-0">8</h3>
                <p class="text-xs text-gray-400 mt-2 m-0">Dummy - program aktif</p>
            </div>
            <div class="p-2 bg-orange-50 text-orange-600 rounded-lg">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"></path></svg>
            </div>
        </div>
        <!-- Mata Kuliah -->
        <div class="bg-white rounded-xl p-5 border border-gray-100 shadow-sm flex justify-between items-start">
            <div>
                <p class="text-sm font-medium text-gray-500 mb-1">Mata kuliah</p>
                <h3 class="text-3xl font-bold text-gray-800 m-0">64</h3>
                <p class="text-xs text-gray-400 mt-2 m-0">Dummy - katalog contoh</p>
            </div>
            <div class="p-2 bg-indigo-50 text-indigo-600 rounded-lg">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"></path></svg>
            </div>
        </div>
    </div>

    <!-- Bawah: Tabel & Panel Kanan -->
    <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">
        <!-- Tabel Pengguna (Kiri) -->
        <div class="lg:col-span-2 bg-white rounded-xl border border-gray-100 shadow-sm p-6">
            <div class="flex justify-between items-center mb-4">
                <div>
                    <h3 class="text-lg font-bold text-gray-800 m-0">Pengguna terbaru</h3>
                    <p class="text-xs text-gray-500 m-0">Baris di bawah ini hanya contoh tampilan</p>
                </div>
                <a href="#" class="text-sm font-semibold text-blue-600 hover:text-blue-800">Daftar pengguna</a>
            </div>

            <div class="overflow-x-auto">
                <table class="w-full text-left text-sm text-gray-600">
                    <thead class="text-xs text-gray-400 uppercase border-b border-gray-100">
                        <tr>
                            <th class="pb-3 font-medium">Nama</th>
                            <th class="pb-3 font-medium">Username / Identitas</th>
                            <th class="pb-3 font-medium">Role</th>
                            <th class="pb-3 font-medium">Status Akun</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-gray-50">
                        <!-- Baris 1 -->
                        <tr>
                            <td class="py-3">
                                <p class="font-semibold text-gray-800 m-0">Pengguna Contoh 01</p>
                                <p class="text-xs text-gray-400 m-0">Data dummy - baru ditambahkan</p>
                            </td>
                            <td class="py-3">contoh.admin</td>
                            <td class="py-3"><span class="px-2 py-1 bg-blue-50 text-blue-700 rounded text-xs font-medium border border-blue-100">Admin - contoh</span></td>
                            <td class="py-3"><span class="px-2 py-1 bg-green-50 text-green-700 rounded text-xs font-medium border border-green-100 flex items-center w-max gap-1"><span class="w-1.5 h-1.5 bg-green-500 rounded-full"></span> Aktif - contoh</span></td>
                        </tr>
                        <!-- Baris 2 -->
                        <tr>
                            <td class="py-3">
                                <p class="font-semibold text-gray-800 m-0">Pengguna Contoh 02</p>
                                <p class="text-xs text-gray-400 m-0">Data dummy - baru ditambahkan</p>
                            </td>
                            <td class="py-3">NIM-000001</td>
                            <td class="py-3"><span class="px-2 py-1 bg-indigo-50 text-indigo-700 rounded text-xs font-medium border border-indigo-100">Mahasiswa - contoh</span></td>
                            <td class="py-3"><span class="px-2 py-1 bg-green-50 text-green-700 rounded text-xs font-medium border border-green-100 flex items-center w-max gap-1"><span class="w-1.5 h-1.5 bg-green-500 rounded-full"></span> Aktif - contoh</span></td>
                        </tr>
                        <!-- Baris 3 -->
                        <tr>
                            <td class="py-3">
                                <p class="font-semibold text-gray-800 m-0">Pengguna Contoh 03</p>
                                <p class="text-xs text-gray-400 m-0">Data dummy - baru ditambahkan</p>
                            </td>
                            <td class="py-3">NIDN-000002</td>
                            <td class="py-3"><span class="px-2 py-1 bg-blue-50 text-blue-700 rounded text-xs font-medium border border-blue-100">Dosen - contoh</span></td>
                            <td class="py-3"><span class="px-2 py-1 bg-orange-50 text-orange-700 rounded text-xs font-medium border border-orange-100 flex items-center w-max gap-1"><span class="w-1.5 h-1.5 bg-orange-500 rounded-full"></span> Menunggu aktivasi</span></td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>

        <!-- Panel Kanan -->
        <div class="space-y-6">
            <!-- Periode Akademik -->
            <div class="bg-white rounded-xl border border-gray-100 shadow-sm p-6">
                <div class="flex justify-between items-center mb-4">
                    <div>
                        <h3 class="text-lg font-bold text-gray-800 m-0">Periode akademik aktif</h3>
                        <p class="text-xs text-gray-500 m-0">Informasi periode contoh</p>
                    </div>
                    <a href="#" class="text-sm font-semibold text-blue-600 hover:text-blue-800">Periode</a>
                </div>
                <p class="text-sm font-semibold text-gray-800 mb-2">Semester Ganjil 2026/2027</p>
                <p class="text-xs text-gray-500 mb-3">1 September 2026 — 31 Januari 2027 · dummy</p>
                <span class="px-2 py-1 bg-green-50 text-green-700 rounded text-xs font-medium border border-green-100">Aktif · contoh</span>
            </div>

            <!-- Status Data -->
            <div class="bg-white rounded-xl border border-gray-100 shadow-sm p-6">
                <div class="mb-4">
                    <h3 class="text-lg font-bold text-gray-800 m-0">Status data akademik</h3>
                    <p class="text-xs text-gray-500 m-0">Rekap dummy untuk pratinjau</p>
                </div>
                <div class="flex justify-between py-2 border-b border-gray-50 text-sm">
                    <span class="text-gray-600">Data mahasiswa</span>
                    <span class="font-semibold text-gray-800">Lengkap · contoh</span>
                </div>
                <div class="flex justify-between py-2 text-sm">
                    <span class="text-gray-600">Data dosen</span>
                    <span class="font-semibold text-gray-800">Lengkap · contoh</span>
                </div>
            </div>
        </div>
    </div>
@endsection
