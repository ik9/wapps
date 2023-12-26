<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class NetworkNote extends Model
{
    use HasFactory;

    protected $fillable = [
        'equipment_number',
        'location',
        'content',
        'type_id',
        'type',
        'user_id',
        'photos'
    ];

}

