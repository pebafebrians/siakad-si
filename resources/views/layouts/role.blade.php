<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ $title ?? 'Dashboard' }} — {{ config('app.name') }}</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="font-sans antialiased bg-gray-100">
    <nav class="bg-white shadow-sm border-b border-gray-200">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 flex justify-between h-16 items-center">
            <div class="flex items-center gap-4">
                <span class="font-bold text-gray-800">{{ config('app.name') }}</span>
                <span class="px-2 py-1 text-xs rounded bg-indigo-100 text-indigo-700 uppercase">
                    {{ auth()->user()->role }}
                </span>
            </div>
            <div class="flex items-center gap-4">
                <span class="text-sm text-gray-600">{{ auth()->user()->name }}</span>
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <button type="submit"
                        class="text-sm text-red-600 hover:text-red-800 font-medium">
                        Logout
                    </button>
                </form>
            </div>
        </div>
    </nav>

    <main class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8">
        @if (session('status'))
            <div class="mb-4 rounded bg-green-100 text-green-800 px-4 py-3">
                {{ session('status') }}
            </div>
        @endif

        @yield('content')
    </main>
</body>
</html>

