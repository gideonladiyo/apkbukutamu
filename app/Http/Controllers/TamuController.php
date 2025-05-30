<?php

namespace App\Http\Controllers;

use App\Models\Devisi;
use App\Models\Pegawai;
use App\Models\Tamu;
use App\Models\Reservasi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;
use RealRashid\SweetAlert\Facades\Alert;

class TamuController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
{
    if (Auth::check()) {
        $role = Auth::user()->role;

        // Jika role ADMIN atau PETUGAS, redirect ke /admin
        if ($role === 'ADMIN') {
            return redirect('/admin');
        }

        // Jika user login tapi bukan ADMIN atau PETUGAS (misal: tamu biasa)
        // tetap lanjut ke halaman welcome seperti biasa
    } else {
        // Jika belum login sama sekali (guest), redirect ke /reservasi
        return redirect()->route('reservasi.index');
    }

    // Ambil data pegawai
    $pegawai = Pegawai::all();

    // Ambil data reservasi yang belum disetujui
    $reservasi = Reservasi::where("is_accepted", false)->get();

    // Tampilkan halaman welcome
    return view('welcome', compact('reservasi', 'pegawai'));
}


    public function data()
    {
        // Ambil data Tamu
        $item = Tamu::leftJoin('tb_pegawai', 'tb_pegawai.id_pegawai', 'tb_tamu.tujuan_tamu_berkunjung')
            ->select('tb_tamu.*', 'tb_pegawai.devisi_pegawai AS nama_devisi')
            ->whereDate('tb_tamu.created_at', Carbon::today())
            ->get();

        // Muat data tamu dalam datatables
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

    public function rawdata()
    {
        // Ambil data Tamu
        $item = Tamu::leftJoin('tb_pegawai', 'tb_pegawai.id_pegawai', 'tb_tamu.tujuan_tamu_berkunjung')
            ->select('tb_tamu.*', 'tb_pegawai.devisi_pegawai AS nama_devisi')
            ->whereDate('tb_tamu.created_at', Carbon::today())
            ->get();

        return $item;
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
        // Buat model tamu dan masukkan input dari user
        $data = new Tamu();
        $data->nama = $request->nama;
        $data->alamat = $request->alamat;
        $data->keperluan = $request->keperluan;
        $data->tujuan = $request->tujuan;
        $data->instansi = $request->instansi;
        $data->kontak = $request->kontak;
        // Simpan data
        $data->save();
        // Kirim notifikasi berhasil
        Alert::success('Data Tamu Berhasil Disimpan', 'Success Message');
        $reservasi = Reservasi::where("is_accepted", false)->whereDate('created_at', Carbon::today())
            ->get();
        return redirect("/");
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
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
