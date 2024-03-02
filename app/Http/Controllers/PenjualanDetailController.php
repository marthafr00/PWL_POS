<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\PenjualanDetailModel;

class PenjualanDetailController extends Controller
{
    public function index(){
             $data = [
            'detail_id' => '33',
            'penjualan_id' => '12',
            'barang_id' => '11',
            'harga' => '15000',
            'jumlah' => '5',
            'created_at' => now()
        ];
        PenjualanDetailModel::insert($data);

        // $row = DB::table('m_penjualan_detail')->where('detail_id', '31')->update(['jumlah' => '5']);
        // return 'Update data berhasil. Jumlah data yang diupdate: ' . $row. ' baris';

        // $row = DB::table('m_penjualan_detail')->where('detail_id', '31')->delete();
        // return 'Delete data berhasil. Jumlah data yang dihapus: ' . $row. ' baris';

        // $data = DB::table('m_penjualan_detail')->get();
        // return view('penjualan_detail', ['data' => $data]);

        $detail = PenjualanDetailModel::all();
        return view('penjualan_detail', ['data' => $detail]);
    }
}
