<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\KategoriPersyaratan;

class KategoriPersyaratanSeeder extends Seeder
{
    public function run()
    {
        // Buat data kategori
        $kategori1 = KategoriPersyaratan::create([
            'nama_kategori' => 'Layanan Pendaftaran Penduduk',
        ]);

        $kategori2 = KategoriPersyaratan::create([
            'nama_kategori' => 'Layanan Pendaftaran Sipil',
        ]);

        // Tambahkan pesan untuk menandakan seeder telah berjalan
        $this->command->info('Data kategori persyaratan berhasil ditambahkan!');
    }
}

