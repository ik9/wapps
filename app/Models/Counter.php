<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Counter extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'adapter_id',
        'feeder_id',
        'counter_number',
        'subscribe_number',
        'cutter_size',
        'current_meter_reading',
        'counter_coordinates',
        'counter_picture',
        'counter_class',
        'counter_status',
        'property_condition',
        'property_picture',
        'danger_q',
        'danger_type',
        'danger',
    ];

}
