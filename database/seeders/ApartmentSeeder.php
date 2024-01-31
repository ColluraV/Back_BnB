<?php

namespace Database\Seeders;

use App\Models\Apartment;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ApartmentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run() 
    {
       //generate 15 factory apartments
       $apartments=Apartment::factory()->count(15)->make(); 

       //add an unique id for any apartments
       foreach($apartments as $apartment){
        $apartment->user_id= fake()->unique()->numberBetween(1, User::count());
         
        $apartment->save();
       }
    }
}
