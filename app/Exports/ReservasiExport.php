<?php

namespace App\Exports;

use App\Models\Reservasi;
use Maatwebsite\Excel\Concerns\FromCollection;

class ReservasiExport implements FromCollection
{
    /**
     * @return \Illuminate\Support\Collection
     */
    public function collection()
    {
        return Reservasi::leftJoin('tb_pegawai', 'tb_pegawai.id_pegawai', 'tb_reservasi.tujuan_tamu_reservasi')
            ->select('tb_reservasi.id_reservasi AS id_reservasi', 'tb_reservasi.nama_tamu_reservasi AS nama_tamu_reservasi', 'tb_reservasi.alamat_tamu_reservasi AS alamat_tamu_reservasi', 'tb_reservasi.instansi_tamu_reservasi AS instansi_tamu_reservasi', 'tb_reservasi.keperluan_tamu_reservasi AS keperluan_tamu_reservasi', 'tb_reservasi.jenis_konsultasi_tamu_reservasi AS jenis_konsultasi_tamu_reservasi', 'tb_pegawai.devisi_pegawai AS nama_pegawai', 'tb_reservasi.whatsapp_tamu_reservasi AS whatsapp_tamu_reservasi', 'tb_reservasi.jadwal_tamu_reservasi AS jadwal_tamu_reservasi')->get();
    }
}