<?php

namespace Database\Seeders;

use App\Models\Service;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ServiceSeeder extends Seeder
{

    private $services=[
        ["name"=>"Wi-Fi"],
        ["name"=>"Parcheggio Esterno"],
        ["name"=>"Piscina"],
        ["name"=>"Tv"],
        ["name"=>"Climatizzatore"],
        ["name"=>"Portineria"],
        ["name"=>"Servizio in camera"],
        ["name"=>"Sauna"],
        ["name"=>"Vista Mare"],
        ["name"=>"Palestra"],
        ["name"=>"Colonnina Ricarica"],
        ["name"=>"Terrazzo"],
        ["name"=>"Parcheggio Coperto"],
    ];
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        {
       
            // cycle for populate database
            foreach ($this->services as $service) {
                $newService = new Service();
                $newService->name = $service["name"];

                $newService->save();
            }
        }
    }
}
