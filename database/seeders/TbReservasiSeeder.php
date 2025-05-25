<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TbReservasiSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('tb_reservasi')->insert([
            [
                'id_reservasi' => 1,
                'nama_tamu_reservasi' => 'Ahmad Fawaid',
                'alamat_tamu_reservasi' => 'Guluk-Guluk',
                'instansi_tamu_reservasi' => 'Universitas Annuqayah',
                'keperluan_tamu_reservasi' => 'Konsultasi Data Statistik',
                'tujuan_tamu_reservasi' => '1', // Asumsi ini merujuk ke id_pegawai
                'jenis_konsultasi_tamu_reservasi' => 'Berkunjung',
                'whatsapp_tamu_reservasi' => '087869345265',
                'jadwal_tamu_reservasi' => '2024-12-03',
                'is_accepted' => 1, // 1 berarti true/accepted
                'created_at' => '2024-12-02 08:32:20',
                'updated_at' => '2024-12-02 08:33:01'
            ]
        ]);
    }
}