<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;


use App\Models\Sponsorship;
use Database\Factories\ApartmentSponsorshipFactory;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call([
            UserSeeder::class,
            ApartmentSeeder::class,
            SponsorshipSeeder::class,
            ServiceSeeder::class,
            VisitSeeder::class,
            MessageSeeder::class,
            ApartmentServiceTableSeeder::class,
            ApartmentSponsorshipSeeder::class,
        ]);

        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
    }
}
