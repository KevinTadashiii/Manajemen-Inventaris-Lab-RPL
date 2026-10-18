@extends('layouts.app')

@section('title', 'Daftar Barang')

@section('content')
<div class="list-container">
    <h2>Daftar Barang</h2>

    <div class="actions">
        <a href="{{ route('barang.create') }}" class="btn btn-primary">Tambah Barang</a>
    </div>

    <table>
        <thead>
            <tr>
                <th>No</th>
                <th>Kode Barang</th>
                <th>Nama Barang</th>
                <th>Kategori</th>
                <th>Stok</th>
                <th>Kondisi</th>
                <th>Status</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @forelse($barangs as $index => $barang)
                <tr>
                    <td>{{ $index + 1 }}</td>
                    <td>{{ $barang->kode_barang }}</td>
                    <td>{{ $barang->nama_barang }}</td>
                    <td>{{ $barang->kategori->nama_kategori ?? '-' }}</td>
                    <td>{{ $barang->stok }}</td>
                    <td>{{ $barang->kondisi }}</td>
                    <td>
                        @if($barang->status === 'Tersedia')
                            <span class="badge badge-success">{{ $barang->status }}</span>
                        @elseif($barang->status === 'Dipinjam')
                            <span class="badge badge-warning">{{ $barang->status }}</span>
                        @else
                            <span class="badge badge-danger">{{ $barang->status }}</span>
                        @endif
                    </td>
                    <td>
                        <a href="{{ route('barang.edit', $barang) }}" class="btn btn-secondary btn-small">Edit</a>
                        <form action="{{ route('barang.destroy', $barang) }}" method="POST" class="inline-form" onsubmit="return confirm('Apakah Anda yakin ingin menghapus barang ini?');">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-small">Hapus</button>
                        </form>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="8" class="text-center">Belum ada data barang.</td>
                </tr>
            @endforelse
        </tbody>
    </table>
</div>
@endsection
