<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class StockSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            ['stock_id' => 1, 'supplier_id' => 1, 'barang_id' => 1, 'user_id' => 1, 'stock_tanggal' => '2024-06-01', 'stock_jumlah' => 50, 'created_at' => now(), 'updated_at' => now()],
            ['stock_id' => 2, 'supplier_id' => 1, 'barang_id' => 2, 'user_id' => 1, 'stock_tanggal' => '2024-06-02', 'stock_jumlah' => 40, 'created_at' => now(), 'updated_at' => now()],
            ['stock_id' => 3, 'supplier_id' => 1, 'barang_id' => 3, 'user_id' => 2, 'stock_tanggal' => '2024-06-03', 'stock_jumlah' => 60, 'created_at' => now(), 'updated_at' => now()],
            ['stock_id' => 4, 'supplier_id' => 2, 'barang_id' => 4, 'user_id' => 2, 'stock_tanggal' => '2024-06-04', 'stock_jumlah' => 30, 'created_at' => now(), 'updated_at' => now()],
            ['stock_id' => 5, 'supplier_id' => 2, 'barang_id' => 5, 'user_id' => 3, 'stock_tanggal' => '2024-06-05', 'stock_jumlah' => 25, 'created_at' => now(), 'updated_at' => now()],
            ['stock_id' => 6, 'supplier_id' => 2, 'barang_id' => 6, 'user_id' => 3, 'stock_tanggal' => '2024-06-06', 'stock_jumlah' => 55, 'created_at' => now(), 'updated_at' => now()],
            ['stock_id' => 7, 'supplier_id' => 3, 'barang_id' => 7, 'user_id' => 1, 'stock_tanggal' => '2024-06-07', 'stock_jumlah' => 20, 'created_at' => now(), 'updated_at' => now()],
            ['stock_id' => 8, 'supplier_id' => 3, 'barang_id' => 8, 'user_id' => 1, 'stock_tanggal' => '2024-06-08', 'stock_jumlah' => 45, 'created_at' => now(), 'updated_at' => now()],
            ['stock_id' => 9, 'supplier_id' => 3, 'barang_id' => 9, 'user_id' => 2, 'stock_tanggal' => '2024-06-09', 'stock_jumlah' => 35, 'created_at' => now(), 'updated_at' => now()],
            ['stock_id' => 10, 'supplier_id' => 1, 'barang_id' => 10, 'user_id' => 2, 'stock_tanggal' => '2024-06-10', 'stock_jumlah' => 50, 'created_at' => now(), 'updated_at' => now()],
            ['stock_id' => 11, 'supplier_id' => 1, 'barang_id' => 11, 'user_id' => 3, 'stock_tanggal' => '2024-06-11', 'stock_jumlah' => 60, 'created_at' => now(), 'updated_at' => now()],
            ['stock_id' => 12, 'supplier_id' => 2, 'barang_id' => 12, 'user_id' => 3, 'stock_tanggal' => '2024-06-12', 'stock_jumlah' => 30, 'created_at' => now(), 'updated_at' => now()],
            ['stock_id' => 13, 'supplier_id' => 2, 'barang_id' => 13, 'user_id' => 2, 'stock_tanggal' => '2024-06-13', 'stock_jumlah' => 40, 'created_at' => now(), 'updated_at' => now()],
            ['stock_id' => 14, 'supplier_id' => 3, 'barang_id' => 14, 'user_id' => 2, 'stock_tanggal' => '2024-06-14', 'stock_jumlah' => 55, 'created_at' => now(), 'updated_at' => now()],
            ['stock_id' => 15, 'supplier_id' => 3, 'barang_id' => 15, 'user_id' => 3, 'stock_tanggal' => '2024-06-15', 'stock_jumlah' => 45, 'created_at' => now(), 'updated_at' => now()],
        ];
        DB::table('t_stock')->insert($data);
    }
}
