<?php

namespace Database\Seeders;

use App\Models\Apartment;
use App\Models\Message;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class MessageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $messages=Message::factory()->count(10)->make();

        foreach($messages as $message){
            $apartment=Apartment::inRandomOrder()->first();
            $message->apartment_id = $apartment->id;
             
            $message->save();
           }
    }
}
