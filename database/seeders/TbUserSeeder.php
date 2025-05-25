<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
// Jika Anda tidak menggunakan Hash::make di sini karena password sudah di-hash
// use Illuminate\Support\Facades\Hash;

class TbUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('tb_user')->insert([
            [
                'id' => 1,
                'name' => 'Fulan',
                'username' => 'Orang',
                'role' => '', // Role kosong sesuai dump
                'email' => 'ofulan123@gmail.com',
                'email_verified_at' => null,
                'password' => '$2y$10$Cqog6bGl6QrMI21R4q6FaeyddhRGGOZmU6TZnqxwhIjHDwD.8cM6u', // Password sudah di-hash
                'remember_token' => null,
                'created_at' => null, // Sesuai dump
                'updated_at' => null  // Sesuai dump
            ],
            [
                'id' => 2,
                'name' => 'Aan',
                'username' => 'Admin',
                'role' => 'ADMIN',
                'email' => 'admin123@gmail.com',
                'email_verified_at' => null,
                'password' => '$2y$10$hPmia3WCUkoGFfDs6d9iReM7w5xe3125hSISHPVvnWqEGcXu/3Ruq', // Password sudah di-hash
                'remember_token' => null,
                'created_at' => '2024-11-21 16:43:24',
                'updated_at' => '2024-11-21 16:43:24'
            ],
            [
                'id' => 3,
                'name' => 'Uun',
                'username' => 'Petugas',
                'role' => 'PETUGAS',
                'email' => 'petugas123@gmail.com',
                'email_verified_at' => null,
                'password' => '$2y$10$5aFL5/A6N2EXR7VDQJiViOzKBiGxd7rJ9ywnlxobmkXXALgnIJUOu', // Password sudah di-hash
                'remember_token' => null,
                'created_at' => '2024-11-21 16:43:48',
                'updated_at' => '2024-11-21 16:43:48'
            ]
        ]);
    }
}