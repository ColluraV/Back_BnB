<?php

namespace Database\Seeders;

use App\Models\Apartment;
use App\Models\Sponsorship;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ApartmentSponsorshipTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */

    public function run()
    {
        $apartments = Apartment::all();
        $sponsorships = Sponsorship::all();
        $now= now();
        $sponsoredApartment = $apartments->random(6);

        foreach ($sponsoredApartment as $apartment) {
            //$apartment->sponsorship()->attach($sponsorships->random()->id);
            echo($apartment);
            $duration=$apartment->sponsorship->pluck('duration');
            
            
            $apartment->sponsorship()->attach($sponsorships->random()->id,['start_date_time' => $now,'end_date_time' => $now->addHours($duration)]);
            
            
        }
        echo($sponsoredApartment->pluck('id'));
    }
}
/*$apartment->sponsorship()->start_date_time()->attach($now);
 $apartment->service()->attach($services->random()->id);
 $apartment->start_date_time = now();
 $apartment->save();*/
/*

echo ($duration);
$apartment->sponsorship()->attach(['start_date_time' => now()]);*/