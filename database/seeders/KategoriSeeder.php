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
            ['nama_kategori' => 'Komputer & Laptop', 'deskripsi' => 'Kategori untuk komputer dan laptop.', 'created_at' => now(), 'updated_at' => now()],
            ['nama_kategori' => 'Perangkat Jaringan', 'deskripsi' => 'Kategori untuk perangkat jaringan.', 'created_at' => now(), 'updated_at' => now()],
            ['nama_kategori' => 'Alat Perkabelan', 'deskripsi' => 'Kategori untuk alat perkabelan.', 'created_at' => now(), 'updated_at' => now()],
            ['nama_kategori' => 'Multimedia', 'deskripsi' => 'Kategori untuk perangkat multimedia.', 'created_at' => now(), 'updated_at' => now()],
        ]);
    }
}
