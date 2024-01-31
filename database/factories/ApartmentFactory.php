<?php

namespace Database\Factories;
use App\Models\Apartment;
use Faker\Guesser\Name;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Apartment>
 */
class ApartmentFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return[
            'title'=>fake()->name(),
            'rooms_number'=> fake()->randomDigitNot(0),
            'beds_number'=> fake()->randomDigitNot(0),
            'bath_number'=> fake()->randomDigitNot(0),
            'dimensions'=> fake()->numberBetween(45,150),
            'address'=> fake()->address(),
            'images'=> fake()->imageUrl(360, 360, 'animals', true, 'dogs', true),
            'visibility'=> fake()->boolean(),
            'latitude'=> fake()->latitude($min = -90, $max = 90),
            'longitude'=> fake()->longitude($min = -90, $max = 90),


        ];    
    
 
    }
}
