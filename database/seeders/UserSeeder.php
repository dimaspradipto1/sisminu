<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('users')->insert([
            [
                'name' => 'admin',
                'jabatan' => 'admin',
                'role'=> 'admin',
                'email' => 'admin@gmail.com',
                'password' => bcrypt('admin'),
                'created_at' => now(),
                'updated_at' =>now()
            ],
            [
                'name' =>'pengguna',
                'jabatan' => 'petugas',
                'role' => 'user',
                'email' => 'pengguna@gmail.com',
                'password' => bcrypt('pengguna'),
                'created_at' => now(),
                'updated_at' =>now()
            ],
            [
                'name' =>'rusdiyanto',
                'jabatan' => 'KAURDAL',
                'role' => 'user',
                'email' => 'rusdiyanto@gmail.com',
                'password' => bcrypt('rusdiyanto'),
                'created_at' => now(),
                'updated_at' =>now()
            ],
            [
                'name' =>'azis',
                'jabatan' => 'BAGTU',
                'role' => 'user',
                'email' => 'azis@gmail.com',
                'password' => bcrypt('azis'),
                'created_at' => now(),
                'updated_at' =>now()
            ],
        ]);
    }
}
