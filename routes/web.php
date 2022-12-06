<?php

use App\Models\Listing;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ListingController;
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

//sotre Listing data 
Route::post('/listings', [ListingController::class,'store']);


Route::get('listings/{listing}/edit', [ListingController::class,'edit']);

//Update listing
Route::put('/listings/{listing}', [ListingController::class,'update']);


//Route model binding
Route::get('/listings/{listing}', [ListingController::class,'show']);

//Route delete listing
Route::delete('/listings/{listing}', [ListingController::class,'destroy']);

//show register form
Route::get('/register',[UserController::class,'create']);

//create new user
Route::post('/users', [UserController::class,'store']);

//log user out
Route::post('logout', [UserController::class,'logout']);