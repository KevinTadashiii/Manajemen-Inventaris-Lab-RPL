<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'SIMLAB-RPL')</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="min-h-screen bg-slate-50">
    <header class="bg-white shadow-sm border-b border-slate-200">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex items-center justify-between h-16">
                <h1 class="text-xl font-bold text-slate-900">
                    <a href="{{ url('/') }}" class="hover:text-blue-600 transition-colors">SIMLAB-RPL</a>
                </h1>
                <nav class="flex items-center space-x-4">
                    <a href="{{ route('barang.index') }}" class="text-sm font-medium text-slate-600 hover:text-slate-900 transition-colors">Daftar Barang</a>
                </nav>
            </div>
        </div>
    </header>

    <main class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8">
        @if(session('success'))
            <div class="mb-6 p-4 bg-emerald-50 border border-emerald-200 rounded-lg">
                <p class="text-emerald-800">{{ session('success') }}</p>
            </div>
        @endif
        @yield('content')
    </main>

    <footer class="bg-white border-t border-slate-200 mt-auto">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-4">
            <p class="text-center text-sm text-slate-500">&copy; 2026 SIMLAB-RPL</p>
        </div>
    </footer>
</body>
</html>
