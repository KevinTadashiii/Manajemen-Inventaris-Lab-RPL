public function run(): void
{
    $this->call([
        KategoriSeeder::class,
        BarangSeeder::class,
    ]);
}