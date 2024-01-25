<?php

namespace Database\Seeders;

use App\Models\Apartment;
use App\Models\Service;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ApartmentServiceTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        $apartments = Apartment::all();
        $services = Service::all();

        foreach ($apartments as $apartment) {
            $apartment->services()->sync($services->random()->id);
        }
    }
}
