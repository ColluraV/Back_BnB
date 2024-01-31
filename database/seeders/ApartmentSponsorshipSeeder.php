<?php

namespace Database\Seeders;

use App\Models\Apartment;
use App\Models\Sponsorship;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ApartmentSponsorshipSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('apartment_sponsorship')->insert([
            [
                'start_date_time' => '2023-11-01 00:00:00',
                'end_date_time' => '2023-11-02 00:00:00',
                'sponsorship_id' => 1,
                'apartment_id' => 1,
            ],
            
            [
                'start_date_time' => '2023-11-03 00:00:00',
                'end_date_time' => '2023-11-06 00:00:00',
                'sponsorship_id' => 2,
                'apartment_id' => 2,
            ], 

            [
                'start_date_time' => '2024-07-01 00:00:00',
                'end_date_time' => '2024-07-07 00:00:00',
                'sponsorship_id' => 3,
                'apartment_id' => 3,
            ],

            [
                'start_date_time' => '2024-01-03 00:00:00',
                'end_date_time' => '2024-01-07 00:00:00',
                'sponsorship_id' => 2,
                'apartment_id' => 5,
            ], 

            [
                'start_date_time' => '2023-08-01 00:00:00',
                'end_date_time' => '2023-08-02 00:00:00',
                'sponsorship_id' => 1,
                'apartment_id' => 9,
            ],

            [
                'start_date_time' => '2023-02-03 00:00:00',
                'end_date_time' => '2023-02-06 00:00:00',
                'sponsorship_id' => 2,
                'apartment_id' => 2,
            ], 

            [
                'start_date_time' => '2024-01-01 00:00:00',
                'end_date_time' => '2024-01-02 00:00:00',
                'sponsorship_id' => 1,
                'apartment_id' => 10,
            ],

            [
                'start_date_time' => '2024-01-03 00:00:00',
                'end_date_time' => '2024-01-06 00:00:00',
                'sponsorship_id' => 2,
                'apartment_id' => 15,
            ], 

            [
                'start_date_time' => '2024-01-01 00:00:00',
                'end_date_time' => '2024-01-02 00:00:00',
                'sponsorship_id' => 1,
                'apartment_id' => 8,
            ],

            [
                'start_date_time' => '2023-10-03 00:00:00',
                'end_date_time' => '2023-10-07 00:00:00',
                'sponsorship_id' => 2,
                'apartment_id' => 2,
            ],  

            [
                'start_date_time' => '2023-05-11 00:00:00',
                'end_date_time' => '2023-05-12 00:00:00',
                'sponsorship_id' => 1,
                'apartment_id' => 8,
            ],

            [
                'start_date_time' => '2024-01-20 00:00:00',
                'end_date_time' => '2024-01-26 00:00:00',
                'sponsorship_id' => 3,
                'apartment_id' => 2,
            ],
            // Aggiungi altre righe qui
        ]);
    }
}





/*
namespace Database\Seeders;

use App\Models\Apartment;
use App\Models\Sponsorship;
use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;


class ApartmentSponsorshipTableSeeder extends Seeder
{


    public function run()
    {
        $apartments = Apartment::all();
        $sponsorships = Sponsorship::all();
        $now=Carbon::now();
        $sponsoredApartment = $apartments->random(6);
        $carbonNow=Carbon::parse($now);
        
        foreach ($sponsoredApartment as $apartment) {
            
            $time= $carbonNow->addHours(144);
            $apartment->sponsorship()->attach($sponsorships->random()->id);
            echo($carbonNow);
            echo(" - ");
            //dd($time);
            
            $apartment->sponsorship()->attach($now['start_date_time']);
            $apartment->sponsorship()->attach($time['end_date_time']);
            $duration=$apartment->sponsorship->pluck('duration');
            

            
            
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