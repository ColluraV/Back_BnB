<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class TomtomController extends Controller
{
    private $baseUrl = 'https://api.tomtom.com/search/2/geocode/';
    private $apiKey = '';

    public function _construct() {
        $this -> apiKey = env('api_key');
    }

    public function test(Request $request) {
        $response = $request -> input('location');
        return response()->json($response);
    }

    public function getGeoData(Request $request)
    {

        $location = $request -> input('location');
        
        /*$response = Http::withOptions(['verify' => false])->get("$this->baseUrl/$location.json", [
            "storeResult" => false,
            "limit" => 10,
            "countrySet" => "it",
            "key" => $this->apiKey
        ]);*/

        $response = "$this->baseUrl/$location.json?key=$this->apiKey"; 

        return $response;

        $preparedLocations = $this->prepareLocations($response->json('results'));

        // return response()->json($preparedLocations);
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
