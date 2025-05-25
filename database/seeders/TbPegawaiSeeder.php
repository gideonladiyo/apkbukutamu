<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TbPegawaiSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('tb_pegawai')->insert([
            [
                'id_pegawai' => 1,
                'nama_pegawai' => 'Anwar',
                'devisi_pegawai' => 'Kepala Bps Kab. Pamekasan',
                'jobdesk_pegawai' => 'Menyelenggarakan Statistik Dasar Di Kabupaten/Kota',
                'created_at' => '2024-11-21 16:45:16',
                'updated_at' => '2024-11-21 16:45:16'
            ],
            [
                'id_pegawai' => 2,
                'nama_pegawai' => 'Erfan Iswantoro',
                'devisi_pegawai' => 'Kasubbag Umum',
                'jobdesk_pegawai' => 'Melaksanakan Urusan Administrasi Keuangan Dan Perlengkapan',
                'created_at' => '2024-11-21 16:45:41',
                'updated_at' => '2024-11-21 16:45:41'
            ],
            [
                'id_pegawai' => 3,
                'nama_pegawai' => 'Moh. Ataul Harsani',
                'devisi_pegawai' => 'Analis Pengelolaan Keuangan Apbn Ahli Pertama',
                'jobdesk_pegawai' => 'Melaksanakan Kegiatan Analisis Pengelolaan Keuangan APBN',
                'created_at' => '2024-11-21 16:46:05',
                'updated_at' => '2024-11-21 16:46:05'
            ],
            [
                'id_pegawai' => 4,
                'nama_pegawai' => 'Ilham Mauluddin',
                'devisi_pegawai' => 'Pranata Komputer Ahli Muda',
                'jobdesk_pegawai' => 'Melaksanakan Kegiatan Teknologi Informasi Berbasis Komputer',
                'created_at' => '2024-11-21 16:46:30',
                'updated_at' => '2024-11-21 16:46:30'
            ],
            [
                'id_pegawai' => 5,
                'nama_pegawai' => 'Marselinus Wahyu Pamungkas',
                'devisi_pegawai' => 'Pranata Komputer Ahli Pertama',
                'jobdesk_pegawai' => 'Melaksanakan Kegiatan Teknologi Informasi Berbasis Komputer',
                'created_at' => '2024-11-21 16:46:53',
                'updated_at' => '2024-11-21 16:46:53'
            ],
            [
                'id_pegawai' => 6,
                'nama_pegawai' => 'Kunto Hartoyo',
                'devisi_pegawai' => 'Statistisi Penyelia',
                'jobdesk_pegawai' => 'Melaksanakan Pengelolaan Penyelenggaraan Kegiatan Statistik',
                'created_at' => '2024-11-21 16:47:22',
                'updated_at' => '2024-11-21 16:47:22'
            ],
            [
                'id_pegawai' => 7,
                'nama_pegawai' => 'Raden Abdul Muiz',
                'devisi_pegawai' => 'Statistisi Ahli Muda',
                'jobdesk_pegawai' => 'Melaksanakan Pengelolaan Penyelenggaraan Kegiatan Statistik',
                'created_at' => '2024-11-21 16:47:44',
                'updated_at' => '2024-11-21 16:47:44'
            ],
            [
                'id_pegawai' => 8,
                'nama_pegawai' => 'Raden Mohammad Karimoellah',
                'devisi_pegawai' => 'Statistisi Ahli Muda',
                'jobdesk_pegawai' => 'Melaksanakan Pengelolaan Penyelenggaraan Kegiatan Statistik',
                'created_at' => '2024-11-21 16:48:04',
                'updated_at' => '2024-11-21 16:48:04'
            ],
            [
                'id_pegawai' => 9,
                'nama_pegawai' => 'Handoyo Wijoyo',
                'devisi_pegawai' => 'Statistisi Ahli Muda',
                'jobdesk_pegawai' => 'Melaksanakan Pengelolaan Penyelenggaraan Kegiatan Statistik',
                'created_at' => '2024-11-21 16:48:23',
                'updated_at' => '2024-11-21 16:48:23'
            ],
            [
                'id_pegawai' => 10,
                'nama_pegawai' => 'Ida Wahyuni',
                'devisi_pegawai' => 'Statistisi Ahli Muda',
                'jobdesk_pegawai' => 'Melaksanakan Pengelolaan Penyelenggaraan Kegiatan Statistik',
                'created_at' => '2024-11-21 16:48:48',
                'updated_at' => '2024-11-21 16:48:48'
            ],
            [
                'id_pegawai' => 11,
                'nama_pegawai' => 'Iis Nurudin Ja\'is',
                'devisi_pegawai' => 'Statistisi Ahli Muda',
                'jobdesk_pegawai' => 'Melaksanakan Pengelolaan Penyelenggaraan Kegiatan Statistik',
                'created_at' => '2024-11-21 16:48:58',
                'updated_at' => '2024-11-21 16:48:58'
            ],
            [
                'id_pegawai' => 12,
                'nama_pegawai' => 'Yongky Bambang Sulistyo',
                'devisi_pegawai' => 'Statistisi Ahli Muda',
                'jobdesk_pegawai' => 'Melaksanakan Pengelolaan Penyelenggaraan Kegiatan Statistik',
                'created_at' => '2024-11-21 16:49:10',
                'updated_at' => '2024-11-21 16:49:10'
            ],
            [
                'id_pegawai' => 13,
                'nama_pegawai' => 'Buyung Candra Pamungkas',
                'devisi_pegawai' => 'Statistisi Ahli Pertama',
                'jobdesk_pegawai' => 'Melaksanakan Pengelolaan Penyelenggaraan Kegiatan Statistik',
                'created_at' => '2024-11-21 16:49:34',
                'updated_at' => '2024-11-21 16:49:34'
            ],
            [
                'id_pegawai' => 14,
                'nama_pegawai' => 'Hari Supriono',
                'devisi_pegawai' => 'Statistisi Ahli Pertama',
                'jobdesk_pegawai' => 'Melaksanakan Pengelolaan Penyelenggaraan Kegiatan Statistik',
                'created_at' => '2024-11-21 16:49:46',
                'updated_at' => '2024-11-21 16:49:46'
            ],
            [
                'id_pegawai' => 15,
                'nama_pegawai' => 'Ahmad Muhaimin',
                'devisi_pegawai' => 'Statistisi Ahli Pertama',
                'jobdesk_pegawai' => 'Melaksanakan Pengelolaan Penyelenggaraan Kegiatan Statistik',
                'created_at' => '2024-11-21 16:49:56',
                'updated_at' => '2024-11-21 16:49:56'
            ],
            [
                'id_pegawai' => 16,
                'nama_pegawai' => 'Moh Syaiful Hidayatur Rakhman',
                'devisi_pegawai' => 'Statistisi Ahli Pertama',
                'jobdesk_pegawai' => 'Melaksanakan Pengelolaan Penyelenggaraan Kegiatan Statistik',
                'created_at' => '2024-11-21 16:50:30',
                'updated_at' => '2024-11-21 16:50:30'
            ],
            [
                'id_pegawai' => 17,
                'nama_pegawai' => 'Mega Anisa Rhapha',
                'devisi_pegawai' => 'Statistisi Ahli Pertama',
                'jobdesk_pegawai' => 'Melaksanakan Pengelolaan Penyelenggaraan Kegiatan Statistik',
                'created_at' => '2024-11-21 16:50:47',
                'updated_at' => '2024-11-21 16:50:47'
            ],
            [
                'id_pegawai' => 18,
                'nama_pegawai' => 'Andri Setyono',
                'devisi_pegawai' => 'Statistisi Ahli Pertama',
                'jobdesk_pegawai' => 'Melaksanakan Pengelolaan Penyelenggaraan Kegiatan Statistik',
                'created_at' => '2024-11-21 16:50:55',
                'updated_at' => '2024-11-21 16:50:55'
            ],
            [
                'id_pegawai' => 19,
                'nama_pegawai' => 'Puji Nisrokhah',
                'devisi_pegawai' => 'Statistisi Ahli Pertama',
                'jobdesk_pegawai' => 'Melaksanakan Pengelolaan Penyelenggaraan Kegiatan Statistik',
                'created_at' => '2024-11-21 16:51:09',
                'updated_at' => '2024-11-21 16:51:09'
            ],
            [
                'id_pegawai' => 20,
                'nama_pegawai' => 'Dewi Rizky Rosafiana Putri',
                'devisi_pegawai' => 'Statistisi Ahli Pertama',
                'jobdesk_pegawai' => 'Melaksanakan Pengelolaan Penyelenggaraan Kegiatan Statistik',
                'created_at' => '2024-11-21 16:51:26',
                'updated_at' => '2024-11-21 16:51:26'
            ],
            [
                'id_pegawai' => 21,
                'nama_pegawai' => 'Budiyanto',
                'devisi_pegawai' => 'Statistisi Mahir',
                'jobdesk_pegawai' => 'Melaksanakan Pengelolaan Penyelenggaraan Kegiatan Statistik',
                'created_at' => '2024-11-21 16:51:56',
                'updated_at' => '2024-11-21 16:51:56'
            ],
            [
                'id_pegawai' => 22,
                'nama_pegawai' => 'Sukip Setiawan',
                'devisi_pegawai' => 'Statistisi Terampil',
                'jobdesk_pegawai' => 'Melaksanakan Pengelolaan Penyelenggaraan Kegiatan Statistik',
                'created_at' => '2024-11-21 16:52:13',
                'updated_at' => '2024-11-21 16:52:13'
            ],
            [
                'id_pegawai' => 23,
                'nama_pegawai' => 'Bella Yunita Sandy',
                'devisi_pegawai' => 'Statistisi Terampil',
                'jobdesk_pegawai' => 'Melaksanakan Pengelolaan Penyelenggaraan Kegiatan Statistik',
                'created_at' => '2024-11-21 16:52:27',
                'updated_at' => '2024-11-21 16:52:27'
            ],
            [
                'id_pegawai' => 24,
                'nama_pegawai' => 'Silvia Anggraeni',
                'devisi_pegawai' => 'Statistisi Terampil',
                'jobdesk_pegawai' => 'Melaksanakan Pengelolaan Penyelenggaraan Kegiatan Statistik',
                'created_at' => '2024-11-21 16:52:39',
                'updated_at' => '2024-11-21 16:52:39'
            ],
            [
                'id_pegawai' => 25,
                'nama_pegawai' => 'Anton Mustafa',
                'devisi_pegawai' => 'Pengadministrasi Umum',
                'jobdesk_pegawai' => 'Menyelenggarakan Administrasi Kepegawaian Sesuai Prosedur Dan Ketentuan',
                'created_at' => '2024-11-21 16:53:02',
                'updated_at' => '2024-11-21 16:53:02'
            ],
            [
                'id_pegawai' => 26,
                'nama_pegawai' => 'Catur Setiya Prananta',
                'devisi_pegawai' => 'Pelaksana',
                'jobdesk_pegawai' => 'Melaksanakan Kegiatan Pelayanan Publik Serta Administrasi',
                'created_at' => '2024-11-21 16:53:20',
                'updated_at' => '2024-11-21 16:53:20'
            ]
        ]);
    }
}