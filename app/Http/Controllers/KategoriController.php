<?php

namespace App\Http\Controllers;

use App\Models\KategoriModel;
use DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Yajra\DataTables\DataTables;
use PhpOffice\PhpSpreadsheet\IOFactory;
use Barryvdh\DomPDF\Facade\PDF;


class KategoriController extends Controller
{
    public function index()
    {
        $breadcrumb = (object) [
            'title' => 'Daftar Kategori',
            'list' => ['Home', 'Kategori']
        ];

        $page = (object) [
            'title' => 'Daftar Kategori yang terdaftar dalam sistem'
        ];

        $activeMenu = 'kategori';

        return view('kategori.index', [
            'breadcrumb' => $breadcrumb,
            'page' => $page,
            'activeMenu' => $activeMenu
        ]);
    }

    public function list(Request $request)
    {
        $kategoris = KategoriModel::select('kategori_id', 'kategori_nama', 'kategori_kode');

        //Filter berdasarkan kategori
        if ($request->kategori_id) {
            $kategoris->where('kategori_id', $request->kategori_id);
        }

        return DataTables::of($kategoris)
            ->addIndexColumn()->addColumn('aksi', function ($kategori) {

                $btn = '<button onclick="modalAction(\'' . url('/kategori/' . $kategori->kategori_id .'/show_ajax') . '\')" class="btn btn-info btn-sm">Detail</button> ';
                $btn .= '<button onclick="modalAction(\'' . url('/kategori/' . $kategori->kategori_id .'/edit_ajax') . '\')" class="btn btn-warning btn-sm">Edit</button> ';
                $btn .= '<button onclick="modalAction(\'' . url('/kategori/' . $kategori->kategori_id .'/delete_ajax') . '\')" class="btn btn-danger btn-sm">Hapus</button> ';
                return $btn;

            })->rawColumns(['aksi'])
            ->make(true);
    }


    public function create()
    {
        $breadcrumb = (object) [
            'title' => 'Tambah kategori',
            'list' => ['Home', 'kategori', 'Tambah']
        ];

        $page = (object) [
            'title' => 'Tambah kategori baru'
        ];

        $activeMenu = 'kategori'; // set menu yang sedang aktif

        return view('kategori.create', [
            'breadcrumb' => $breadcrumb,
            'page' => $page,
            'activeMenu' => $activeMenu
        ]);
    }


    public function store(Request $request)
    {
        $request->validate([
            'kategori_nama' => 'required|string|max:100',
            'kategori_kode' => 'required|string|max:5|unique:m_kategori,kategori_kode'
        ]);

        KategoriModel::create([
            'kategori_nama' => $request->kategori_nama,
            'kategori_kode' => $request->kategori_kode,
        ]);

        return redirect('/kategori')->with('success', 'Data kategori berhasil disimpan');
    }


    public function create_ajax()
    {
        return view('kategori.create_ajax');
    }

    public function store_ajax(Request $request)
    {
        if ($request->ajax() || $request->wantsJson()) {
            $rules = [
                'kategori_nama' => 'required|string|max:100',
                'kategori_kode' => 'required|string|max:5|unique:m_kategori,kategori_kode'
            ];

            $validator = Validator::make($request->all(), $rules);

            if ($validator->fails()) {
                $errorMessage = 'Validasi Gagal';
                if ($validator->errors()->has('kategori_kode')) {
                    $errorMessage = 'Validasi Gagal (Kode Sudah Digunakan)';
                }

                return response()->json([
                    'status' => false,
                    'message' => $errorMessage,
                    'msgField' => $validator->errors(),
                ]);
            }

            KategoriModel::create($request->all());

            return response()->json([
                'status' => true,
                'message' => 'Data kategori berhasil disimpan'
            ]);
        }

        return redirect('/');
    }

    // Menampilkan detail kategori
    public function show(string $id)
    {
        $kategori = KategoriModel::find($id);

        $breadcrumb = (object) [
            'title' => 'Detail kategori',
            'list' => ['Home', 'kategori', 'Detail']
        ];

        $page = (object) [
            'title' => 'Detail kategori'
        ];

        $activeMenu = 'kategori'; // set menu yang sedang aktif

        return view('kategori.show', [
            'breadcrumb' => $breadcrumb,
            'page' => $page,
            'kategori' => $kategori,
            'activeMenu' => $activeMenu
        ]);
    }

    public function show_ajax(string $id)
    {
        $kategori = KategoriModel::find($id);

        return view('kategori.show_ajax', ['kategori' => $kategori]);
    }

