<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Equipment extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'feeder_id',
        'equipment_type',
        'number',
        'serial_number',
        'manufacture_company',
        'location',
        'photos'
    ];

}
