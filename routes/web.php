<?php

use App\Http\Controllers\Admin\ApartmentController;
use App\Http\Controllers\Admin\MessageController;
use App\Http\Controllers\Admin\VisitController;
use App\Http\Controllers\ApartmentController as ControllersApartmentController;
use App\Http\Controllers\ProfileController;
use Illuminate\Routing\ViewController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');


Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});


Route::middleware('auth')
->prefix("admin") //Path prefix
->name("admin.") //Name prefix
->group(function() {
    Route::resource("apartments", ApartmentController::class);
    Route::get("visits/{id}", [VisitController::class, 'show'])->name("visits.show");
    Route::resource("messages", MessageController::class);
    //Route::get("messages", [MessageController::class,'index'])->name('messages.index');
    //Route::delete("messages/{id}", [MessageController::class, 'destroy'])->name('messages.destroy');
});

//---------Messages Routes----------//
//Route::get('/message/create',function(){
//    return view('admin.messages.create');
//});
//Route::post("/messages", [MessageController::class, "store"])->name("message.store");


require __DIR__.'/auth.php';


