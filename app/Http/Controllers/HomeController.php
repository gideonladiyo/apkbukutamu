<?php

namespace App\Http\Controllers;

use App\Models\Tamu;
use App\Models\Reservasi;
use App\Models\Pegawai;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        // Check role user
        if (Auth::user()->role == "PETUGAS") {
            return redirect("/");
        }

        // Hitung jumlah user, pegawai, tamu
        $user = User::count();
        $pegawai = Pegawai::count();
        $tamu = Tamu::count();
        $reservasi = Reservasi::count();
        $tamu += $reservasi;

        // Hitung total tamu hari ini
        $tamuHariIniBerikut = Tamu::whereDate('created_at', Carbon::today())->count();
        $tamuHariIniReservasi = Reservasi::whereDate('jadwal_tamu_reservasi', Carbon::today())->count();
        $tamuHariIni = $tamuHariIniBerikut + $tamuHariIniReservasi;

        // // Hitung total tamu tahun ini
        $currentYear = Carbon::now()->year;
        $tamuTahunIni = Tamu::whereYear('created_at', $currentYear)->count();
        $tamuTahunIniReservasi = Reservasi::whereYear('jadwal_tamu_reservasi', $currentYear)->count();
        $tamuTahunIni = $tamuTahunIni + $tamuTahunIniReservasi;
        
        // Ambil data bulan pada tahun ini
        $currentYear = Carbon::now()->year;
        $filledMonths = collect(range(1, 12))->mapWithKeys(function ($month) {
            return [$month => 0];
        });

        // Ambil data jumlah reservasi pada tahun ini
        $reservasiMonthlyCount = Reservasi::selectRaw('YEAR(jadwal_tamu_reservasi) as year, MONTH(jadwal_tamu_reservasi) as month, COUNT(*) as count')
            ->whereYear('jadwal_tamu_reservasi', $currentYear)
            ->groupBy(DB::raw('YEAR(jadwal_tamu_reservasi), MONTH(jadwal_tamu_reservasi)'))
            ->orderBy('year')
            ->orderBy('month')
            ->get()
            ->keyBy('month');

        // Ambil data jumlah reservasi pada tiap bulan
        $reservasiMonthlyCount = $filledMonths->map(function ($count, $month) use ($reservasiMonthlyCount) {
            return $reservasiMonthlyCount->has($month) ? $reservasiMonthlyCount->get($month)->count : $count;
        });

        // Ambil jumlah tamu pada tahun ini
        $tamuMonthlyCount = Tamu::selectRaw('YEAR(created_at) as year, MONTH(created_at) as month, COUNT(*) as count')
            ->whereYear('created_at', $currentYear)
            ->groupBy(DB::raw('YEAR(created_at), MONTH(created_at)'))
            ->orderBy('year')
            ->orderBy('month')
            ->get()
            ->keyBy('month');

        // Ambil data jumlah tamu pada tiap bulan
        $tamuMonthlyCount = $filledMonths->map(function ($count, $month) use ($tamuMonthlyCount) {
            return $tamuMonthlyCount->has($month) ? $tamuMonthlyCount->get($month)->count : $count;
        });

        return view('home', compact('tamu', 'pegawai', 'user', 'reservasiMonthlyCount', 'tamuMonthlyCount', 'tamuHariIni', 'tamuTahunIni'));
    }
}