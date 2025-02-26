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
        DB::table('t_penjualan')->insert([
            [
                'penjualan_id' => 1,
                'user_id' => 1,
                'penjualan_kode' => 'PJ001',
                'pembeli' => 'Budi Santoso',
                'penjualan_tanggal' => '2024-06-01',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'penjualan_id' => 2,
                'user_id' => 1,
                'penjualan_kode' => 'PJ002',
                'pembeli' => 'Siti Rahma',
                'penjualan_tanggal' => '2024-06-02',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'penjualan_id' => 3,
                'user_id' => 2,
                'penjualan_kode' => 'PJ003',
                'pembeli' => 'Andi Wijaya',
                'penjualan_tanggal' => '2024-06-03',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'penjualan_id' => 4,
                'user_id' => 2,
                'penjualan_kode' => 'PJ004',
                'pembeli' => 'Lina Kusuma',
                'penjualan_tanggal' => '2024-06-04',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'penjualan_id' => 5,
                'user_id' => 3,
                'penjualan_kode' => 'PJ005',
                'pembeli' => 'Rizky Maulana',
                'penjualan_tanggal' => '2024-06-05',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'penjualan_id' => 6,
                'user_id' => 3,
                'penjualan_kode' => 'PJ006',
                'pembeli' => 'Nur Aisyah',
                'penjualan_tanggal' => '2024-06-06',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'penjualan_id' => 7,
                'user_id' => 1,
                'penjualan_kode' => 'PJ007',
                'pembeli' => 'Dedi Suhendra',
                'penjualan_tanggal' => '2024-06-07',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'penjualan_id' => 8,
                'user_id' => 1,
                'penjualan_kode' => 'PJ008',
                'pembeli' => 'Winda Lestari',
                'penjualan_tanggal' => '2024-06-08',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'penjualan_id' => 9,
                'user_id' => 3,
                'penjualan_kode' => 'PJ009',
                'pembeli' => 'Faisal Rahman',
                'penjualan_tanggal' => '2024-06-09',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'penjualan_id' => 10,
                'user_id' => 3,
                'penjualan_kode' => 'PJ010',
                'pembeli' => 'Dewi Anggraini',
                'penjualan_tanggal' => '2024-06-10',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
