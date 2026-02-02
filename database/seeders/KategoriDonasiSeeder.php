<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class KategoriDonasiSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('kategori_donasi')->insert([
            [
                'nama_kategori' => 'Pendidikan',
                'deskripsi' => 'Donasi untuk mendukung pendidikan anak-anak kurang mampu',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nama_kategori' => 'Kesehatan',
                'deskripsi' => 'Donasi untuk pengobatan dan kesehatan masyarakat',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nama_kategori' => 'Bencana Alam',
                'deskripsi' => 'Donasi untuk korban bencana alam',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nama_kategori' => 'Yatim Piatu',
                'deskripsi' => 'Donasi untuk anak yatim piatu',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nama_kategori' => 'Infrastruktur',
                'deskripsi' => 'Donasi untuk pembangunan fasilitas umum',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}