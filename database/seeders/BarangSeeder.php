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
        $barang = [
            ['barang_id' => 1, 'kategori_id' => 1, 'barang_kode' => 'BRG001', 'barang_nama' => 'Barang A', 'harga_jual' => 10000, 'harga_beli' => 8000, 'created_at' => now(), 'updated_at' => now()],
            ['barang_id' => 2, 'kategori_id' => 1, 'barang_kode' => 'BRG002', 'barang_nama' => 'Barang B', 'harga_jual' => 12000, 'harga_beli' => 9000, 'created_at' => now(), 'updated_at' => now()],
            ['barang_id' => 3, 'kategori_id' => 1, 'barang_kode' => 'BRG003', 'barang_nama' => 'Barang C', 'harga_jual' => 15000, 'harga_beli' => 11000, 'created_at' => now(), 'updated_at' => now()],
            ['barang_id' => 4, 'kategori_id' => 2, 'barang_kode' => 'BRG004', 'barang_nama' => 'Barang D', 'harga_jual' => 18000, 'harga_beli' => 14000, 'created_at' => now(), 'updated_at' => now()],
            ['barang_id' => 5, 'kategori_id' => 2, 'barang_kode' => 'BRG005', 'barang_nama' => 'Barang E', 'harga_jual' => 20000, 'harga_beli' => 16000, 'created_at' => now(), 'updated_at' => now()],
            ['barang_id' => 6, 'kategori_id' => 2, 'barang_kode' => 'BRG006', 'barang_nama' => 'Barang F', 'harga_jual' => 22000, 'harga_beli' => 18000, 'created_at' => now(), 'updated_at' => now()],
            ['barang_id' => 7, 'kategori_id' => 3, 'barang_kode' => 'BRG007', 'barang_nama' => 'Barang G', 'harga_jual' => 25000, 'harga_beli' => 20000, 'created_at' => now(), 'updated_at' => now()],
            ['barang_id' => 8, 'kategori_id' => 3, 'barang_kode' => 'BRG008', 'barang_nama' => 'Barang H', 'harga_jual' => 27000, 'harga_beli' => 22000, 'created_at' => now(), 'updated_at' => now()],
            ['barang_id' => 9, 'kategori_id' => 3, 'barang_kode' => 'BRG009', 'barang_nama' => 'Barang I', 'harga_jual' => 30000, 'harga_beli' => 25000, 'created_at' => now(), 'updated_at' => now()],
            ['barang_id' => 10, 'kategori_id' => 4, 'barang_kode' => 'BRG010', 'barang_nama' => 'Barang J', 'harga_jual' => 32000, 'harga_beli' => 27000, 'created_at' => now(), 'updated_at' => now()],
            ['barang_id' => 11, 'kategori_id' => 4, 'barang_kode' => 'BRG011', 'barang_nama' => 'Barang K', 'harga_jual' => 35000, 'harga_beli' => 30000, 'created_at' => now(), 'updated_at' => now()],
            ['barang_id' => 12, 'kategori_id' => 4, 'barang_kode' => 'BRG012', 'barang_nama' => 'Barang L', 'harga_jual' => 37000, 'harga_beli' => 32000, 'created_at' => now(), 'updated_at' => now()],
            ['barang_id' => 13, 'kategori_id' => 5, 'barang_kode' => 'BRG013', 'barang_nama' => 'Barang M', 'harga_jual' => 40000, 'harga_beli' => 35000, 'created_at' => now(), 'updated_at' => now()],
            ['barang_id' => 14, 'kategori_id' => 5, 'barang_kode' => 'BRG014', 'barang_nama' => 'Barang N', 'harga_jual' => 42000, 'harga_beli' => 37000, 'created_at' => now(), 'updated_at' => now()],
            ['barang_id' => 15, 'kategori_id' => 5, 'barang_kode' => 'BRG015', 'barang_nama' => 'Barang O', 'harga_jual' => 45000, 'harga_beli' => 40000, 'created_at' => now(), 'updated_at' => now()],
        ];
        DB::table('m_barang')->insert($barang);
    }
}
