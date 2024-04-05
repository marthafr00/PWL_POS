<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\PenjualanModel;
use App\Models\UserModel;
use Yajra\DataTables\Facades\DataTables;

class PenjualanController extends Controller
{
    public function index(){
        $breadcrumb = (object)[
            'title' => 'Daftar Penjualan',
            'list'  => ['Home', 'Penjualan']
        ];

        $page = (object)[
            'title' => 'Daftar penjualan yang terdaftar dalam sistem'
        ];

        $activeMenu = 'penjualan';

        $user = UserModel::all();

        return view('penjualan.index', ['breadcrumb' => $breadcrumb, 'page' => $page, 'user' => $user, 'activeMenu' => $activeMenu]);
    }

    // Ambil data penjualan dalam bentuk json untuk datatables 
    public function list(Request $request) 
    { 
        $penjualans = PenjualanModel::select('penjualan_id', 'user_id', 'pembeli', 'penjualan_kode', 'penjualan_tanggal') 
        ->with('user'); 

        // Filter data penjualan berdasarkan user_id
        if ($request->user_id) {
            $penjualans->where('user_id', $request->user_id);
        }

        return DataTables::of($penjualans) ->addIndexColumn() // menambahkan kolom index / no urut (default nama kolom: DT_RowIndex) 
        ->addColumn('aksi', function ($penjualan) { // menambahkan kolom aksi 
            $btn = '<a href="'.url('/penjualan/' . $penjualan->penjualan_id).'" class="btn btn-info btn-sm">Detail</a> '; 
            $btn .= '<a href="'.url('/penjualan/' . $penjualan->penjualan_id . '/edit').'" class="btn btn-warning btn-sm">Edit</a> '; 
            $btn .= '<form class="d-inline-block" method="POST" action="'. url('/penjualan/'.$penjualan->penjualan_id).'">' 
            . csrf_field() . method_field('DELETE') . 
            '<button type="submit" class="btn btn-danger btn-sm" 
            onclick="return confirm(\'Apakah Anda yakin menghapus data ini?\');">Hapus</button></form>'; 
            return $btn; 
        }) ->rawColumns(['aksi']) // memberitahu bahwa kolom aksi adalah html 
        ->make(true); 
    }

    public function create(){
        $breadcrumb = (object)[
            'title' => 'Tambah Penjualan',
            'list'  => ['Home', 'Penjualan', 'Tambah']
        ];

        $page = (object)[
            'title' => 'Tambah penjualan baru'
        ];

        $user = UserModel::all(); // ambil data user untuk ditampilkan di form
        $activeMenu = 'penjualan'; // set menu yang aktif

        return view('penjualan.create', ['breadcrumb' => $breadcrumb, 'page' => $page, 'user' => $user, 'activeMenu' => $activeMenu]);
    }

    public function store(Request $request){
        $request -> validate([
            'user_id'            => 'required | integer',
            'pembeli'            => 'required|string|max:50',
            'penjualan_kode'     => 'required|string|max:20|unique:m_penjualan,penjualan_kode',
            'penjualan_tanggal' => 'required|date'
        ]);

        PenjualanModel::create([
            'user_id'           => $request->user_id,
            'pembeli'           => $request->pembeli,
            'penjualan_kode'    => $request->penjualan_kode,
            'penjualan_tanggal' => $request->penjualan_tanggal
        ]);

        return redirect('/penjualan')->with('success', 'Data penjualan berhasil disimpan');
    }

    public function show(string $id){
        $penjualan = PenjualanModel::with('user')->find($id);

        $breadcrumb = (object)[
            'title' => 'Detail Penjualan',
            'list'  => ['Home', 'Penjualan', 'Detail']
        ];

        $page = (object)[
            'title' => 'Detail Penjualan'
        ];

        $activeMenu = 'penjualan'; // set menu yang aktif

        return view('penjualan.show', ['breadcrumb' => $breadcrumb, 'page' => $page, 'penjualan' => $penjualan, 'activeMenu' => $activeMenu]);
    }

    public function edit(string $id){
        $penjualan = PenjualanModel::find($id);
        $user = UserModel::all();

        $breadcrumb = (object)[
            'title' => 'Edit penjualan',
            'list'  => ['Home', 'Penjualan', 'Edit']
        ];

        $page = (object)[
            'title' => 'Edit penjualan'
        ];

        $activeMenu = 'penjualan';

        return view('penjualan.edit', ['breadcrumb' => $breadcrumb, 'page' => $page, 'penjualan' => $penjualan, 'user' => $user, 'activeMenu' => $activeMenu]);

    }

    public function update(Request $request, string $id)
    {
        $request->validate([
            'user_id'            => 'required | integer',
            'pembeli'            => 'required|string|max:50',
            'penjualan_kode'     => 'required|string|max:20|unique:m_penjualan,penjualan_kode,'.$id.',penjualan_id',
            'penjualan_tanggal' => 'required|date'
        ]);

        PenjualanModel::find($id)->update([
            'user_id'           => $request->user_id,
            'pembeli'           => $request->pembeli,
            'penjualan_kode'    => $request->penjualan_kode,
            'penjualan_tanggal' => $request->penjualan_tanggal
        ]);

        return redirect('/penjualan')->with('success', 'Data penjualan berhasil diubah');
    }

    public function destroy(string $id){
        $check = PenjualanModel::find($id);
        if(!$check){
            return redirect('/penjualan')->with('error', 'Data penjualan tidak ditemukan');
        }

        try{
            PenjualanModel::destroy($id);

            return redirect('/penjualan')->with('success', 'Data penjualan berhasil dihapus');
        }catch(\Illuminate\Database\QueryException $e){
            return redirect('/penjualan')->with('error', 'Data penjualan gagal dihapus karena masih terdapat tabel lain yang terkait dengan data ini');
        }
    }
}