    // Menampilkan halaman form edit kategori
    public function edit(string $id)
    {
        $kategori = KategoriModel::find($id);

        $breadcrumb = (object) [
            'title' => 'Edit kategori',
            'list' => ['Home', 'kategori', 'Edit']
        ];

        $page = (object) [
            'title' => 'Edit kategori'
        ];

        $activeMenu = 'kategori'; // set menu yang sedang aktif

        return view('kategori.edit', [
            'breadcrumb' => $breadcrumb,
            'page' => $page,
            'kategori' => $kategori,
            'activeMenu' => $activeMenu
        ]);
    }

    // Menyimpan perubahan data kategori
    public function update(Request $request, string $id)
    {
        $request->validate([
            'kategori_nama' => 'required|string|max:100',
            'kategori_kode' => 'required|string|max:5'
        ]);

        try {
            $kategori = KategoriModel::find($id);

            if (!$kategori) {
                return redirect('/kategori')->with('error', 'Data Kategori tidak ditemukan');
            }
            KategoriModel::find($id)->update([
                'kategori_nama' => $request->kategori_nama,
                'kategori_kode' => $request->kategori_kode,
            ]);
            return redirect('/kategori')->with('success', 'Data kategori berhasil diubah');
        } catch (\Exception $e) {
            return redirect('/kategori')->with('error', 'Gagal Update (kode sudah terpakai)');
        }
    }


    public function edit_ajax(string $id)
    {
        $kategori = KategoriModel::find($id);

        return view('kategori.edit_ajax', ['kategori' => $kategori]);
    }

    public function update_ajax(Request $request, $id)
    {
        if ($request->ajax() || $request->wantsJson()) {
            $rules = [
                'kategori_nama' => 'required|string|max:100',
                'kategori_kode' => 'required|string|max:5|unique:m_kategori,kategori_kode,' . $id . ',kategori_id'
            ];
    
            $messages = [
                'kategori_kode.unique' => 'Kode Sudah Digunakan'
            ];
    
            $validator = Validator::make($request->all(), $rules, $messages);
    
            if ($validator->fails()) {
                $errorMessage = 'Validasi Gagal';
                if ($validator->errors()->has('kategori_kode')) {
                    $errorMessage = 'Validasi Gagal (Kode Sudah Digunakan)';
                }
    
                return response()->json([
                    'status' => false,
                    'message' => $errorMessage,
                    'msgField' => $validator->errors()
                ]);
            }
    
            $kategori = KategoriModel::find($id);
            if ($kategori) {
                $kategori->update($request->all());
                return response()->json(['status' => true, 'message' => 'Data kategori berhasil diperbarui']);
            } else {
                return response()->json(['status' => false, 'message' => 'Data kategori tidak ditemukan']);
            }
        }
        return redirect('/');
    }


    public function confirm_ajax(string $id)
    {
        $kategori = KategoriModel::find($id);

        return view('kategori.confirm_ajax', ['kategori' => $kategori]);
    }

    // public function delete_ajax(Request $request, $id)
    // {
    //     if ($request->ajax() || $request->wantsJson()) {
    //         $kategori = KategoriModel::find($id);
    //         if ($kategori) {
    //             $kategori->delete();
    //             return response()->json([
    //                 'status' => true,
    //                 'message' => 'Data berhasil dihapus'
    //             ]);
    //         } else {
    //             return response()->json([
    //                 'status' => false,
    //                 'message' => 'Data tidak ditemukan'
    //             ]);
    //         }
    //     }
    //     return redirect('/');
    // }

    public function delete_ajax(Request $request, $id){
        // cek apakah request dari ajax
        if ($request->ajax() || $request->wantsJson()) {
            $user = KategoriModel::find($id);
            if ($user) {
                try {
                    $user->delete();
                    return response()->json([
                        'status' => true,
                        'message' => 'Data berhasil dihapus'
                    ]);
                } catch (\Illuminate\Database\QueryException $e) {
                    return response()->json([
                        'status' => false,
                        'message' => 'Data tidak dapat dihapus karena masih terdapat tabel lain yang terkait dengan data ini.'
                    ]);
                }
            } else {
                return response()->json([
                    'status' => false,
                    'message' => 'Data tidak ditemukan'
                ]);
            }
        }
    
        return redirect('/');
    }

    // Menghapus data kategori
    public function destroy(string $id)
    {
        $check = KategoriModel::find($id);
        if (!$check) {
            // untuk mengecek apakah data kategori dengan id yang dimaksud ada atau tidak
            return redirect('/kategori')->with('error', 'Data kategori tidak ditemukan');
        }

        try {
            KategoriModel::destroy($id); // Hapus data kategori
            return redirect('/kategori')->with('success', 'Data kategori berhasil dihapus');
        } catch (\Illuminate\Database\QueryException $e) {
            // Jika terjadi error ketika menghapus data, redirect kembali ke halaman dengan membawa pesan error
            return redirect('/kategori')->with(
                'error',
                'Data kategori gagal dihapus karena masih terdapat tabel lain yang terkait dengan data ini'
            );
        }
    }

