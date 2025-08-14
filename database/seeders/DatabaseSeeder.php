<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Listing;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory()->count(10)->create();

         $user = User::factory()->create([
            'name' => 'John Doe',
            'email' =>  'john@gmail.com'
        ]);

        Listing::factory(6)->create([
            'user_id' => $user->id
        ]); 

        // Listing::create([
        // 'title' => 'Laravel Senior Developer',
        // 'tags' => 'laravel, javascript',
        // 'company' => 'Acme Corp',
        // 'location' => 'Boston, MA',
        // 'email' => 'email1@acme.com',
        // 'website' => 'https://www.acme.com',
        // 'description' => 'Join our team as a Laravel Senior Developer. You will be responsible for backend architecture and API development.'
        // ]);

        // Listing::create([
        // 'title' => 'Full-Stack Engineer',
        // 'tags' => 'php, vue, css',
        // 'company' => 'Tech Solutions Ltd.',
        // 'location' => 'Remote',
        // 'email' => 'jobs@techsolutions.com',
        // 'website' => 'https://www.techsolutions.com',
        // 'description' => 'We’re looking for a full-stack engineer with experience in Laravel and Vue.js. Flexible hours and remote-first culture.'
        // ]);
    }
}