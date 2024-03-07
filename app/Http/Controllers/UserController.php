<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use App\Models\UserModel;

class UserController extends Controller
{
    public function index(){
            $data = [
            'level_id' => '2',
            'username' => 'manager_tiga',
            'nama' => 'Manager 3',
            'password' => Hash::make('hehehe'),
        ];
        UserModel::insert($data);

        // $row = DB::table('m_user')->where('user_id', '4')->update(['username' => 'supervisor']);
        // return 'Update data berhasil. Jumlah data yang diupdate: ' . $row. ' baris';

        // $row = DB::table('m_user')->where('user_id', '4')->delete();
        // return 'Delete data berhasil. Jumlah data yang dihapus: ' . $row. ' baris';

        // $data = DB::table('m_user')->get();
        // return view('user', ['data' => $data]);

        /*    $data = [
            'nama' => 'Pelanggan Pertama',
        ];
        UserModel::where('username', 'customer_1')->update($data); */

        $user = UserModel::all();
        return view('user', ['data' => $user]);
    }
}
