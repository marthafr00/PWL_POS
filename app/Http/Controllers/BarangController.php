<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class BarangController extends Controller
{
    public function index(){
        $data = [
        'barang_id' => '11',
        'kategori_id' => '9',
        'barang_kode' => 'BBY',
        'barang_nama' => 'Bubur Bayi',
        'harga_beli' => 10000,
        'harga_jual' => 12000,
        'created_at' => now()
        ];
        DB::table('m_barang')->insert($data);
        return 'Insert data baru berhasil';

        // $row = DB::table('m_barang')->where('barang_id', '11')->update(['barang_nama' => 'Makanan Bayi']);
        // return 'Update data berhasil. Jumlah data yang diupdate: ' . $row. ' baris';

        // $row = DB::table('m_barang')->where('barang_id', '11')->delete();
        // return 'Delete data berhasil. Jumlah data yang dihapus: ' . $row. ' baris';

        // $data = DB::table('m_barang')->get();
        // return view('barang', ['data' => $data]);
    }
}
