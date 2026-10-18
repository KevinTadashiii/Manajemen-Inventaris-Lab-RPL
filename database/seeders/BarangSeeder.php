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
            ['kategori_id' => 1, 'kode_barang' => 'ELK-001', 'nama_barang' => 'Laptop Dell Latitude 5420', 'spesifikasi' => 'Intel Core i5, RAM 8GB, SSD 256GB', 'stok' => 5, 'kondisi' => 'Baik', 'status' => 'Tersedia', 'created_at' => now(), 'updated_at' => now()],
            ['kategori_id' => 1, 'kode_barang' => 'ELK-002', 'nama_barang' => 'Proyektor Epson EB-X41', 'spesifikasi' => '3600 lumens, resolusi XGA', 'stok' => 2, 'kondisi' => 'Baik', 'status' => 'Tersedia', 'created_at' => now(), 'updated_at' => now()],
            ['kategori_id' => 2, 'kode_barang' => 'LAB-001', 'nama_barang' => 'Mikroskop Binokuler', 'spesifikasi' => 'Pembesaran 40x-1000x', 'stok' => 3, 'kondisi' => 'Baik', 'status' => 'Tersedia', 'created_at' => now(), 'updated_at' => now()],
            ['kategori_id' => 2, 'kode_barang' => 'LAB-002', 'nama_barang' => 'Tabung Reaksi', 'spesifikasi' => 'Set 50 buah, volume 10ml', 'stok' => 10, 'kondisi' => 'Baik', 'status' => 'Tersedia', 'created_at' => now(), 'updated_at' => now()],
            ['kategori_id' => 3, 'kode_barang' => 'KNT-001', 'nama_barang' => 'Printer HP LaserJet Pro', 'spesifikasi' => 'Print speed 28 ppm', 'stok' => 1, 'kondisi' => 'Rusak Ringan', 'status' => 'Maintenance', 'created_at' => now(), 'updated_at' => now()],
            ['kategori_id' => 4, 'kode_barang' => 'FRN-001', 'nama_barang' => 'Meja Kerja', 'spesifikasi' => 'Meja kayu 120x60 cm', 'stok' => 4, 'kondisi' => 'Baik', 'status' => 'Tersedia', 'created_at' => now(), 'updated_at' => now()],
            ['kategori_id' => 5, 'kode_barang' => 'ATK-001', 'nama_barang' => 'Kertas A4', 'spesifikasi' => '80 gsm, 500 lembar per rim', 'stok' => 20, 'kondisi' => 'Baik', 'status' => 'Tersedia', 'created_at' => now(), 'updated_at' => now()],
        ]);
    }
}
