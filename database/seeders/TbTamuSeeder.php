<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TbTamuSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('tb_tamu')->insert([
            [
                'id_berkunjung' => 1,
                'nama_tamu_berkunjung' => 'Hablul Warid',
                'instansi_tamu_berkunjung' => 'Institut Sains dan Teknologi Annuqayah',
                'alamat_tamu_berkunjung' => 'Nangger',
                'keperluan_tamu_berkunjung' => 'Konsultasi Lainnya',
                'tujuan_tamu_berkunjung' => '4', // Asumsi ini merujuk ke id_pegawai
                'kontak_tamu_berkunjung' => '0987654876132',
                'created_at' => '2024-12-02 09:06:09',
                'updated_at' => '2024-12-02 09:06:09'
            ]
        ]);
    }
}