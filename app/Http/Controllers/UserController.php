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

             //Show the login Form login()
        public function login(){
                return view("users.login") ;
            }

            //Logout the User Form logout()
        public function logout(Request $request){
                auth()->logout();
                $request->session()->invalidate();
                $request->session()->regenerateToken();

                return redirect("/")->with("message","You have been logged out!");          
            }
        
             //Login the User  auth()
            public function auth(Request $request){
                // dd($request);
                $formFields = $request->validate([
                        'email' => ['required', 'email'],
                        'password' => 'required'
                    ]);
            
                    if(auth()->attempt($formFields)) {
                        $request->session()->regenerate();

                        return redirect('/')->with('message', 'You are now logged in!');
                    }
                        // dd($request);
            
                        return redirect('/login')->with('message', 'Invalid Credentials');

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
