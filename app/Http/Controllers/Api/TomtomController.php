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

    // teoricamente dovrebbe prendere il valore dal file env e darlo a $apiKey
    public function _construct() {
        $this -> apiKey = env('api_key');
    }

    // test per vedere se è connesso con le rotte api
    public function test(Request $request) {
        $response = $request -> input('location');
        return response()->json($response);
    }

    public function getGeoData(Request $request)
    {

        // take the input value and put it into the variable $location
        $location = $request -> input('location');
        
        // teoricamente dovrebbe costruire il link a tomtom, ma dato che non prende l'apiKey, non riesce neanche a connettersi
        $response = Http::withOptions(['verify' => false])->get("$this->baseUrl/$location.json", [
            "storeResult" => false,
            "limit" => 10,
            "countrySet" => "it",
            "key" => $this->apiKey
        ]);

        // test per vedere il link che costruisce
        // $response = "$this->baseUrl/$location.json?key=$this->apiKey"; 

        // return per i test
        // return $response;

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
