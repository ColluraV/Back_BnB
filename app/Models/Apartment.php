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

    public function user() {
        return $this->belongsTo(User::class);
    }


    public function service() {
        return $this->belongsToMany(Service::class);
    }

    public function sponsorship() {
        return $this->belongsToMany(Sponsorship::class);
    }

    public function message() {
        return $this->hasMany(Message::class);
    } 
    
    public function visit() {
        return $this->hasMany(Visit::class);
    }

    
}
