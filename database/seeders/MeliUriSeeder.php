<?php
// database/seeders/MeliUriSeeder.php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\MeliUri;

class MeliUriSeeder extends Seeder
{
    public function run(): void
    {
        // Pastikan tabel dikosongkan terlebih dahulu (opsional, tapi disarankan jika tidak migrate:fresh)
        // MeliUri::truncate(); 
        
        // Data kategori Meli (Uri) berdasarkan Kelompok Mineral Utama
        $classificationGroups = [
            [
                'name' => 'Silikat', 
                'description' => 'Kelompok mineral terbesar dan terpenting, mengandung silikon dan oksigen (SiO4). Contoh: Kuarsa, Feldspar, Mika.'
            ],
            [
                'name' => 'Oksida', 
                'description' => 'Mineral yang mengandung oksigen berikatan dengan satu atau lebih logam. Contoh: Hematit, Magnetit, Korundum.'
            ],
            [
                'name' => 'Sulfida', 
                'description' => 'Mineral yang mengandung belerang (sulfur) berikatan dengan logam. Contoh: Pirit, Galena, Sfalerit.'
            ],
            [
                'name' => 'Karbonat', 
                'description' => 'Mineral yang mengandung ion karbonat (CO3). Contoh: Kalsit, Dolomit, Magnesit.'
            ],
            [
                'name' => 'Halida', 
                'description' => 'Mineral yang mengandung halogen (seperti klorin atau fluor) sebagai anion dominan. Contoh: Halit (Garam dapur), Fluorite.'
            ],
            [
                'name' => 'Elemen Murni', 
                'description' => 'Mineral yang terbentuk dari satu jenis unsur kimia saja. Contoh: Emas, Perak, Intan, Belerang.'
            ],
        ];

        foreach ($classificationGroups as $group) {
            MeliUri::create($group);
        }
    }
}