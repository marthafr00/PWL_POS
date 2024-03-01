<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PenjualanController extends Controller
{
    public function index(){
             $data = [
            'penjualan_id' => '11',
            'user_id' => '2',
            'pembeli' => 'Afrhissa',
            'penjualan_kode' => 'EFG',
            'penjualan_tanggal' => '2024-03-01 20:41',
            'created_at' => now()
        ];
        DB::table('m_penjualan')->insert($data);
        return 'Insert data baru berhasil';

        // $row = DB::table('m_penjualan')->where('penjualan_kode', 'EFG')->update(['pembeli' => 'Martha']);
        // return 'Update data berhasil. Jumlah data yang diupdate: ' . $row. ' baris';

        // $row = DB::table('m_penjualan')->where('penjualan_kode', 'EFG')->delete();
        // return 'Delete data berhasil. Jumlah data yang dihapus: ' . $row. ' baris';

        // $data = DB::table('m_penjualan')->get();
        // return view('penjualan', ['data' => $data]);
    }
}
