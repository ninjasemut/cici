<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Makanan;

class MakananSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Makanan::create([
            'nama' => 'Nasi Goreng',
            'kategori' => 'makanan',
        ]);

        Makanan::create([
            'nama' => 'Es Teh',
            'kategori' => 'minuman',
        ]);

        
    }
}
