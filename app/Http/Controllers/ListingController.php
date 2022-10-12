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
   
    //Manage Listings    manage()
    public function manage(){
        // dd(auth()->user()->listings()->get());
        return view("listings.manage",[
                "listings"=>auth()->user()->listings()->get()
        ]) ;
    }

    //Store single listing       store()
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
            $formFields["user_id"]=auth()->id();

            if($request->hasFile("logo")){
                $formFields["logo"]=$request->file("logo")->store("logos","public");
            }

            Listing::create($formFields);

        //     dd(auth()->id());

        return redirect("/")->with("message","Listing created successfully!");          // for flash message after redirect 
    }
    
    //the form edit()
    public function edit(Listing $listen){
            // dd($listen->title);
            return  view("listings.edit",[
                    "listen"=>$listen
            ]);
    }
    
    //Delete listing delete()
    public function delete(Listing $listen){
        //     dd($listen->title);
            $listen->delete();
            return redirect("/")->with("message","Listing deleted successfully!");          // for flash message after redirect 

    }
    
  //Update single listing       update()
  public function update(Request $request,Listing $listen){
        // dd($request->file("logo"));

        $formFields = $request->validate([
                'title' => 'required',
                'company' => ['required'],
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

            $listen->update($formFields);


        return back()->with("message","Listing updated successfully!");          // for flash message after going back to previous page 
    }

    //Show single listing       show()
    public function show(Listing $listen){
        return view("listings.show",[
                "listen"=>$listen
       ]) ;
    }

}
