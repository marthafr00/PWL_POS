<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function index(){
        /*    $data = [
            'user_id' => '4',
            'level_id' => '4',
            'username' => 'supervisor',
            'nama' => 'Supervisor',
            'password' => Hash::make('akucantik'),
            'created_at' => now()
        ];
        DB::table('m_user')->insert($data);
        return 'Insert data baru berhasil'; */

        // $row = DB::table('m_user')->where('user_id', '4')->update(['username' => 'supervisor']);
        // return 'Update data berhasil. Jumlah data yang diupdate: ' . $row. ' baris';

        // $row = DB::table('m_user')->where('user_id', '4')->delete();
        // return 'Delete data berhasil. Jumlah data yang dihapus: ' . $row. ' baris';

        $data = DB::table('m_user')->get();
        return view('user', ['data' => $data]);
    }
}
