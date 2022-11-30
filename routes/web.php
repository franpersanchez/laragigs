<?php

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

//all listings
Route::get('/', function () {
    return view('listings', [
        'heading'=>'Latest Listings',
        'listings'=> Listing::all()
    ]);
});

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

//Route model binding
Route::get('/listings/{listing}', function (Listing $listing) {
    return view('listing', [
        'listing'=>$listing
    ]);
});

