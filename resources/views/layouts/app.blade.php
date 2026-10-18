<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'SIMLAB-RPL')</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body>
    <header>
        <div class="container">
            <h1><a href="{{ url('/') }}">SIMLAB-RPL</a></h1>
            <nav>
                <a href="{{ route('barang.index') }}">Daftar Barang</a>
                <a href="{{ route('barang.create') }}">Tambah Barang</a>
            </nav>
        </div>
    </header>

    <main>
        <div class="container">
            @if(session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
            @endif
            @yield('content')
        </div>
    </main>

    <footer>
        <div class="container">
            <p>&copy; 2026 SIMLAB-RPL</p>
        </div>
    </footer>
</body>
</html>
