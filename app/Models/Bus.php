<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Bus extends Model
{
    use HasFactory;
    protected $fillable = [
        'user_id',
        'bus_name',
        'bus_number',
        'capacity',
        'type',
        'departure_location',
        'arrival_location',
        'departure_time',
        'arrival_time',
    ];
}
