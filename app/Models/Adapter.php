<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Adapter extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'feeder_id',
        'adapter_number',
        'adapter_size',
        'adapter_voltage',
        'adapter_type',
    ];

}
