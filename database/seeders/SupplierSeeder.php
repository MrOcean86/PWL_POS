<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SupplierSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            ['supplier_id' => 1, 'supplier_kode' => 'SPL001', 'supplier_nama' => 'Supplier 1', 'supplier_alamat' => 'Jl. Raya No. 1'],
            ['supplier_id' => 2, 'supplier_kode' => 'SPL002', 'supplier_nama' => 'Supplier 2', 'supplier_alamat' => 'Jl. Raya No. 2'],
            ['supplier_id' => 3, 'supplier_kode' => 'SPL003', 'supplier_nama' => 'Supplier 3', 'supplier_alamat' => 'Jl. Raya No. 3'],
        ];
        DB::table(table: 'm_supplier')->insert(values: $data);
    }
}
