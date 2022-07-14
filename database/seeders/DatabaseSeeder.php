<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();

        \App\Models\kelas::create([
            'nama' => 'kelas bot 1',
            'deskripsi' => 'mari bergabung ke kelas ini yooo',
            'gambar' => '/img/kelas1.png'
        ]);

        \App\Models\kelas::create([
            'nama' => 'kelas bot 2',
            'deskripsi' => 'mari bergabung ke kelas ini yooo',
            'gambar' => '/img/kelas1.png'
        ]);

        \App\Models\kelas::create([
            'nama' => 'kelas bot 3',
            'deskripsi' => 'mari bergabung ke kelas ini yooo',
            'gambar' => '/img/kelas1.png'
        ]);

        \App\Models\kelas::create([
            'nama' => 'kelas bot 4',
            'deskripsi' => 'mari bergabung ke kelas ini yooo',
            'gambar' => '/img/kelas1.png'
        ]);

        \App\Models\User::create([
            'name' => 'Guru',
            'email' => 'siswa@gmail.com',
            'role' => 'guru',
            'kelas_id' => 1,
            'password' => bcrypt('12345678')
        ]);
    }
}
