<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PenjualanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            [
                'penjualan_id' => 1,
                'user_id' => 1,
                'pembeli'  => 'Nadilla',
                'penjualan_kode' => 'ABC',
                'penjualan_tanggal' => '2024-02-29 16:28:00',
                'created_at' => now(),
            ],
            [
                'penjualan_id' => 2,
                'user_id' => 1,
                'pembeli'  => 'Amanda',
                'penjualan_kode' => 'DEF',
                'penjualan_tanggal' => '2024-02-29 16:29:00',
                'created_at' => now(),
            ],
            [
                'penjualan_id' => 3,
                'user_id' => 1,
                'pembeli'  => 'Nadilla',
                'penjualan_kode' => 'GHI',
                'penjualan_tanggal' => '2024-02-29 16:30:00',
                'created_at' => now(),
            ],
            [
                'penjualan_id' => 4,
                'user_id' => 2,
                'pembeli'  => 'Martha',
                'penjualan_kode' => 'JKL',
                'penjualan_tanggal' => '2024-02-29 16:31:00',
                'created_at' => now(),
            ],
            [
                'penjualan_id' => 5,
                'user_id' => 2,
                'pembeli'  => 'Martha',
                'penjualan_kode' => 'MNO',
                'penjualan_tanggal' => '2024-02-29 16:32:00',
                'created_at' => now(),
            ],
            [
                'penjualan_id' => 6,
                'user_id' => 2,
                'pembeli'  => 'Nadilla',
                'penjualan_kode' => 'PQR',
                'penjualan_tanggal' => '2024-02-29 16:32:00',
                'created_at' => now(),
            ],
            [
                'penjualan_id' => 7,
                'user_id' => 3,
                'pembeli'  => 'Nadilla',
                'penjualan_kode' => 'STU',
                'penjualan_tanggal' => '2024-02-29 16:33:00',
                'created_at' => now(),
            ],
            [
                'penjualan_id' => 8,
                'user_id' => 3,
                'pembeli'  => 'Nadilla',
                'penjualan_kode' => 'VWX',
                'penjualan_tanggal' => '2024-02-29 16:33:00',
                'created_at' => now(),
            ],
            [
                'penjualan_id' => 9,
                'user_id' => 2,
                'pembeli'  => 'Martha',
                'penjualan_kode' => 'YZA',
                'penjualan_tanggal' => '2024-02-29 16:33:00',
                'created_at' => now(),
            ],
            [
                'penjualan_id' => 10,
                'user_id' => 1,
                'pembeli'  => 'Amanda',
                'penjualan_kode' => 'BCD',
                'penjualan_tanggal' => '2024-02-29 16:34:00',
                'created_at' => now(),
            ],
        ];

        DB::table('m_penjualan')->insert($data);
    }
}
