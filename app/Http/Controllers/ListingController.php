<?php

namespace App\Http\Controllers;

use App\Models\Listing;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class ListingController extends Controller
{
    //Show all listings         index()
    public function index(){
        // dd(request("tag"));
        return view('listings.index',[
                "heading"=>"Lastest Listings",
                "listens"=>Listing::latest()->filter(request(["tag","search"]))->get()
        ]);
    }
    
    //Show the form       create()
    public function create(){
        return view("listings.create") ;
    }

    //Show single listing       show()
    public function store(Request $request){
        // dd($request->all());

        $formFields = $request->validate([
                'title' => 'required',
                'company' => ['required', Rule::unique('listings', 'company')],
                'location' => 'required',
                'website' => 'required',
                'email' => ['required', 'email'],
                'tags' => 'required',
                'desc' => 'required'
            ]);

            Listing::create($formFields);


        return redirect("/")->with("message","Listing created successfully!");
    }

    //Show single listing       show()
    public function show(Listing $listen){
        return view("listings.show",[
                "listen"=>$listen
       ]) ;
    }

}
