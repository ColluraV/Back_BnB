<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Apartment extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'rooms_number',
        'beds_number',
        'bath_number',
        'dimensions',
        'address',
        'images',
        'visibility',
        'latitude',
        'longitude',
    ];
}
