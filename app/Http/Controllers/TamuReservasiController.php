<?php

namespace App\Http\Controllers;

use App\Events\ReservasiUpdated;
use App\Models\Pegawai;
use App\Models\Reservasi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;
use App\Exports\ReservasiExport;
use Barryvdh\DomPDF\Facade\PDF;
use Maatwebsite\Excel\Facades\Excel;

class TamuReservasiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // Check user role
        if (Auth::user()->role == "PETUGAS") {
            return redirect("/");
        }
        // Ambil data semua pegawai
        $pegawai = Pegawai::all();
        // Kembalikan view admin
        return view('admin.reservasi.index', compact('pegawai'));
    }

    public function data(Request $request)
    {
        // Ambil data reservasi sesuai rentang tanggal yang diberikan
        $date1 = $request->query('date1');
        $date2 = $request->query('date2');
        $query = Reservasi::leftJoin('tb_pegawai', 'tb_pegawai.id_pegawai', 'tb_reservasi.tujuan_tamu_reservasi')
            ->select('tb_reservasi.*', 'tb_pegawai.devisi_pegawai AS nama_pegawai');

        // Beri query tambahkan jika diberikan rentang tanggal
        if ($date1 && $date2) {
            $query->whereBetween('jadwal_tamu_reservasi', [Carbon::parse($date1)->startOfDay(), Carbon::parse($date2)->endOfDay()]);
        }

        $item = $query->get();

        // Muat data ke dalam datatable
        return datatables()
            ->of($item)
            ->addIndexColumn()
            ->addColumn('jadwal', function ($item) {
                // return Carbon::now()->isoFormat('dddd, D MMMM Y');
                return $item->jadwal->isoFormat('dddd, D MMM Y');
            })
            ->addColumn('aksi', function ($item) {
                return '
            <div class="btn-groub">
            <a href="#" class="btn btn-warning shadow btn-xs sharp me-1 editIcon" id="' . $item->id . '" data-toggle="modal" data-target=".editRowModal"><i class="fa fa-pencil"></i></a>
            <a href="#" type="button" class="btn btn-danger shadow btn-xs sharp deleteIcon" id="' . $item->id . '"><i class="fa fa-trash"></i></a>
            </div>
            ';
            })
            ->rawColumns(['aksi', 'jadwal'])
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
        // Validasi Input user
        $validator = Validator::make($request->all(), [
            'nama' => 'required',
            'alamat' => 'required',
            'keperluan' => 'required',
            'tujuan' => 'required',
            'instansi' => 'required',
            'whatsapp' => 'required',
            'jenis' => 'required',
            'jadwal' => 'required',
        ]);

        // Kembalikan jika ada error
        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()->all()]);
        }

        // Buat model reservasi dan masukkan semua data input user
        $data = new Reservasi();
        $data->nama = $request->nama;
        $data->alamat = $request->alamat;
        $data->keperluan = $request->keperluan;
        $data->instansi = $request->instansi;
        $data->tujuan = $request->tujuan;
        $data->whatsapp = $request->whatsapp;
        $data->jenis = $request->jenis;
        $data->jadwal = $request->jadwal;

        // Simpan Data
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
        // Ambil data reservasi sesuai id yang diberikan 
        $id = $request->id;
        $emp = Reservasi::find($id);

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
        try {

            // validasi input pengguna
            $validator = Validator::make($request->all(), [
                'nama' => 'required',
                'alamat' => 'required',
                'instansi' => 'required',
                'keperluan' => 'required',
                'tujuan' => 'required',
                'whatsapp' => 'required',
                'jenis' => 'required',
                'jadwal' => 'required',

            ]);
            // Kembalikan jika ada error
            if ($validator->fails()) {
                return response()->json(['errors' => $validator->errors()->all()]);
            }

            // Cari data reservasi berdasarkan id
            $emp = Reservasi::find($request->emp_id);

            // Muat data yang telah diubah
            $empData = [
                'nama' => $request->nama,
                'alamat' => $request->alamat,
                'instansi' => $request->instansi,
                'keperluan' => $request->keperluan,
                'tujuan' => $request->tujuan,
                'whatsapp' => $request->whatsapp,
                'jenis' => $request->jenis,
                'jadwal' => $request->jadwal,
            ];

            // Update data dari database
            $emp->update($empData);
            return response()->json([
                'status' => 200,
                'emp' => $emp,
                'empData' => $empData,

            ]);
        } catch (\Throwable $th) {
            return response()->json([
                'status' => 400,
                'emp' => $emp,
                'empData' => $th,

            ]);
        }
    }

    public function updateJadwal(Request $request)
    {
        // Validasi input
        $validated = $request->validate([
            'id' => 'required',
            'jadwal' => 'required|date',
        ]);
        // Cari Reservasi model by ID
        $id = $validated['id'];
        $reservasi = Reservasi::findOrFail($id);

        // Update field jadwal
        $reservasi->jadwal = $validated['jadwal'];
        $reservasi->save();


        // Kembalikan respons ke view dengan data jadwal yang baru
        $jadwal = $reservasi->jadwal->isoFormat('dddd, D MMM Y');
        return response()->json([
            'title' => 'Jadwal berhasil diubah!',
            'message' => 'Jadwal diubah untuk tanggal: ' . $jadwal,
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
        // Ambil seluruh data tamu
        $datatamu = Reservasi::leftJoin('tb_pegawai', 'tb_pegawai.id_pegawai', 'tb_reservasi.tujuan_tamu_reservasi')
            ->select('tb_reservasi.*', 'tb_pegawai.devisi_pegawai AS nama_pegawai')
            ->get();
        $no = 1;

        // Muat data dalam file pdf 
        $pdf = Pdf::loadview('admin.reservasi.cetak', ['datatamu' => $datatamu], ['no' => $no]);
        return $pdf->download('laporan-tamu.pdf');
    }


    public function destroy(Request $request)
    {
        // Cari data reservasi sesuai id 
        $id = $request->id;
        $temp = Reservasi::find($id);

        // Hapus data dari database jika belum di accept
        Reservasi::destroy($id);
    }

    public function accept(Request $request)
    {
        // Cari data reservasi sesuai id yang diberikan
        $id = $request->id;
        $temp = Reservasi::find($id);
        // Ubah status is_accepted menjadi true
        $temp->is_accepted = true;
        // Simpan data
        $temp->save();
    }

    public function export_excell()
    {
        // $datatamu = Reservasi::leftJoin('devisi', 'devisi.id', 'tamu.tujuan')
        // ->select('tamu.*','nama_devisi')->get();

        // //  $datatamu = Reservasi::all();
        //  $no = 1;

        return Excel::download(new ReservasiExport, 'Reservasi.xlsx');
    }
}
