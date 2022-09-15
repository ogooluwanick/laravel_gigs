<?php

namespace App\Http\Controllers;

use App\Models\Listing;
use Illuminate\Http\Request;

class ListingController extends Controller
{
    //Show all listings         index()
    public function index(){
        return view('listings.index',[
                "heading"=>"Lastest Listings",
                "listens"=>Listing::all()
        ]);
    }

    //Show single listing       show()
    public function show(Listing $listen){
        return view("listings.show",[
                "listen"=>$listen
       ]) ;
    }
}
