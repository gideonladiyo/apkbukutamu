<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call([
            TbPegawaiSeeder::class,
            TbReservasiSeeder::class,
            TbTamuSeeder::class,
            TbUserSeeder::class,
        ]);
    }
}