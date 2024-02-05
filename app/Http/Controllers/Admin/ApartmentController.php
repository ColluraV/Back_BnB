<?php

namespace App\Http\Controllers\Admin;
use resource\TomTom;
use App\Http\Controllers\Controller;
use App\Models\Apartment;
use App\Models\Service;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Http;

class ApartmentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        $user=Auth::user();                         //fetch all logged user info
        $apartments= $user
            ->apartments()
            ->get();    //fetch all apartments linked to the user   
        dump($user);

        return view('admin.apartments.index', compact('apartments'));
        //Call for all Apartment on DB
        //$apartments = DB::table('apartments')
        //->select('*')
        //->get();
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $apartment=0;
        $apartments=Apartment::all();
        $services=Service::all();

        return view('admin.apartments.createUpdateApartament',compact('apartment'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //

        $data=$request;
        $api_key=env('api_key');

        $response = Http::get("https://api.tomtom.com/search/2/geocode/{'adress'}.jsonkey'".$api_key);  
    }

    /**
     * Display the specified resource.
     */
    public function show(Apartment $apartment)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Apartment $apartment)
    {

        // temporary we will use apartment 1, later to modify with the chosen one by the show page of the apartments
        $apartment = DB::table('apartments')
        ->find('1');

        return view('admin.apartments.createUpdateApartament', compact('apartment'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Apartment $apartment)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Apartment $apartment)
    {
        //
    }
}
