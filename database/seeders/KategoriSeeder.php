<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class KategoriSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            ['kategori_kode' => 1, 'kategori_nama' => 'Makanan'],
            ['kategori_kode' => 2, 'kategori_nama' => 'Minuman'],
            ['kategori_kode' => 3, 'kategori_nama' => 'Lainnya'],
        ];
        DB::table(table: 'm_kategori')->insert(values: $data);
    }
}
