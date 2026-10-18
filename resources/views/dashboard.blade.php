@extends('layouts.app')

@section('title', 'Dashboard')

@section('content')
<div class="dashboard-container">
    <div class="mb-8">
        <h2 class="text-2xl font-bold text-slate-900">Dashboard</h2>
        <p class="text-slate-600 mt-1">Ringkasan inventaris laboratorium RPL</p>
    </div>

    <!-- Metric Cards Grid -->
    <div class="grid grid-cols-1 md:grid-cols-3 gap-4 mb-8">
        <!-- Total Aset -->
        <div class="bg-white rounded-xl shadow-sm border border-slate-200 p-6">
            <div class="flex items-center justify-between">
                <div>
                    <p class="text-sm font-medium text-slate-500">Total Aset</p>
                    <p class="text-3xl font-bold text-slate-900 mt-1">{{ $totalBarang }}</p>
                </div>
                <div class="bg-blue-100 p-3 rounded-lg">
                    <svg class="w-8 h-8 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4" />
                    </svg>
                </div>
            </div>
        </div>

        <!-- Unit Tersedia -->
        <div class="bg-white rounded-xl shadow-sm border border-slate-200 p-6">
            <div class="flex items-center justify-between">
                <div>
                    <p class="text-sm font-medium text-slate-500">Unit Tersedia</p>
                    <p class="text-3xl font-bold text-emerald-700 mt-1">
                        {{ $barangsByStatus['Tersedia'] ?? 0 }}
                    </p>
                </div>
                <div class="bg-emerald-100 p-3 rounded-lg">
                    <svg class="w-8 h-8 text-emerald-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                    </svg>
                </div>
            </div>
        </div>

        <!-- Unit Dipinjam / Maintenance -->
        <div class="bg-white rounded-xl shadow-sm border border-slate-200 p-6">
            <div class="flex items-center justify-between">
                <div>
                    <p class="text-sm font-medium text-slate-500">Dipinjam / Maintenance</p>
                    <p class="text-3xl font-bold text-amber-700 mt-1">
                        {{ ($barangsByStatus['Dipinjam'] ?? 0) + ($barangsByStatus['Maintenance'] ?? 0) }}
                    </p>
                </div>
                <div class="bg-amber-100 p-3 rounded-lg">
                    <svg class="w-8 h-8 text-amber-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z" />
                    </svg>
                </div>
            </div>
        </div>
    </div>

    <!-- Stok Rendah Alert -->
    @if($stokRendah > 0)
    <div class="bg-amber-50 border border-amber-200 rounded-lg p-4 mb-8">
        <div class="flex items-center">
            <svg class="w-5 h-5 text-amber-600 mr-3" fill="currentColor" viewBox="0 0 20 20">
                <path fill-rule="evenodd" d="M8.257 3.099c.765-1.36 2.722-1.36 3.486 0l5.58 9.92c.75 1.334-.213 2.98-1.742 2.98H4.42c-1.53 0-2.493-1.646-1.743-2.98l5.58-9.92zM11 13a1 1 0 11-2 0 1 1 0 012 0zm-1-8a1 1 0 00-1 1v3a1 1 0 002 0V6a1 1 0 00-1-1z" clip-rule="evenodd" />
            </svg>
            <div>
                <p class="text-amber-800 font-medium">Peringatan: Stok Rendah</p>
                <p class="text-amber-700 text-sm mt-1">{{ $stokRendah }} barang memiliki stok 3 atau kurang. Segera lakukan restock.</p>
            </div>
        </div>
    </div>
    @endif

    <!-- Barang Terbaru -->
    <div class="bg-white rounded-xl shadow-sm border border-slate-200">
        <div class="p-6 border-b border-slate-200">
            <div class="flex items-center justify-between">
                <h3 class="text-lg font-semibold text-slate-900">Barang Terbaru</h3>
                <a href="{{ route('barang.index') }}" class="text-sm text-blue-600 hover:text-blue-800 font-medium">
                    Lihat Semua →
                </a>
            </div>
        </div>

        <div class="overflow-x-auto">
            <table class="w-full">
                <thead class="bg-slate-50">
                    <tr>
                        <th class="px-6 py-3 text-left text-xs font-medium text-slate-500 uppercase tracking-wider">Kode Barang</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-slate-500 uppercase tracking-wider">Nama Barang</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-slate-500 uppercase tracking-wider">Kategori</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-slate-500 uppercase tracking-wider">Stok</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-slate-500 uppercase tracking-wider">Kondisi</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-slate-500 uppercase tracking-wider">Status</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-slate-200">
                    @forelse($recentBarangs as $barang)
                    <tr class="hover:bg-slate-50">
                        <td class="px-6 py-4 text-sm font-mono text-slate-900">{{ $barang->kode_barang }}</td>
                        <td class="px-6 py-4 text-sm text-slate-900">{{ $barang->nama_barang }}</td>
                        <td class="px-6 py-4 text-sm text-slate-600">{{ $barang->kategori->nama_kategori ?? '-' }}</td>
                        <td class="px-6 py-4 text-sm text-slate-900">
                            @if($barang->stok <= 3)
                                <span class="font-medium text-amber-600">{{ $barang->stok }}</span>
                            @else
                                {{ $barang->stok }}
                            @endif
                        </td>
                        <td class="px-6 py-4 text-sm text-slate-600">{{ $barang->kondisi }}</td>
                        <td class="px-6 py-4">
                            @if($barang->status === 'Tersedia')
                                <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-emerald-100 text-emerald-800">{{ $barang->status }}</span>
                            @elseif($barang->status === 'Dipinjam')
                                <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-rose-100 text-rose-800">{{ $barang->status }}</span>
                            @else
                                <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-amber-100 text-amber-800">{{ $barang->status }}</span>
                            @endif
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="6" class="px-6 py-12 text-center text-slate-500">Belum ada data barang.</td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection