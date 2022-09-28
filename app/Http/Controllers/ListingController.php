<?php

namespace App\Http\Controllers;

use App\Models\Listing;
use Illuminate\Http\Request;

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
    public function show(Listing $listen){
        return view("listings.show",[
                "listen"=>$listen
       ]) ;
    }

}
