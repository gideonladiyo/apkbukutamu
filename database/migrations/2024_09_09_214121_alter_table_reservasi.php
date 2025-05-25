<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AlterTableReservasi extends Migration
{
    public function up()
    {
        Schema::rename('reservasi', 'tb_reservasi');

        // Modify the existing 'reservasi' table
        Schema::table('tb_reservasi', function (Blueprint $table) {
            // Rename 'id' to 'id_reservasi' and change its type to int(20)
            $table->renameColumn('id', 'id_reservasi');

            // Rename and modify the existing columns
            $table->renameColumn('nama', 'nama_tamu_reservasi');

            $table->renameColumn('alamat', 'alamat_tamu_reservasi');

            $table->renameColumn('instansi', 'instansi_tamu_reservasi');

            // Change 'keperluan' to enum with specified values
            $table->renameColumn('keperluan', 'keperluan_tamu_reservasi');

            // Change 'tujuan' to enum with specified values
            $table->renameColumn('tujuan', 'tujuan_tamu_reservasi');

            // Change 'jenis' to 'jenis_konsultasi_tamu_reservasi' and make it enum
            $table->renameColumn('jenis', 'jenis_konsultasi_tamu_reservasi');

            // Rename 'jadwal' to 'jadwal_tamu_reservasi'
            $table->renameColumn('jadwal', 'jadwal_tamu_reservasi');

            // Rename 'whatsapp' to 'whatsapp_tamu_reservasi' and change to int(15)
            $table->renameColumn('whatsapp', 'whatsapp_tamu_reservasi');
        });
    }

    public function down()
    {
        Schema::rename('tb_reservasi', 'reservasi');
        // Reverse the changes in case of rollback
        Schema::table('reservasi', function (Blueprint $table) {
            $table->renameColumn('id_reservasi', 'id');

            $table->renameColumn('nama_tamu_reservasi', 'nama');
            $table->renameColumn('alamat_tamu_reservasi', 'alamat');
            $table->renameColumn('instansi_tamu_reservasi', 'instansi');
            $table->renameColumn('keperluan_tamu_reservasi', 'keperluan');

            $table->renameColumn('tujuan_tamu_reservasi', 'tujuan');

            $table->renameColumn('jenis_konsultasi_tamu_reservasi', 'jenis');

            $table->renameColumn('jadwal_tamu_reservasi', 'jadwal');
            $table->renameColumn('whatsapp_tamu_reservasi', 'whatsapp');
        });
    }
}
