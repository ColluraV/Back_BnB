<?php

namespace App\Http\Controllers\Admin;
use Illuminate\Support\Env;
\Dotenv\Dotenv::createImmutable(__DIR__)->load();

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\ApartmentsStoreRequest;
use App\Models\Apartment;
use App\Models\Service;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;

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

        return view('admin.apartments.index', compact('apartments'));

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $user=Auth::user();
        $apartment=0;
        $apartments=Apartment::all();
        $services=Service::all();

        return view('admin.apartments.create',compact('apartment','services'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(ApartmentsStoreRequest $request)
    {
        //

        $data = $request->validated();

        $api_key=env('MIX_API_KEY');
        $query=$data['address'];
        
        //calling tomtom api 
        $response = Http::get("https://api.tomtom.com/search/2/geocode/getaddress.json", [
            'query' => $query,
            'key' => $api_key,
        ]);
        $geoData = $response->json();

       
        
        $data['latitude']=$geoData['results'][0]['position']['lat'];      //Catching coordinates from API reader
        $data['longitude']=$geoData['results'][0]['position']['lon'];     //Catching coordinates from API reader
        $data['user_id'] = Auth::user()->id;
        if (isset($data['images'])){
        $data['images']=Storage::put("images", $data["images"]);
        }

        $newApartment=Apartment::create($data); //fill e save
       
        
                if (key_exists("services", $data)){
                    $newApartment->services()->attach($data['services']);
                }
        

        
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
        $services=Service::all();
         
        if (Auth::user()->id == $apartment->user_id) { //picking user_id and authenticated user_id  
            return view('admin.apartments.edit', compact('apartment','services',));
        }
            else {
                return abort(404); //error if logged with different user_id -> 404
            }
        }
    

    /**
     * Update the specified resource in storage.
     */
    public function update(ApartmentsStoreRequest $request, Apartment $apartment)
    {
        $data=$request->validated();
        $apartment = Apartment::where("id",$apartment->id)->firstOrFail();
        if(isset($data['images'])){
            if ($apartment->images){
                Storage::delete($apartment->images);
            }
            $newImg=Storage::put("images", $data["images"]);
            $data['images']=$newImg;
        }
        $data["services"] = $request->input('services', []);
        // Manually assign the services array
        // -> detaches the services not present in the new array
        // -> attaches services not present in the old array
        $apartment->services()->sync($data["services"]); // accesses the relationship and invokes the sync method
    
        $apartment->update($data); // Update item data
        return redirect()->route('admin.apartments.show', compact('apartment'));


    }
    
    

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Apartment $apartment)
    {
        //
        $apartment = Apartment::where("id",$apartment->id)->firstOrFail();

        if($apartment->images){
            Storage::delete($apartment->images);
        }
        $apartment->services()->detach();
        $apartment->sponsorships()->detach();
        $apartment->delete();

        return redirect()->route("admin.apartments.index");
    }
}
