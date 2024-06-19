<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\KategoriDownload;

class KategoriDownloadSeeder extends Seeder
{
    public function run()
    {
        $kategoriDownloads = [
            ['nama_kategori' => 'UNDANG-UNDANG'],
            ['nama_kategori' => 'PERATURAN PEMERINTAH'],
            ['nama_kategori' => 'PERATURAN PRESIDEN'],
            ['nama_kategori' => 'PERATURAN MENDAGRI'],
            ['nama_kategori' => 'FORMULIR'],
        ];

        foreach ($kategoriDownloads as $kategori) {
            KategoriDownload::create($kategori);
        }
    }
}

