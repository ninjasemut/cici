<?php

namespace Database\Seeders;

use App\Models\Ruangan;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class RuanganSeeder extends Seeder
{
  /**
   * Run the database seeds.
   *
   * @return void
   */
  public function run()
  {
    Ruangan::create([
      'nama_ruangan' => 'Aula',
      'kapasitas' => 100,
      'status' => 'Baik',
    ]);
  }
}
