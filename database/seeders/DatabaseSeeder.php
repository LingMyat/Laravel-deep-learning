<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Database\Seeders\UserSeeder;
use Database\Seeders\PostsSeeder;
use Illuminate\Foundation\Auth\User;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        \App\Models\User::factory(20)->create();
        // User::factory()
        // ->count(50)
        // ->hasPosts(1)
        // ->create();
    //    $this->call([
    //     UserSeeder::class,
    //     PostsSeeder::class,
    //    ]);
    }
}
