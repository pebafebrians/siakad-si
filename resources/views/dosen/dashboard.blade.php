@extends('layouts.role', ['title' => 'Dashboard Dosen'])

@section('content')
    <h1 class="text-2xl font-bold text-[#0f2547] m-0 mb-6">Ringkasan Dosen</h1>

    <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mb-6">
        <div class="bg-white rounded-xl p-5 border border-gray-100 shadow-sm flex justify-between items-center">
            <div>
                <p class="text-sm font-medium text-gray-500 mb-1">Mata Kuliah Diampu</p>
                <h3 class="text-3xl font-bold text-gray-800 m-0">4</h3>
            </div>
            <div class="p-3 bg-blue-50 text-blue-600 rounded-lg">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"></path></svg>
            </div>
        </div>
        <div class="bg-white rounded-xl p-5 border border-gray-100 shadow-sm flex justify-between items-center">
            <div>
                <p class="text-sm font-medium text-gray-500 mb-1">Mahasiswa Bimbingan</p>
                <h3 class="text-3xl font-bold text-gray-800 m-0">32</h3>
            </div>
            <div class="p-3 bg-green-50 text-green-600 rounded-lg">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z"></path></svg>
            </div>
        </div>
    </div>
@endsection
