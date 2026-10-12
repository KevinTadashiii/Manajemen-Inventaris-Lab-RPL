<?php

namespace Database\Seeders;

use App\Models\Kategori;
use Illuminate\Database\Seeder;

class KategoriSeeder extends Seeder
{
    public function run(): void
    {
        Kategori::create([
            'nama_kategori' => 'Komputer & Laptop',
            'deskripsi' => 'Perangkat komputer dan laptop untuk praktik'
        ]);

        Kategori::create([
            'nama_kategori' => 'Perangkat Jaringan',
            'deskripsi' => 'Perangkat jaringan seperti router, switch, modem'
        ]);

        Kategori::create([
            'nama_kategori' => 'Alat Perkabelan',
            'deskripsi' => 'Kabel, crimping tool, dan aksesoris kabelisasi'
        ]);

        Kategori::create([
            'nama_kategori' => 'Multimedia',
            'deskripsi' => 'Proyektor, speaker, monitor, dan perangkat multimedia lainnya'
        ]);
    }
}