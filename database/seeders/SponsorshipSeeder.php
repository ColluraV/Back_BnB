<?php

namespace Database\Seeders;

use App\Models\Sponsorship;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SponsorshipSeeder extends Seeder
{

    private $sponsor=[
        //bronze
        [
            "name"=>"Bronze",
            "price"=>2,99,
            "duration"=>24,
        ],
        //Silver
        [
            "name"=>"Silver",
            "price"=>5,99,
            "duration"=>72,
        ],
        //Gold
        [
            "name"=>"Gold",
            "price"=>9,99,
            "duration"=>144,
        ],
    ];

    /**
     * Run the database seeds.
     */
    public function run(): void
    {
       
            // cycle for populate database
            foreach ($this->sponsor as $sponsor) {
                $newSponsor = new Sponsorship();
                $newSponsor->name = $sponsor["name"];
                $newSponsor->price = $sponsor["price"];
                $newSponsor->duration = $sponsor["duration"];
                $newSponsor->save();
            }
        }
  
}
