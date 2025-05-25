<?php

namespace App\Http\Controllers;

use App\Events\ReservasiUpdated;
use App\Models\Pegawai;
use App\Models\Reservasi;
use Illuminate\Http\Request;
use Carbon\Carbon;
use RealRashid\SweetAlert\Facades\Alert;

class ReservasiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // Ambil data seluruh pegawai
        $pegawai = Pegawai::all();

        // Ke halaman reservasi
        return view('reservasi-new', compact('pegawai'));
    }

    public function data()
    {
        // Ambil Data reservasi beserta pegawai
        $item = Reservasi::leftJoin('tb_pegawai', 'tb_pegawai.id_pegawai', 'tb_reservasi.tujuan_tamu_reservasi')
            ->select('tb_reservasi.*', 'tb_pegawai.devisi_pegawai AS nama_pegawai')
            ->whereDate('tb_reservasi.jadwal_tamu_reservasi', Carbon::today())
            ->orWhere('tb_reservasi.is_accepted', 0)
            ->get();

        // Muat data dalam datatables
        return datatables()
            ->of($item)
            ->addIndexColumn()
            ->addColumn('jadwal', function ($item) {
                return $item->jadwal->isoFormat('dddd, D MMM Y');
            })
            ->addColumn('aksi', function ($item) {
                if ($item->is_accepted) {
                    return '';
                }
                return '
                    <div class="btn-groub">
                    <a href="#" type="button" class="btn btn-primary shadow btn-xs sharp me-1 acceptIcon" id="' . $item->id . '">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                        <path stroke-linecap="round" stroke-linejoin="round" d="m4.5 12.75 6 6 9-13.5" />
                        </svg>
                    </i></a>
                    <a href="#" type="button" class="btn btn-warning shadow btn-xs sharp editIcon" id="' . $item->id . '">
                        <svg width="24" height="24" viewBox="0 0 24 24" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                        <path d="M5 19H6.4L15.025 10.375L13.625 8.975L5 17.6V19ZM19.3 8.925L15.05 4.725L16.45 3.325C16.8333 2.94167 17.3043 2.75 17.863 2.75C18.421 2.75 18.8917 2.94167 19.275 3.325L20.675 4.725C21.0583 5.10833 21.2583 5.571 21.275 6.113C21.2917 6.65433 21.1083 7.11667 20.725 7.5L19.3 8.925ZM4 21C3.71667 21 3.47933 20.904 3.288 20.712C3.096 20.5207 3 20.2833 3 20V17.175C3 17.0417 3.025 16.9127 3.075 16.788C3.125 16.6627 3.2 16.55 3.3 16.45L13.6 6.15L17.85 10.4L7.55 20.7C7.45 20.8 7.33767 20.875 7.213 20.925C7.08767 20.975 6.95833 21 6.825 21H4ZM14.325 9.675L13.625 8.975L15.025 10.375L14.325 9.675Z"/>
                        </svg>
                    </i></a>  
                    <a href="#" type="button" class="btn btn-danger shadow btn-xs sharp deleteIcon" id="' . $item->id . '">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                        <path stroke-linecap="round" stroke-linejoin="round" d="m14.74 9-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 0 1-2.244 2.077H8.084a2.25 2.25 0 0 1-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 0 0-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 0 1 3.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 0 0-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 0 0-7.5 0" />
                        </svg>
                    </i></a>
                    </div>
                ';
            })
            ->rawColumns(['aksi', 'jadwal'])
            ->make(true);
    }

    public function allData()
    {
        // Ambil seluruh data reservasi, diurutkan berdasarkan jadwal terbaru
        $data = Reservasi::orderBy("jadwal_tamu_reservasi", "desc")->get();

        // Kembalikan data dalam format json
        return response()->json($data);
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
        // Buat model baru, masukkan input ke dalam model
        $data = new Reservasi();
        $data->nama = $request->nama;
        $data->alamat = $request->alamat;
        $data->keperluan = $request->keperluan;
        $data->tujuan = $request->tujuan;
        $data->instansi = $request->instansi;
        $data->whatsapp = $request->whatsapp;
        $data->jenis = $request->jenis;
        $data->jadwal = $request->jadwal;

        // Simpan Model
        $data->save();

        // Tampilkan alert berhasil dan return view
        Alert::success('Data Reservasi Berhasil Disimpan', 'Success Message');
        return redirect()->back();
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
