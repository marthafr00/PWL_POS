<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\StokModel;

class StokController extends Controller
{
    public function index(){
        $data = [
        'stok_id' => '12',
        'barang_id' => '11',
        'user_id' => '3',
        'stok_tanggal' => '2024-02-29 20:34:00',
        'stok_jumlah' => 100,
        'created_at' => now()
        ];
        StokModel::insert($data);

        // $row = DB::table('m_stok')->where('stok_id', '11')->update(['stok_jumlah' => '50']);
        // return 'Update data berhasil. Jumlah data yang diupdate: ' . $row. ' baris';

        // $row = DB::table('m_stok')->where('stok_id', '11')->delete();
        // return 'Delete data berhasil. Jumlah data yang dihapus: ' . $row. ' baris';

        // $data = DB::table('m_stok')->get();
        // return view('user', ['data' => $data]);

        $stok = StokModel::all();
        return view('stok', ['data' => $stok]);
    }
}
