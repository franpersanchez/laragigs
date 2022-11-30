<?php

use App\Http\Controllers\ListingController;
use Illuminate\Support\Facades\Route;
use App\Models\Listing;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

//Common Resource Rotes!!
//index - Show all listings
//show - Show single listing
//create - Show form to create new listing
//store - Store new listing
//edit - Show form to edit listing
//update - Update listing
//destroy - Delete listing


//all listings
Route::get('/', [ListingController::class,'index']);

//single listing

/* One way of doing it to check if id exists
    Route::get('/listings/{id}', function ($id) {
    $listing = Listing::find($id);
    if($listing){
        return view('listing', [
        
            'listing'=> $listing
        ]);
    }
    else{
        abort('400');
    }
    
}); */


//show Create Form
Route::get('/listings/create', [ListingController::class,'create']);

//sotre Form
Route::post('/listings', [ListingController::class,'store']);

//Route model binding
Route::get('/listings/{listing}', [ListingController::class,'show']);

