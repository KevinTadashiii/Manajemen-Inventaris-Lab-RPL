@extends('layouts.app')

@section('title', 'Tambah Barang Baru')

@section('content')
<div class="form-container">
    <h2>Tambah Barang Baru</h2>

    <a href="{{ route('barang.index') }}" class="back-link">Kembali ke Daftar Barang</a>

    <form action="{{ route('barang.store') }}" method="POST">
        @csrf

        <div class="form-group">
            <label for="kategori_id">Kategori *</label>
            <select name="kategori_id" id="kategori_id">
                <option value="">Pilih Kategori</option>
                @foreach($kategoris as $kategori)
                    <option value="{{ $kategori->id }}" {{ old('kategori_id') == $kategori->id ? 'selected' : '' }}>
                        {{ $kategori->nama_kategori }}
                    </option>
                @endforeach
            </select>
            @error('kategori_id')
                <span class="error">{{ $message }}</span>
            @enderror
        </div>

        <div class="form-group">
            <label for="kode_barang">Kode Barang *</label>
            <input type="text" name="kode_barang" id="kode_barang" maxlength="20" value="{{ old('kode_barang') }}">
            @error('kode_barang')
                <span class="error">{{ $message }}</span>
            @enderror
        </div>

        <div class="form-group">
            <label for="nama_barang">Nama Barang *</label>
            <input type="text" name="nama_barang" id="nama_barang" minlength="3" maxlength="150" value="{{ old('nama_barang') }}">
            @error('nama_barang')
                <span class="error">{{ $message }}</span>
            @enderror
        </div>

        <div class="form-group">
            <label for="spesifikasi">Spesifikasi</label>
            <textarea name="spesifikasi" id="spesifikasi" rows="4">{{ old('spesifikasi') }}</textarea>
            @error('spesifikasi')
                <span class="error">{{ $message }}</span>
            @enderror
        </div>

        <div class="form-group">
            <label for="stok">Stok *</label>
            <input type="number" name="stok" id="stok" min="0" step="1" value="{{ old('stok', 0) }}">
            @error('stok')
                <span class="error">{{ $message }}</span>
            @enderror
        </div>

        <div class="form-group">
            <label for="kondisi">Kondisi *</label>
            <select name="kondisi" id="kondisi">
                <option value="">Pilih Kondisi</option>
                <option value="Baik" {{ old('kondisi') == 'Baik' ? 'selected' : '' }}>Baik</option>
                <option value="Rusak Ringan" {{ old('kondisi') == 'Rusak Ringan' ? 'selected' : '' }}>Rusak Ringan</option>
                <option value="Rusak Berat" {{ old('kondisi') == 'Rusak Berat' ? 'selected' : '' }}>Rusak Berat</option>
            </select>
            @error('kondisi')
                <span class="error">{{ $message }}</span>
            @enderror
        </div>

        <div class="form-group">
            <label for="status">Status *</label>
            <select name="status" id="status">
                <option value="">Pilih Status</option>
                <option value="Tersedia" {{ old('status') == 'Tersedia' ? 'selected' : '' }}>Tersedia</option>
                <option value="Dipinjam" {{ old('status') == 'Dipinjam' ? 'selected' : '' }}>Dipinjam</option>
                <option value="Maintenance" {{ old('status') == 'Maintenance' ? 'selected' : '' }}>Maintenance</option>
            </select>
            @error('status')
                <span class="error">{{ $message }}</span>
            @enderror
        </div>

        <div class="form-actions">
            <button type="submit">Simpan</button>
            <a href="{{ route('barang.index') }}" class="cancel">Batal</a>
        </div>
    </form>
</div>
@endsection
