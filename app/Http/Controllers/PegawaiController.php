<?php

namespace App\Http\Controllers;

use App\Models\Pegawai;
use Illuminate\Http\Request;
use App\Models\Tamu;
use App\Exports\PegawaiExport;
use Barryvdh\DomPDF\PDF;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Maatwebsite\Excel\Facades\Excel;

class PegawaiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // Check role user
        if (Auth::user()->role == "PETUGAS") {
            return redirect("/");
        }
        return view('admin.pegawai.index');
    }

    public function data()
    {
        // Ambil data semua pegawai
        $item = Pegawai::all();

        // Muat data dalam datatables
        return datatables()
            ->of($item)
            ->addIndexColumn()
            ->addColumn('aksi', function ($item) {
                return '
            <div class="btn-groub">
            <a href="#" class="btn btn-warning shadow btn-xs sharp me-1 editIcon" id="' . $item->id . '" data-toggle="modal" data-target=".editRowModal"><i class="fa fa-pencil"></i></a>
            <a href="#" type="button" class="btn btn-danger shadow btn-xs sharp deleteIcon" id="' . $item->id . '"><i class="fa fa-trash"></i></a>
            </div>
            ';
            })
            ->rawColumns(['aksi'])
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
        // Validasi input pengguna
        $validator = Validator::make($request->all(), [
            'nama' => 'required',
            'jabatan' => 'required',
            'jobdesc' => 'required',
        ]);

        // Jika validasi ada yang error, hentikan proses
        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()->all()]);
        }

        // Muat data input ke dalam model
        $data = new Pegawai();
        $data->nama = $request->nama;
        $data->jabatan = $request->jabatan;
        $data->jobdesc = $request->jobdesc;
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
        // Ambil data pegawai sesuai id
        $id = $request->id;
        $emp = Pegawai::find($id);

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
        // Validasi input pengguna
        $validator = Validator::make($request->all(), [
            // 'nip' => 'required',
            'nama' => 'required',
            // 'jk' => 'required',
            // 'alamat' => 'required',
            // 'devisi' => 'required',
            'jabatan' => 'required',
            'jobdesc' => 'required',

        ]);

        // Jika validasi ada yang error, hentikan proses
        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()->all()]);
        }

        // Ambil data pegawai dari database 
        $emp = Pegawai::find($request->emp_id);

        // Perbarui data pegawai berdasarkan input
        $empData = [
            'nama' => $request->nama,
            'jabatan' => $request->jabatan,
            'jobdesc' => $request->jobdesc,
        ];

        // Update data pegawai di database 
        $emp->update($empData);
        return response()->json([
            'status' => 200,
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        // Ambil data id
        $id = $request->id;

        // Hapus data pegawai
        Pegawai::destroy($id);
    }
}
