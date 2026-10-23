@extends('layouts.role', ['title' => 'Dashboard Dosen'])

@section('content')
    <div class="bg-white rounded-lg shadow p-6">
        <h1 class="text-2xl font-bold text-gray-800 mb-2">
            Halo, {{ auth()->user()->name }} 👨‍🏫
        </h1>
        <p class="text-gray-600">
            Halaman ini hanya bisa diakses oleh role <strong>dosen</strong>.
        </p>
    </div>
@endsection
