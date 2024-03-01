<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PenjualanDetailController extends Controller
{
    public function index(){
             $data = [
            'detail_id' => '31',
            'penjualan_id' => '11',
            'barang_id' => '11',
            'harga' => '12000',
            'jumlah' => '5',
            'created_at' => now()
        ];
        DB::table('m_penjualan_detail')->insert($data);
        return 'Insert data baru berhasil';

        // $row = DB::table('m_penjualan_detail')->where('detail_id', '31')->update(['jumlah' => '5']);
        // return 'Update data berhasil. Jumlah data yang diupdate: ' . $row. ' baris';

        // $row = DB::table('m_penjualan_detail')->where('detail_id', '31')->delete();
        // return 'Delete data berhasil. Jumlah data yang dihapus: ' . $row. ' baris';

        // $data = DB::table('m_penjualan_detail')->get();
        // return view('penjualan_detail', ['data' => $data]);
    }
}
