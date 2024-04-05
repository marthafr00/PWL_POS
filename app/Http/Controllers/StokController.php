<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use App\Models\StokModel;
use App\Models\BarangModel;
use App\Models\UserModel;
use Yajra\DataTables\Facades\DataTables;

class StokController extends Controller
{
    public function index(){
        $breadcrumb = (object)[
            'title' => 'Daftar Stok',
            'list'  => ['Home', 'Stok']
        ];

        $page = (object)[
            'title' => 'Daftar stok yang terdaftar dalam sistem'
        ];

        $activeMenu = 'stok';

        $barang = BarangModel::all();
        $user   = UserModel::all();

        return view('stok.index', ['breadcrumb' => $breadcrumb, 'page' => $page, 'barang' => $barang, 'user' => $user, 'activeMenu' => $activeMenu]);
    }

    public function list(Request $request) 
    { 
        $stoks = StokModel::select('stok_id', 'barang_id', 'user_id', 'stok_tanggal', 'stok_jumlah') 
        ->with('barang', 'user'); 

        if ($request->barang_id) {
            $stoks->where('barang_id', $request->barang_id);
        }

        if ($request->user_id) {
            $stoks->where('user_id', $request->user_id);
        }

        return DataTables::of($stoks) ->addIndexColumn() // menambahkan kolom index / no urut (default nama kolom: DT_RowIndex) 
        ->addColumn('aksi', function ($stok) { // menambahkan kolom aksi 
            $btn = '<a href="'.url('/stok/' . $stok->stok_id).'" class="btn btn-info btn-sm">Detail</a> '; 
            $btn .= '<a href="'.url('/stok/' . $stok->stok_id . '/edit').'" class="btn btn-warning btn-sm">Edit</a> '; 
            $btn .= '<form class="d-inline-block" method="POST" action="'. url('/stok/'.$stok->stok_id).'">' 
            . csrf_field() . method_field('DELETE') . 
            '<button type="submit" class="btn btn-danger btn-sm" 
            onclick="return confirm(\'Apakah Anda yakin menghapus data ini?\');">Hapus</button></form>'; 
            return $btn; 
        }) ->rawColumns(['aksi']) // memberitahu bahwa kolom aksi adalah html 
        ->make(true); 
    }

    public function create(){
        $breadcrumb = (object)[
            'title' => 'Tambah Stok',
            'list'  => ['Home', 'Stok', 'Tambah']
        ];

        $page = (object)[
            'title' => 'Tambah stok baru'
        ];

        $barang = BarangModel::all();
        $user = UserModel::all();

        $activeMenu = 'stok';

        return view('stok.create', ['breadcrumb' => $breadcrumb, 'page' => $page, 'barang' => $barang, 'user' => $user, 'activeMenu' => $activeMenu]);
    }

    public function store(Request $request){
        $request->validate([
            'barang_id'    => 'required|integer',
            'user_id'      => 'required|integer',
            'stok_tanggal' => 'required|date',
            'stok_jumlah'  => 'required|integer'

        ]);

        StokModel::create([
            'barang_id'    => $request->barang_id,
            'user_id'      => $request->user_id,
            'stok_tanggal' => $request->stok_tanggal,
            'stok_jumlah'  => $request->stok_jumlah,
        
        ]);

        return redirect('/stok')->with('success', 'Data stok berhasil disimpan');
    }

    public function show(string $id){
        $stok = StokModel::with(['barang', 'user'])->find($id);

        $breadcrumb = (object)[
            'title' => 'Detail Stok',
            'list'  => ['Home', 'Stok', 'Detail']
        ];

        $page = (object)[
            'title' => 'Detail Stok'
        ];

        $activeMenu = 'stok';

        return view('stok.show', ['breadcrumb' => $breadcrumb, 'page' => $page, 'stok' => $stok, 'activeMenu' => $activeMenu]);
    }

    public function edit(string $id){
        $stok = StokModel::find($id);
        $barang = BarangModel::all();
        $user = UserModel::all();

        $breadcrumb = (object)[
            'title' => 'Edit Stok',
            'list'  => ['Home', 'Stok', 'Edit']
        ];

        $page = (object)[
            'title' => 'Edit Stok'
        ];

        $activeMenu = 'stok';

        return view('stok.edit', ['breadcrumb' => $breadcrumb, 'page' => $page, 'stok' => $stok, 'barang' => $barang, 'user' => $user, 'activeMenu' => $activeMenu]);

    }

    public function update(Request $request, string $id){
        $request->validate([
            'stok_tanggal' => 'required|date',
            'stok_jumlah'  => 'required|integer'
        ]);

        StokModel::find($id)->update([
            'stok_tanggal' => $request->stok_tanggal,
            'stok_jumlah'  => $request->stok_jumlah,
        ]);

        return redirect('/stok')->with('success', 'Data barang berhasil diubah');
    }

    public function destroy(string $id){
        $check = StokModel::find($id);
        if(!$check){
            return redirect('/stok')->with('error', 'Data stok tidak ditemukan');
        }

        try{
            StokModel::destroy($id);

            return redirect('/stok')->with('success', 'Data stok berhasil dihapus');
        }catch(\Illuminate\Database\QueryException $e){
            return redirect('/stok')->with('error', 'Data stok gagal dihapus karena masih terdapat tabel lain yang terkait dengan data ini');
        }
    }
}
