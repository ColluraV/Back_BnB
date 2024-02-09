<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class TomtomController extends Controller
{
    // Initialization of constants
    private $baseUrl = 'https://api.tomtom.com/search/2/geocode/';
    private $apiKey = '';


    public function getGeoData(Request $request)
    {
        // take the apikey from file env
        $this -> apiKey = env('api_key');

        // take the input value and put it into the variable $location
        $location = $request -> input('location');
        
        // teoricamente dovrebbe costruire il link a tomtom, ma dato che non prende l'apiKey, non riesce neanche a connettersi
        $response = Http::withOptions(['verify' => false])->get("$this->baseUrl/$location.json", [
            "storeResult" => false,
            "limit" => 10,
            "countrySet" => "it",
            "key" => $this->apiKey
        ]);

        // variable filled with the locations 'cleaned' from nnecessary data
        $preparedLocations = $this->prepareLocations($response->json('results'));

        return response()->json($preparedLocations);
    }

    private function prepareLocations($locations) 
    {
        $preparedLocations = [];

        for ($i=0; $i < count($locations) ; $i++) { 
            $loc = $locations[$i];

            $preparedLocation = [
                'address' => $loc['address']['freeformAddress'],
                'position' => $loc['position']
            ];

            array_push($preparedLocations, $preparedLocation);
        }

        return $preparedLocations;
    }
}
