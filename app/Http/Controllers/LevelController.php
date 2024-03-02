<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\LevelModel;

class LevelController extends Controller
{
    public function index(){
        $data = [
            'level_kode' => 'SPR',
            'level_nama' => 'Supervisor',
            'created_at' => now()
        ];
        LevelModel::insert($data);

        // $row = DB::update('update m_level set level_nama = ? where level_kode = ?', ['Customer', 'CUS']);
        // return 'Update data berhasil. Jumlah data yang diupdate: ' . $row. ' baris';

        // $row = DB::delete('delete from m_level where level_kode = ?', ['CUS']);
        // return 'Delete data berhasil. Jumlah data yang dihapus: ' . $row. ' baris';

        // $data = DB::select('select * from m_level');
        // return view('level', ['data' => $data]);
        $level = LevelModel::all();
        return view('level', ['data' => $level]);
    }
}
