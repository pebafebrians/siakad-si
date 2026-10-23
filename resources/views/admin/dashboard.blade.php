@extends('layouts.role', ['title' => 'Dashboard Admin'])

@section('content')
    <div class="bg-white rounded-lg shadow p-6">
        <h1 class="text-2xl font-bold text-gray-800 mb-2">
            Selamat datang, Admin 👋
        </h1>
        <p class="text-gray-600 mb-6">
            Ini halaman khusus role <strong>admin</strong>.
        </p>

        <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
            <div class="border rounded p-4">
                <p class="text-sm text-gray-500">Total User</p>
                <p class="text-2xl font-bold">{{ \App\Models\User::count() }}</p>
            </div>
            <div class="border rounded p-4">
                <p class="text-sm text-gray-500">Total Mahasiswa</p>
                <p class="text-2xl font-bold">
                    {{ \App\Models\User::where('role', 'mahasiswa')->count() }}
                </p>
            </div>
            <div class="border rounded p-4">
                <p class="text-sm text-gray-500">Total Dosen</p>
                <p class="text-2xl font-bold">
                    {{ \App\Models\User::whereIn('role', ['dosen', 'dosen_wali'])->count() }}
                </p>
            </div>
        </div>
    </div>
@endsection
