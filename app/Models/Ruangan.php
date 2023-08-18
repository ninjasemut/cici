<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ruangan extends Model
{
  use HasFactory;
  protected $table = 'ruangan';
  protected $fillable = [
    'nama_ruangan',
    'kapasitas',
    'status',
  ];

  public function facilities()
  {
    return $this->belongsToMany(Facility::class, 'facilities_room', 'room_id', 'facility_id');
  }

  public function booking()
  {
    return $this->hasMany(Booking::class);
  }
}
