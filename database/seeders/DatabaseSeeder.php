<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Database\Seeders\BookSeeder;
use Database\Seeders\MemberSeeder;
use Database\Seeders\BookCopySeeder;
use Database\Seeders\MemberBookSeeder;
use Database\Seeders\UserSeeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        $this->call(class: [
            BookSeeder::class,
            // MemberSeeder::class,
            // BookCopySeeder::class,
            // MemberBookSeeder::class,
            UserSeeder::class
        ]);

    }
}
