<?php

namespace App\Exports;

use App\Models\Tamu;
use Maatwebsite\Excel\Concerns\FromCollection;

class TamuExport implements FromCollection
{
    /**
     * @return \Illuminate\Support\Collection
     */
    public function collection()
    {
        return Tamu::leftJoin('tb_pegawai', 'tb_pegawai.id_pegawai', 'tb_tamu.tujuan_tamu_berkunjung')
            ->select('tb_tamu.id_berkunjung AS id_berkunjung', 'tb_tamu.nama_tamu_berkunjung AS nama_tamu_berkunjung', 'tb_tamu.alamat_tamu_berkunjung AS alamat_tamu_berkunjung', 'tb_tamu.instansi_tamu_berkunjung AS instansi_tamu_berkunjung', 'tb_tamu.keperluan_tamu_berkunjung AS keperluan_tamu_berkunjung', 'tb_pegawai.devisi_pegawai AS nama_pegawai', 'tb_tamu.kontak_tamu_berkunjung AS kontak_tamu_berkunjung', 'tb_tamu.created_at AS created_at')->get();
    }
}
