<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\BarangModel;

class BarangController extends Controller
{
    public function index(){
        $data = [
        'barang_id' => '12',
        'kategori_id' => '6',
        'barang_kode' => 'PSG',
        'barang_nama' => 'Buah pisang 1kg',
        'harga_beli' => 20000,
        'harga_jual' => 25000,
        'created_at' => now()
        ];
        BarangModel::insert($data);

        // $row = DB::table('m_barang')->where('barang_id', '11')->update(['barang_nama' => 'Makanan Bayi']);
        // return 'Update data berhasil. Jumlah data yang diupdate: ' . $row. ' baris';

        // $row = DB::table('m_barang')->where('barang_id', '11')->delete();
        // return 'Delete data berhasil. Jumlah data yang dihapus: ' . $row. ' baris';

        // $data = DB::table('m_barang')->get();
        // return view('barang', ['data' => $data]);
        $barang = BarangModel::all();
        return view('barang', ['data' => $barang]);
    }
}
