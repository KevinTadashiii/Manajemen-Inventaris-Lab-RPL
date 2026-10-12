<?php

namespace Database\Seeders;

use App\Models\Barang;
use Illuminate\Database\Seeder;

class BarangSeeder extends Seeder
{
    public function run(): void
    {
        Barang::create([
            'kategori_id' => 1,
            'kode_barang' => 'LAB-RPL-001',
            'nama_barang' => 'Laptop Lenovo ThinkPad',
            'spesifikasi' => 'Intel i5, RAM 8GB, SSD 256GB',
            'stok' => 5,
            'kondisi' => 'Baik',
            'status' => 'Tersedia'
        ]);

        Barang::create([
            'kategori_id' => 2,
            'kode_barang' => 'LAB-RPL-002',
            'nama_barang' => 'TP-Link Router TL-WR940N',
            'spesifikasi' => '450Mbps, 4x Port Ethernet',
            'stok' => 3,
            'kondisi' => 'Baik',
            'status' => 'Tersedia'
        ]);
    }
}