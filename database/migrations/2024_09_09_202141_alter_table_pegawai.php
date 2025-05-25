<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AlterTablePegawai extends Migration
{
    public function up()
    {
        // Rename the table from 'pegawai' to 'tb_pegawai'
        Schema::rename('pegawai', 'tb_pegawai');

        // Rename columns in the 'tb_pegawai' table
        Schema::table('tb_pegawai', function (Blueprint $table) {
            // Rename 'id' to 'id_pegawai'
            $table->renameColumn('id', 'id_pegawai');

            // Rename 'nama' to 'nama_pegawai'
            $table->renameColumn('nama', 'nama_pegawai');

            // Rename 'jobdesc' to 'jobdesk_pegawai'
            $table->renameColumn('jobdesc', 'jobdesk_pegawai');

            // Rename 'jabatan' to 'devisi_pegawai'
            $table->renameColumn('jabatan', 'devisi_pegawai');
        });
    }

    public function down()
    {
        // Reverse the table name change
        Schema::rename('tb_pegawai', 'pegawai');

        // Reverse the column name changes
        Schema::table('pegawai', function (Blueprint $table) {
            $table->renameColumn('id_pegawai', 'id');
            $table->renameColumn('nama_pegawai', 'nama');
            $table->renameColumn('jobdesk_pegawai', 'jobdesc');
            $table->renameColumn('devisi_pegawai', 'jabatan');
        });
    }
}
