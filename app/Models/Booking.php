<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Booking extends Model
{
  use HasFactory;
  protected $with = ['ruangan'];
  protected $guarded = ['id'];
  protected $fillable = [
    'tanggal',
    'nama',
    'ruangan_id',
    'jam_mulai',
    'jam_selesai',
    'jumlah',
    'agenda',
    'status',
    'kategori',
    'id_makanan',
    'id_minuman',
];
  public function ruangan()
  {
    return $this->belongsTo(Ruangan::class);
  }
  public function makanan()
  {
      return $this->belongsTo(Makanan::class, 'id_makanan');
  }

  public function minuman()
  {
      return $this->belongsTo(Makanan::class, 'id_minuman');
  }
}
