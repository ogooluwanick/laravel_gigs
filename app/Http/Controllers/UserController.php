<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Validation\Rule;
use Illuminate\Http\Request;


class UserController extends Controller
{
        //Show the Register Form create()
        public function create(){
                return view("users.register") ;
            }

            //Logout the User Form logout()
        public function logout(Request $request){
                auth()->logout();
                $request->session()->invalidate();
                $request->session()->regenerateToken();

                return redirect("/")->with("message","You have been logged out!");          
            }


    //Store single user       store()
    public function store(Request $request){
        // dd($request->name);

        $formFields = $request->validate([
                'name' => ['required', 'min:3'],
                'email' => ['required', 'email', Rule::unique('users', 'email')],
                'password' => 'required|confirmed|min:6'
            ]);

            //Hash password bcrypt
            $formFields["password"]=bcrypt( $formFields["password"]);

            //create.store user
            $user=User::create($formFields);

            //login created user 
            auth()->login($user); 

        return redirect("/")->with("message","User created successfully!");          // for flash message after redirect 
    }
}
