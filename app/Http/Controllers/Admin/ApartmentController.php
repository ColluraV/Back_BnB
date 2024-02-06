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

        return view('admin.apartments.createUpdateApartament',compact('apartment','services'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $data=$request->all();

        $newApartment=new Apartment();
        $newApartment->title=$data['title'];
        $newApartment->rooms_number=$data['rooms_number'];
        $newApartment->beds_number=$data['beds_number'];
        $newApartment->bath_number=$data['bath_number'];
        $newApartment->dimensions=$data['dimensions'];
        $newApartment->address=$data['address'];
        $newApartment->images='123445678894';   //ATTENZIONE! PROVVISORI DA CAMBIARE    
        $newApartment->latitude='12.8894';      //ATTENZIONE! PROVVISORI DA CAMBIARE
        $newApartment->longitude='12.8894';     //ATTENZIONE! PROVVISORI DA CAMBIARE

        $newApartment->visibility=$data['visibility'];

       

        if (key_exists("services", $data)){
            $newApartment->services()->attach($data['services']);
        }
        $newApartment->save();
        
                
        //$api_key=env('api_key');

        //$response = Http::get("https://api.tomtom.com/search/2/geocode/{'adress'}.jsonkey'".$api_key);  
        
        return redirect()->route('admin.apartments.show', $newApartment->id);
    }

    /**
     * Display the specified resource.
     */
    public function show(Apartment $apartment)
    {

        $apartment= Apartment::findOrFail($apartment->id);
        return view ('admin.apartments.show', compact('apartment'));        
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Apartment $apartment)
    {

        //picking the apartament on with a specific ID
        $apartment = Apartment::where("id",$apartment->id)->firstOrFail();

        

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
