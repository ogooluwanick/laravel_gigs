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
                "listens"=>Listing::latest()->filter(request(["tag","search"]))->paginate(6)
        ]);
    }
    
    //Show the form       create()
    public function create(){
        return view("listings.create") ;
    }

    //Show single listing       show()
    public function store(Request $request){
        // dd($request->file("logo"));

        $formFields = $request->validate([
                'title' => 'required',
                'company' => ['required', Rule::unique('listings', 'company')],
                'location' => 'required',
                'website' => 'required',
                'email' => ['required', 'email'],
                'tags' => 'required',
                'desc' => 'required'
            ]);

            $formFields["tags"]=trim($formFields["tags"]);

            if($request->hasFile("logo")){
                $formFields["logo"]=$request->file("logo")->store("logos","public");
            }

            Listing::create($formFields);


        return redirect("/")->with("message","Listing created successfully!");          // for flash message after redirect 
    }

    //Show single listing       show()
    public function show(Listing $listen){
        return view("listings.show",[
                "listen"=>$listen
       ]) ;
    }

}
