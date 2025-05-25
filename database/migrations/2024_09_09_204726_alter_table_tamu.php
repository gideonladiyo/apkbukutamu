<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AlterTableTamu extends Migration
{
    public function up()
    {
        // Rename the table from 'tamu' to 'tb_tamu'
        Schema::rename('tamu', 'tb_tamu');

        // Modify the columns in the 'tb_tamu' table
        Schema::table('tb_tamu', function (Blueprint $table) {
            // Rename 'id' to 'id_berkunjung' with a type of int(20)
            $table->renameColumn('id', 'id_berkunjung');

            // Rename 'nama' to 'nama_tamu_berkunjung'
            $table->renameColumn('nama', 'nama_tamu_berkunjung');;

            // Rename 'alamat' to 'alamat_tamu_berkunjung'
            $table->renameColumn('alamat', 'alamat_tamu_berkunjung');

            // Rename 'instansi' to 'instansi_tamu_berkunjung'
            $table->renameColumn('instansi', 'instansi_tamu_berkunjung');

            // Rename 'keperluan' to 'keperluan_tamu_berkunjung' and change to enum
            $table->renameColumn('keperluan', 'keperluan_tamu_berkunjung');
            // $table->enum('keperluan_tamu_berkunjung', [
            //     'Permintaan Data',
            //     'Konsultasi Data Statistik',
            //     'Konsultasi Lainnya',
            // ])->change();

            // Rename 'tujuan' to 'tujuan_tamu_berkunjung' and change to enum
            $table->renameColumn('tujuan', 'tujuan_tamu_berkunjung');

            // Rename 'kontak' to 'kontak_tamu_berkunjung'
            $table->renameColumn('kontak', 'kontak_tamu_berkunjung');
        });
    }

    public function down()
    {
        // Reverse the table name change
        Schema::rename('tb_tamu', 'tamu');

        // Reverse the column name changes
        Schema::table('tamu', function (Blueprint $table) {
            $table->renameColumn('id_berkunjung', 'id');
            $table->renameColumn('nama_tamu_berkunjung', 'nama');
            $table->renameColumn('alamat_tamu_berkunjung', 'alamat');
            $table->renameColumn('instansi_tamu_berkunjung', 'instansi');
            $table->renameColumn('keperluan_tamu_berkunjung', 'keperluan');
            $table->renameColumn('tujuan_tamu_berkunjung', 'tujuan');
            $table->renameColumn('kontak_tamu_berkunjung', 'kontak');
        });
    }
}