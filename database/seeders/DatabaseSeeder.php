<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\User;
use App\Models\Listing;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(5)->create();
        $user=User::factory()->create(["name"=>"John Smart","email"=>"John@mail.com"]);;
        Listing::factory(4)->create(["user_id"=>$user->id]);

        // Listing::create([
        //         'title'=>'Laravel Snr Dev',
        //         "tags"=>"laravel,js",
        //         "company"=>"ACME corp",
        //         "location"=>"Lagos, Nig",
        //         "email"=>"acme.mai@lmail.com",
        //         "website"=>"www.acme.co.uk",
        //         "desc"=>"Lorem ipsum dolor sit amet consectetur adipisicing elit. A, explicabo minus? Ullam culpa architecto dolorem, quam dolor quibusdam odit ut neque non incidunt possimus a deserunt debitis libero. Voluptatibus, est?",
        // ]);
        // Listing::create([
        //         'title'=>'Full stack Dev',
        //         "tags"=>"MERN,js,react,api",
        //         "company"=>"Steark corp",
        //         "location"=>"ABJ, Nig",
        //         "email"=>"starkdumb@fmail.com",
        //         "website"=>"www.stack.co.mk",
        //         "desc"=>"FUorem mmmm dolor sit amet consectetur sure check me tf  elit. A, explicabo minus? Ullam culpa architecto dolorem, quam dolor quibusdam odit ut neque non incidunt possimus a deserunt debitis libero. Voluptatibus, est?",
        // ]);

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
    }
}
