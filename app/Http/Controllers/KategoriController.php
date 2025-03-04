<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class KategoriController extends Controller
{
    public function index(){
        // $data = [
        //     'kategori_kode' => 'SNK',
        //     'kategori_nama' => 'snack/makanan ringan',
        //     'created_at' => now()
        // ];
        // DB::table('m_kategori') -> insert($data);
        // return 'Insert data baru berhasil'; 

        // $row = DB::table('m_kategori')->where('kategori_kode', 'SNK')->update(['kategori_nama' => 'Ciki']);
        // return 'Data berhasil diupdate. Jumlah data yang diupdate: ' . $row . ' baris';

        //$row = DB::table('m_kategori')->where('kategori_kode', 'SNK')->delete();
        //return 'Data berhasil diupdate. Jumlah data yang diupdate: ' . $row . ' baris';
    
        $data = DB::table('m_kategori')->get();
        return view('kategori', ['data'=>$data]);
    }
}
