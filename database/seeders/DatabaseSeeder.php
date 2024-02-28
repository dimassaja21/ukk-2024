<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

        DB::table('users')->insert([
            'name' => 'Admin',
            'email' => 'admin@gmail.com',
            'role' => 'Admin',
            'password' => bcrypt('1234567890'),
        ]);

        DB::table('users')->insert([
            'name' => 'Petugas',
            'email' => 'petugas@gmail.com',
            'role' => 'Petugas',
            'password' => bcrypt('1234567890'),
        ]);

        DB::table('users')->insert([
            'name' => 'Peminjam',
            'email' => 'peminjam@gmail.com',
            'role' => 'Peminjam',
            'password' => bcrypt('1234567890'),
        ]);

        // DB::table('bukus')->insert([
        //     'judul' => 'One Piece',
        //     'penulis' => 'Slamet',
        //     'penerbit' => 'Supri',
        //     'tahun_terbit' => '1999',
        // ]);

        // DB::table('bukus')->insert([
        //     'judul' => 'Bulan',
        //     'penulis' => 'Pidi Baiq',
        //     'penerbit' => 'Dimas',
        //     'tahun_terbit' => '2006',
        // ]);

        DB::table('kategoris')->insert([
            'name' => 'Fantasy',
        ]);

        DB::table('kategoris')->insert([
            'name' => 'Action',
        ]);
    }
}
