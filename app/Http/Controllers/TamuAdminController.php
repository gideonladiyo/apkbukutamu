<?php

namespace App\Http\Controllers;

use App\Models\Tamu;
use App\Models\Pegawai;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use App\Exports\TamuExport;
use Barryvdh\DomPDF\Facade\PDF;
use Maatwebsite\Excel\Facades\Excel;

class TamuAdminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (Auth::user()->role == "PETUGAS") {
            return redirect("/");
        }
        $pegawai = Pegawai::all();
        return view('admin.tamu.index', compact('pegawai'));
    }

    public function data(Request $request)
    {
        // Ambil data pegawai, filter jika ada data tanggal
        $date1 = $request->query('date1');
        $date2 = $request->query('date2');
        $query = Tamu::leftJoin('tb_pegawai', 'tb_pegawai.id_pegawai', '=', 'tb_tamu.tujuan_tamu_berkunjung')
            ->select('tb_tamu.*', 'tb_pegawai.devisi_pegawai AS nama_devisi');
        if ($date1 && $date2) {
            $query->whereBetween('tb_tamu.created_at', [Carbon::parse($date1)->startOfDay(), Carbon::parse($date2)->endOfDay()]);
        }

        $item = $query->get();

        // Muat ke dalam datatable
        return datatables()
            ->of($item)
            ->addIndexColumn()
            ->addColumn('hari', function ($item) {
                // return Carbon::now()->isoFormat('dddd, D MMMM Y');
                return $item->created_at->isoFormat('dddd, D MMM Y');
            })
            ->addColumn('aksi', function ($item) {
                return '
            <div class="btn-groub">
            <a href="#" class="btn btn-warning shadow btn-xs sharp me-1 editIcon" id="' . $item->id . '" data-toggle="modal" data-target=".editRowModal"><i class="fa fa-pencil"></i></a>
            <a href="#" type="button" class="btn btn-danger shadow btn-xs sharp deleteIcon" id="' . $item->id . '"><i class="fa fa-trash"></i></a>
            </div>
            ';
            })
            ->rawColumns(['aksi', 'hari'])
            ->make(true);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // Validasi input user
        $validator = Validator::make($request->all(), [
            'nama' => 'required',
            'alamat' => 'required',
            'keperluan' => 'required',
            'tujuan' => 'required',
            'instansi' => 'required',
            'kontak' => 'required',
        ]);

        // Kembalikan jika ada error
        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()->all()]);
        }

        // Muat data input ke model Tamu
        $data = new Tamu();
        $data->nama = $request->nama;
        $data->alamat = $request->alamat;
        $data->keperluan = $request->keperluan;
        $data->tujuan = $request->tujuan;
        $data->instansi = $request->instansi;
        $data->kontak = $request->kontak;

        // Simpan data
        $data->save();

        return response()->json([
            'status' => 200,
            'message' => 'Berhasil'
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request)
    {
        // Ambil data tamu sesuai id yang diterima
        $id = $request->id;
        $emp = Tamu::find($id);

        return response()->json($emp);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        // Validasi Input Pengguna
        $validator = Validator::make($request->all(), [
            'nama' => 'required',
            'alamat' => 'required',
            'instansi' => 'required',
            'keperluan' => 'required',
            'tujuan' => 'required',
            'kontak' => 'required',

        ]);

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()->all()]);
        }

        // Ambil data tamu sesuai id
        $emp = Tamu::find($request->emp_id);

        // Perbarui data tamu sesuai input
        $empData = [
            'nama' => $request->nama,
            'alamat' => $request->alamat,
            'instansi' => $request->instansi,
            'keperluan' => $request->keperluan,
            'tujuan' => $request->tujuan,
            'kontak' => $request->kontak,
        ];

        // Update data di database
        $emp->update($empData);
        return response()->json([
            'status' => 200,
            'request' => $empData,
            'data' => $emp
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    public function cetak()
    {
        // Ambi data tamu dan pegawai
        $datatamu = Tamu::leftJoin('tb_pegawai', 'tb_pegawai.id_pegawai', 'tb_tamu.tujuan_tamu_berkunjung')
            ->select('tb_tamu.*', 'tb_pegawai.devisi_pegawai AS nama_devisi')->get();

        $no = 1;
        // Load file pdf
        $pdf = Pdf::loadview('admin.tamu.cetak', ['datatamu' => $datatamu], ['no' => $no]);

        // Download file
        return $pdf->download('laporan-tamu.pdf');
    }


    public function destroy(Request $request)
    {
        $id = $request->id;
        Tamu::destroy($id);
    }
    public function export_excell()
    {
        // $datatamu = Tamu::leftJoin('devisi', 'devisi.id', 'tamu.tujuan')
        // ->select('tamu.*','nama_devisi')->get();

        // //  $datatamu = Tamu::all();
        //  $no = 1;

        return Excel::download(new TamuExport, 'Tamu.xlsx');
    }
}