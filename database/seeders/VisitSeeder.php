<?php

namespace Database\Seeders;

use App\Models\Apartment;
use App\Models\Visit;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class VisitSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
       $visits = Visit::factory()->count(100)->make();

               //add an unique id for any apartments
       foreach($visits as $visit){
        $apartment=Apartment::inRandomOrder()->first();
        $visit->apartment_id = $apartment->id;
         
        $visit->save();
       }
    }
}
