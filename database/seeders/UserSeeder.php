<?php

namespace Database\Seeders;

use App\Models\Admin;
use App\Models\Dosen;
use App\Models\Mahasiswa;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Foundation\Auth\User;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $new = User::create([
            'nama' => 'Test Mahasiswa',
            'email' => 'testmahasiswa@gmail.com',
            'nim' => '111111111',
            'password' => Hash::make('111111'),
            'role' => 'Mahasiswa',
        ]);
        Mahasiswa::create([
            'id' => $new->id,
            'nama' => $new->nama,
            'nim' => $new->nim,
            'email' => $new->email,
        ]);

        $new = User::create([
            'nama' => 'Test Dosen',
            'email' => 'testdosen@gmail.com',
            'nip' => '222222222',
            'password' => Hash::make('222222'),
            'role' => 'Dosen',
        ]);
        Dosen::create([
            'id' => $new->id,
            'nama' => $new->nama,
            'nip' => $new->nip,
            'email' => $new->email,
        ]);

        $new = User::create([
            'nama' => 'Test Administrator',
            'email' => 'testadministrator@gmail.com',
            'nip' => '333333333',
            'password' => Hash::make('333333'),
            'role' => 'Administrator',
        ]);
        Admin::create([
            'id' => $new->id,
            'nama' => $new->nama,
            'nip' => $new->nip,
            'email' => $new->email,
        ]);
    }
}
