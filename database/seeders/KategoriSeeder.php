<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class KategoriSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('kategoris')->insert([
            ['nama_kategori' => 'Elektronik', 'deskripsi' => 'Kategori untuk barang elektronik seperti komputer, laptop, dan perangkat lainnya.', 'created_at' => now(), 'updated_at' => now()],
            ['nama_kategori' => 'Peralatan Laboratorium', 'deskripsi' => 'Kategori untuk peralatan yang digunakan di laboratorium.', 'created_at' => now(), 'updated_at' => now()],
            ['nama_kategori' => 'Peralatan Kantor', 'deskripsi' => 'Kategori untuk peralatan yang digunakan di kantor.', 'created_at' => now(), 'updated_at' => now()],
            ['nama_kategori' => 'Furniture', 'deskripsi' => 'Kategori untuk furniture seperti meja, kursi, dan lemari.', 'created_at' => now(), 'updated_at' => now()],
            ['nama_kategori' => 'Alat Tulis', 'deskripsi' => 'Kategori untuk alat tulis seperti pena, kertas, dan buku catatan.', 'created_at' => now(), 'updated_at' => now()],
        ]);
    }
}
