<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class KategoriController extends Controller
{
    public function index(){
        /*$data = [
            'kategori_kode' => 'SNK',
            'kategori_nama' => 'Snack/Makanan Ringan',
            'created_at' => now()
        ];
        DB::table('kategori')->insert($data);
        return 'Insert data baru berhasil';
        */
        //$row = DB::table('kategori')->where('kategori_kode', 'SNK')-> update(['kategori_nama' => 'Camilan']);
        //return 'Update data berhasil. Jumlah data yang diupdate: '.$row.' baris';

        //$row = DB::table('kategori')->where('kategori_kode', 'SNK')->delete();
        //return 'Delete data berhasil. jumlah data yang terhapus: '.$row.' baris';

        $data = DB::table('kategori')->get();
        return view('kategori', ['data' => $data]);
    }
}
