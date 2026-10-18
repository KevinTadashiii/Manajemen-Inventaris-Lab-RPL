@extends('layouts.app')

@section('title', 'Daftar Barang')

@section('content')
<div class="list-container">
    <div class="flex items-center justify-between mb-6">
        <h2 class="text-2xl font-bold text-slate-900">Daftar Barang</h2>
        <a href="{{ route('barang.create') }}" class="px-4 py-2 bg-blue-600 text-white text-sm font-medium rounded-lg hover:bg-blue-700 transition-colors">Tambah Barang</a>
    </div>

    <div class="bg-white rounded-xl shadow-sm border border-slate-200 overflow-hidden">
        <div class="overflow-x-auto">
            <table class="w-full">
                <thead class="bg-slate-50">
                    <tr>
                        <th class="px-6 py-3 text-left text-xs font-medium text-slate-500 uppercase tracking-wider">No</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-slate-500 uppercase tracking-wider">Kode Barang</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-slate-500 uppercase tracking-wider">Nama Barang</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-slate-500 uppercase tracking-wider">Kategori</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-slate-500 uppercase tracking-wider">Stok</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-slate-500 uppercase tracking-wider">Kondisi</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-slate-500 uppercase tracking-wider">Status</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-slate-500 uppercase tracking-wider">Aksi</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-slate-200">
                    @forelse($barangs as $index => $barang)
                    <tr class="hover:bg-slate-50">
                        <td class="px-6 py-4 text-sm text-slate-600">{{ $index + 1 }}</td>
                        <td class="px-6 py-4 text-sm font-mono text-slate-900">{{ $barang->kode_barang }}</td>
                        <td class="px-6 py-4 text-sm text-slate-900">{{ $barang->nama_barang }}</td>
                        <td class="px-6 py-4 text-sm text-slate-600">{{ $barang->kategori->nama_kategori ?? '-' }}</td>
                        <td class="px-6 py-4 text-sm text-slate-900">
                            @if($barang->stok <= 5)
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
                        <td class="px-6 py-4">
                            <div class="flex items-center space-x-2">
                                <a href="{{ route('barang.edit', $barang) }}" class="px-3 py-1.5 bg-slate-100 text-slate-700 text-sm font-medium rounded-lg hover:bg-slate-200 transition-colors">Edit</a>
                                <form action="{{ route('barang.destroy', $barang) }}" method="POST" class="inline-form" onsubmit="return confirm('Apakah Anda yakin ingin menghapus barang ini?');">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="px-3 py-1.5 bg-rose-100 text-rose-700 text-sm font-medium rounded-lg hover:bg-rose-200 transition-colors">Hapus</button>
                                </form>
                            </div>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="8" class="px-6 py-12 text-center text-slate-500">Belum ada data barang.</td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        <!-- Pagination -->
        @if($barangs->hasPages())
        <div class="px-6 py-4 border-t border-slate-200">
            {{ $barangs->links() }}
        </div>
        @endif
    </div>
</div>
@endsection