<?php

namespace Database\Seeders;

use App\Models\Matkul;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class MatkulSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $matkuls = [
            ['nama' => 'Pemrograman Dasar', 'kode' => 'CIF2000', 'kelas' => 'A', 'ruang' => 'F2.1'],
            ['nama' => 'Jaringan Komputer', 'kode' => 'CIF2001', 'kelas' => 'B', 'ruang' => 'G1.2'],
            ['nama' => 'Basis Data', 'kode' => 'CIF2020', 'kelas' => 'C', 'ruang' => 'F3.2'],
            ['nama' => 'Metode Numerik', 'kode' => 'CIF2030', 'kelas' => 'D', 'ruang' => 'F4.4'],
            ['nama' => 'Pemrograman Web', 'kode' => 'CIF2032', 'kelas' => 'C', 'ruang' => 'F3.6'],
            ['nama' => 'Aljabar Linear', 'kode' => 'CIF2040', 'kelas' => 'B', 'ruang' => 'F3.7'],
            ['nama' => 'Analisis dan Pernacangan Sistem', 'kode' => 'CIF2060', 'kelas' => 'F', 'ruang' => 'F4.1'],
            ['nama' => 'Algoritma dan Struktur Data', 'kode' => 'CIF2023', 'kelas' => 'A', 'ruang' => 'F2.2'],
            ['nama' => 'Bahasa Indonesia', 'kode' => 'CIF2200', 'kelas' => 'N7M', 'ruang' => 'F2.9'],
            
            // Tambahkan data mata kuliah lainnya sesuai kebutuhan
        ];

        // Masukkan data mata kuliah ke dalam tabel
        foreach ($matkuls as $matkul) {
            Matkul::create($matkul);
        }
    }
}
