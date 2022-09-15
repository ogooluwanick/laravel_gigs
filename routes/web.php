<?php

use Faker\Provider\Lorem;
use Illuminate\Http\Request;
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

//All posts 
Route::get('/', function () {           //to view an html blade page
    return view('listens',[
        "heading"=>"Lastest Listings",
        "listens"=>Listing::all()
    ]);
});


//Single post
Route::get("/listings/{listen}",function(Listing $listen){                                                //learn more about route model binding 
       return view("listen",[
                "listen"=>$listen
       ]) ;
});







// Route::get("/help",function(){                   //to view a plain returned text (can include html)
//         return "<i>Hello sir</i>  ";
// });

// Route::get("/404",function(){                   //to return http status codes and register errors(responses)
//         return response("<h1>404 error I repeat</h1>",404)
//                 ->header("Content-Type","text/plain")
//                 ->header("Custom-Header","bar");                         //I can insert muiltiple headers
// });

// Route::get("/posts/{id}",function($id){                 //to handle dynamic url
//         // dd($id);                                                                //die and dump for debugging values
//         ddd($id);                                                                //die , dump , debug for more debugging values
//         return response("Post "  .  $id);
//         return "<i>Post" .   " $id</i>  ";
// })->where("id","[0-9]+");                                                            //to add a constrain to  dynamic url with regex


// Route::get("search",function(Request $request){                  //to get search quaries 
// //        dd($request) ;
//        dd($request->name." ". $request->city) ;
// });