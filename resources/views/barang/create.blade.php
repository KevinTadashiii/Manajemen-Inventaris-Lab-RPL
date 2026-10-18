@extends('layouts.app')

@section('title', 'Tambah Barang Baru')

@section('content')
<div class="form-container max-w-2xl">
    <div class="mb-6">
        <h2 class="text-2xl font-bold text-slate-900">Tambah Barang Baru</h2>
        <p class="text-slate-600 mt-1">Isi formulir di bawah untuk menambahkan barang baru ke inventaris.</p>
    </div>

    <a href="{{ route('barang.index') }}" class="inline-flex items-center text-sm text-slate-600 hover:text-slate-900 mb-6 transition-colors">
        <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7" />
        </svg>
        Kembali ke Daftar Barang
    </a>

    <form action="{{ route('barang.store') }}" method="POST" class="space-y-6">
        @csrf

        <div>
            <label for="kategori_id" class="block text-sm font-medium text-slate-700 mb-1">Kategori <span class="text-rose-500">*</span></label>
            <select name="kategori_id" id="kategori_id" class="w-full px-4 py-2 border border-slate-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition-colors">
                <option value="">Pilih Kategori</option>
                @foreach($kategoris as $kategori)
                    <option value="{{ $kategori->id }}" {{ old('kategori_id') == $kategori->id ? 'selected' : '' }}>
                        {{ $kategori->nama_kategori }}
                    </option>
                @endforeach
            </select>
            @error('kategori_id')
                <p class="mt-1 text-sm text-rose-600">{{ $message }}</p>
            @enderror
        </div>

        <div>
            <label for="kode_barang" class="block text-sm font-medium text-slate-700 mb-1">Kode Barang <span class="text-rose-500">*</span></label>
            <input type="text" name="kode_barang" id="kode_barang" maxlength="20" value="{{ old('kode_barang') }}" class="w-full px-4 py-2 border border-slate-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition-colors">
            @error('kode_barang')
                <p class="mt-1 text-sm text-rose-600">{{ $message }}</p>
            @enderror
        </div>

        <div>
            <label for="nama_barang" class="block text-sm font-medium text-slate-700 mb-1">Nama Barang <span class="text-rose-500">*</span></label>
            <input type="text" name="nama_barang" id="nama_barang" minlength="3" maxlength="150" value="{{ old('nama_barang') }}" class="w-full px-4 py-2 border border-slate-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition-colors">
            @error('nama_barang')
                <p class="mt-1 text-sm text-rose-600">{{ $message }}</p>
            @enderror
        </div>

        <div>
            <label for="spesifikasi" class="block text-sm font-medium text-slate-700 mb-1">Spesifikasi</label>
            <textarea name="spesifikasi" id="spesifikasi" rows="4" class="w-full px-4 py-2 border border-slate-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition-colors">{{ old('spesifikasi') }}</textarea>
            @error('spesifikasi')
                <p class="mt-1 text-sm text-rose-600">{{ $message }}</p>
            @enderror
        </div>

        <div>
            <label for="stok" class="block text-sm font-medium text-slate-700 mb-1">Stok <span class="text-rose-500">*</span></label>
            <input type="number" name="stok" id="stok" min="0" step="1" value="{{ old('stok', 0) }}" class="w-full px-4 py-2 border border-slate-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition-colors">
            @error('stok')
                <p class="mt-1 text-sm text-rose-600">{{ $message }}</p>
            @enderror
        </div>

        <div>
            <label for="kondisi" class="block text-sm font-medium text-slate-700 mb-1">Kondisi <span class="text-rose-500">*</span></label>
            <select name="kondisi" id="kondisi" class="w-full px-4 py-2 border border-slate-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition-colors">
                <option value="">Pilih Kondisi</option>
                <option value="Baik" {{ old('kondisi') == 'Baik' ? 'selected' : '' }}>Baik</option>
                <option value="Rusak Ringan" {{ old('kondisi') == 'Rusak Ringan' ? 'selected' : '' }}>Rusak Ringan</option>
                <option value="Rusak Berat" {{ old('kondisi') == 'Rusak Berat' ? 'selected' : '' }}>Rusak Berat</option>
            </select>
            @error('kondisi')
                <p class="mt-1 text-sm text-rose-600">{{ $message }}</p>
            @enderror
        </div>

        <div>
            <label for="status" class="block text-sm font-medium text-slate-700 mb-1">Status <span class="text-rose-500">*</span></label>
            <select name="status" id="status" class="w-full px-4 py-2 border border-slate-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition-colors">
                <option value="">Pilih Status</option>
                <option value="Tersedia" {{ old('status') == 'Tersedia' ? 'selected' : '' }}>Tersedia</option>
                <option value="Dipinjam" {{ old('status') == 'Dipinjam' ? 'selected' : '' }}>Dipinjam</option>
                <option value="Maintenance" {{ old('status') == 'Maintenance' ? 'selected' : '' }}>Maintenance</option>
            </select>
            @error('status')
                <p class="mt-1 text-sm text-rose-600">{{ $message }}</p>
            @enderror
        </div>

        <div class="flex items-center space-x-4 pt-4 border-t border-slate-200">
            <button type="submit" class="px-6 py-2 bg-blue-600 text-white font-medium rounded-lg hover:bg-blue-700 transition-colors">Simpan</button>
            <a href="{{ route('barang.index') }}" class="px-6 py-2 bg-slate-100 text-slate-700 font-medium rounded-lg hover:bg-slate-200 transition-colors">Batal</a>
        </div>
    </form>
</div>
@endsection