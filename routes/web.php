<?php

use App\Http\Controllers\ListingController;
use App\Http\Controllers\UserController;
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
Route::get('/',    [ListingController::class ,"index"]);

//Show the form create()
Route::get("/listings/create", [ListingController::class,"create"])->middleware("auth");

//Store Listing data from form            
Route::post("/listings", [ListingController::class,"store"])->middleware("auth");

//the form edit()
Route::get("/listings/{listen}/edit", [ListingController::class,"edit"])->middleware("auth");

//submit to update()
Route::put("/listings/{listen}", [ListingController::class,"update"])->middleware("auth");

//Manage Listings()
Route::get("/listings/manage", [ListingController::class,"manage"])->middleware("auth");

//DELETE listing to delete()
Route::delete("/listings/{listen}", [ListingController::class,"delete"])->middleware("auth");

//Single post             //dynamic endpoints should be at the end
Route::get("/listings/{listen}", [ListingController::class,"show"]);

//Show the Register Form create()
Route::get("/register", [UserController::class,"create"])->middleware("guest");

//Logout user Form logout()
Route::post("/logout", [UserController::class,"logout"])->middleware("auth");

//Create new user store()
Route::post("/users", [UserController::class,"store"]);

//Show Login form  (user) login()
Route::get("/login", [UserController::class,"login"])->name("login")->middleware("guest");

// Login user  (user) login()
Route::post("/users/auth", [UserController::class,"auth"]);






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