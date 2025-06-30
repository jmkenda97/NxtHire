<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Listing;
use App\Models\User;
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
        //\App\Models\User::factory(5)->create();
        $user = User::factory()->create([
          'name' =>'John Doe',
          'email' =>'john@gmail.com'
        ]);

        Listing::factory(6)->create([
          'user_id' => $user->id
        ]);

      /*Listing::create([ 
        'title' => 'Laravel senior developer',
        'tags' => 'laravel, javascript',
        'company' => 'ACME Corp',
        'location' => 'Boston, MA',
        'email' => 'jmkenda97@gmail.com',
        'website' => 'https://www.acne.com',
        'description' => "Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. 
        Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.",

        ]);

         Listing::create([
        'title' => 'Laravel Fullstack developer',
        'tags' => 'laravel, javascript',
        'company' => 'ACME Corp',
        'location' => 'Boston, MA',
        'email' => 'jmkenda97@gmail.com',
        'website' => 'https://www.acne.com',
        'description' => "Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. 
        Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.",
        ]);*/
    }
}
