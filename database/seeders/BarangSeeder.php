<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class BarangSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            [
                'barang_id' => 1,
                'kategori_id' => 5,
                'barang_kode' => 'IDM',
                'barang_nama' => 'INDOMI GORENG 50GR',
                'harga_beli' => 3000,
                'harga_jual' => 3500,
                'created_at' => now(),
            ],
            [
                'barang_id' => 2,
                'kategori_id' => 5,
                'barang_kode' => 'SMG',
                'barang_nama' => 'SAMYANG CARBONARA 75GR',
                'harga_beli' => 15000,
                'harga_jual' => 18000,
                'created_at' => now(),
            ],
            [
                'barang_id' => 3,
                'kategori_id' => 6,
                'barang_kode' => 'UHT',
                'barang_nama' => 'ULTRAMILK STRAWBERRY UHT 250ML',
                'harga_beli' => 4000,
                'harga_jual' => 5000,
                'created_at' => now(),
            ],
            [
                'barang_id' => 4,
                'kategori_id' => 6,
                'barang_kode' => 'YGH',
                'barang_nama' => 'CIMORY YOGHURT MANGO 100ML',
                'harga_beli' => 8000,
                'harga_jual' => 10000,
                'created_at' => now(),
            ],
            [
                'barang_id' => 5,
                'kategori_id' => 7,
                'barang_kode' => 'KRP',
                'barang_nama' => 'KRIPIK KENTANG KUSUKA 25GR',
                'harga_beli' => 3000,
                'harga_jual' => 5000,
                'created_at' => now(),
            ],
            [
                'barang_id' => 6,
                'kategori_id' => 7,
                'barang_kode' => 'BSK',
                'barang_nama' => 'BISKUIT HELLO PANDA 10GR',
                'harga_beli' => 2000,
                'harga_jual' => 3000,
                'created_at' => now(),
            ],
            [
                'barang_id' => 7,
                'kategori_id' => 8,
                'barang_kode' => 'MYS',
                'barang_nama' => 'MINYAK GORENG SUNCO 2L',
                'harga_beli' => 30000,
                'harga_jual' => 35000,
                'created_at' => now(),
            ],
            [
                'barang_id' => 8,
                'kategori_id' => 8,
                'barang_kode' => 'TLR',
                'barang_nama' => 'TELUR AYAM PREMIUM 1KG',
                'harga_beli' => 25000,
                'harga_jual' => 28000,
                'created_at' => now(),
            ],
            [
                'barang_id' => 9,
                'kategori_id' => 9,
                'barang_kode' => 'SPL',
                'barang_nama' => 'SUPERPEL LANTAI CITRUS 100ML',
                'harga_beli' => 20000,
                'harga_jual' => 25000,
                'created_at' => now(),
            ],
            [
                'barang_id' => 10,
                'kategori_id' => 9,
                'barang_kode' => 'SPN',
                'barang_nama' => 'SPONS PREMIUM JUMBO SIZE',
                'harga_beli' => 5000,
                'harga_jual' => 6000,
                'created_at' => now(),
            ],
        ];

        DB::table('m_barang')->insert($data);
    }
}
