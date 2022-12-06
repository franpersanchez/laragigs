<?php

namespace App\Http\Controllers;

use App\Models\Listing;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;



class ListingController extends Controller
{
    //show all listings
    public function index(){
        return view('listings.index', [
            'heading'=>'Latest Listings',
            'listings'=> Listing::latest()->filter(request(['tag','search']))->paginate(4)
        ]);

    }

    //show single listing
    public function show(Listing $listing){
        return view('listings.show', [
            'listing'=>$listing
        ]);
    }

    //show create form
    public function create(){
        return view('listings.create');
    }

    //Store listing data
    public function store(Request $request){
        
        $formFields = $request->validate([
            
            'title'=>'required',
            'company'=>['required',Rule::unique('listings','company')],
            'location'=>'required',
            'website'=>'required',
            'email'=>['required','email'],
            'tags'=>'required',
                        'description'=>'required'
            ] 
        );

        if($request->hasFile('logo')){
            $path= $request->file('logo')->store('logos','public');
            $formFields['logo']=$path;
        }

        Listing::create($formFields);

        return redirect('/')->with('message','Listing created successfully');
    }

    //show edit form

    public function edit(Listing $listing){
        return view('listings.edit', ['listing' =>$listing]);
    }

    public function update(Request $request, Listing $listing){
        
        $formFields = $request->validate([
            
            'title'=>'required',
            'company'=>'required',
            'location'=>'required',
            'website'=>'required',
            'email'=>['required','email'],
            'tags'=>'required',
                        'description'=>'required'
            ] 
        );

        if($request->hasFile('logo')){
            $path= $request->file('logo')->store('logos','public');
            $formFields['logo']=$path;
        }

       $listing->update($formFields);

        return back()->with('message','Listing updated successfully');
    }

    public function destroy(Listing $listing){
        $listing->delete();
        return redirect('/')->with('message', "Deleted successfully");
    }
}
