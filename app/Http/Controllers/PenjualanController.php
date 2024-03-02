<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\PenjualanModel;

class PenjualanController extends Controller
{
    public function index(){
             $data = [
            'penjualan_id' => '12',
            'user_id' => '2',
            'pembeli' => 'Amanda',
            'penjualan_kode' => 'HIJ',
            'penjualan_tanggal' => '2024-03-02 20:41',
            'created_at' => now()
        ];
        PenjualanModel::insert($data);

        // $row = DB::table('m_penjualan')->where('penjualan_kode', 'EFG')->update(['pembeli' => 'Martha']);
        // return 'Update data berhasil. Jumlah data yang diupdate: ' . $row. ' baris';

        // $row = DB::table('m_penjualan')->where('penjualan_kode', 'EFG')->delete();
        // return 'Delete data berhasil. Jumlah data yang dihapus: ' . $row. ' baris';

        // $data = DB::table('m_penjualan')->get();
        // return view('penjualan', ['data' => $data]);\
        $penjualan = PenjualanModel::all();
        return view('penjualan', ['data' => $penjualan]);
    }
}
