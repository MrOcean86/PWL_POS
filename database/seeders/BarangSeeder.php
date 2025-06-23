<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class BarangSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            ['barang_id' => 1, 'kategori_id' => 1, 'barang_kode' => 'BRG001', 'barang_nama' => 'Barang 1', 'harga_beli' => 100, 'barang_stok' => 1000],
            ['barang_id' => 2, 'kategori_id' => 2, 'barang_kode' => 'BRG002', 'barang_nama' => 'Barang 2', 'harga_beli' => 200, 'barang_stok' => 2000],
            ['barang_id' => 3, 'kategori_id' => 3, 'barang_kode' => 'BRG003', 'barang_nama' => 'Barang 3', 'harga_beli' => 300, 'barang_stok' => 3000],
        ];
        DB::table(table: 'm_barang')->insert(values: $data);
    }
}
