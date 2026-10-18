<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class BarangSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('barangs')->insert([
            ['kategori_id' => 1, 'kode_barang' => 'KMP-001', 'nama_barang' => 'Laptop Dell Latitude 5420', 'spesifikasi' => 'Intel Core i5, RAM 8GB, SSD 256GB', 'stok' => 5, 'kondisi' => 'Baik', 'status' => 'Tersedia', 'created_at' => now(), 'updated_at' => now()],
            ['kategori_id' => 2, 'kode_barang' => 'JRG-001', 'nama_barang' => 'Switch TP-Link 8 Port', 'spesifikasi' => 'Gigabit, 8 port', 'stok' => 3, 'kondisi' => 'Baik', 'status' => 'Tersedia', 'created_at' => now(), 'updated_at' => now()],
            ['kategori_id' => 3, 'kode_barang' => 'KBL-001', 'nama_barang' => 'Kabel LAN Cat6', 'spesifikasi' => 'Panjang 100m', 'stok' => 10, 'kondisi' => 'Baik', 'status' => 'Tersedia', 'created_at' => now(), 'updated_at' => now()],
            ['kategori_id' => 4, 'kode_barang' => 'MM-001', 'nama_barang' => 'Proyektor Epson EB-X41', 'spesifikasi' => '3600 lumens, resolusi XGA', 'stok' => 2, 'kondisi' => 'Baik', 'status' => 'Tersedia', 'created_at' => now(), 'updated_at' => now()],
        ]);
    }
}