    public function import()
    {
        return view('kategori.import');
    }
    public function import_ajax(Request $request)
    {
        if($request->ajax() || $request->wantsJson()){
            $rules = [
                // validasi file harus xls atau xlsx, max 1MB
                'file_kategori' => ['required', 'mimes:xlsx', 'max:1024']
            ];
            $validator = Validator::make($request->all(), $rules);
            if($validator->fails()){
                return response()->json([
                    'status' => false,
                    'message' => 'Validasi Gagal',
                    'msgField' => $validator->errors()
                ]);
            }
            $file = $request->file('file_kategori'); // ambil file dari request
            $reader = IOFactory::createReader('Xlsx'); // load reader file excel
            $reader->setReadDataOnly(true); // hanya membaca data
            $spreadsheet = $reader->load($file->getRealPath()); // load file excel
            $sheet = $spreadsheet->getActiveSheet(); // ambil sheet yang aktif
            $data = $sheet->toArray(null, false, true, true); // ambil data excel
            $insert = [];
            if(count($data) > 1){ // jika data lebih dari 1 baris
                foreach ($data as $baris => $value) {
                    if($baris > 1){ // baris ke 1 adalah header, maka lewati
                        $insert[] = [
                            'kategori_nama' => $value['A'],
                            'kategori_kode' => $value['B'],
                            'created_at' => now(),
                        ];
                    }
                }
                if(count($insert) > 0){
                    // insert data ke database, jika data sudah ada, maka diabaikan
                    KategoriModel::insertOrIgnore($insert);
                }
                return response()->json([
                    'status' => true,
                    'message' => 'Data berhasil diimport'
                ]);
            }else{
                return response()->json([
                    'status' => false,
                    'message' => 'Tidak ada data yang diimport'
                ]);
            }
        }
        return redirect('/');
    }

    public function export_excel()
    {
        // ambil data kategori yang akan di export
        $kategori = KategoriModel::select('kategori_nama',  'kategori_kode')
            // ->orderBy('kategori_')
            // ->with('kategori')
            ->get();
        // load library excel
        $spreadsheet = new \PhpOffice\PhpSpreadsheet\Spreadsheet();
        $sheet = $spreadsheet->getActiveSheet();   // ambil sheet yang aktif

        $sheet->setCellValue('A1', 'No');
        $sheet->setCellValue('B1', 'Nama kategori');
        $sheet->setCellValue('C1', 'Kode Kategori');
        $sheet->getStyle('A1:F1')->getFont()->setBold(true);   // bold header

        $no = 1;             // nomor data dimulai dari 1
        $baris = 2;          // baris data dimulai dari baris ke 2
        foreach ($kategori as $key => $value) {
            $sheet->setCellValue('A' . $baris, $no);
            $sheet->setCellValue('B' . $baris, $value->kategori_nama);
            $sheet->setCellValue('C' . $baris, $value->kategori_kode);
            $baris++;
            $no++;
        }

        foreach (range('A', 'C') as $columnID) {
            $sheet->getColumnDimension($columnID)->setAutoSize(true); // set auto size untuk kolom
        }

        $sheet->setTitle('Data kategori'); // set title sheet

        $writer = IOFactory::createWriter($spreadsheet, 'Xlsx');
        $filename = 'Data kategori ' . date('Y-m-d H:i:s') . '.xlsx';

        header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
        header('Content-Disposition: attachment;filename="' . $filename . '"');
        header('Cache-Control: max-age=0');
        header('Cache-Control: max-age=1');
        header('Expires: Mon, 26 Jul 1997 05:00:00 GMT');
        header('Last-Modified: ' . gmdate('D, d M Y H:i:s') . ' GMT');
        header('Cache-Control: cache, must-revalidate');
        header('Pragma: public');

        $writer->save('php://output');
        exit;
    }

    public function export_pdf(){
        $kategori = KategoriModel::select('kategori_id', 'kategori_nama', 'kategori_kode')
            ->get();

        // use Barryvdh\DOmPDF\Facade as PDF;
        $pdf = PDF::loadView('Kategori.export_pdf', ['kategori' => $kategori]);
        $pdf->setPaper('a4', 'portrait'); // set kertas A4 potrait
        $pdf->setOption("isRemoteEnabled", true); // set agar bisa menampilkan gambar dari url
        $pdf->render();

        return $pdf->stream('Data Kategori ' .date('Y-m-d_H-i-s').'.pdf'); // download file pdf
    }
}