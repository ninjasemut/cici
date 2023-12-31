<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FacilityRoom extends Model
{
    use HasFactory;

    protected $table = 'facilities_room';

    protected $fillable = [
        'room_id',
        'facility_id',
    ];
}
