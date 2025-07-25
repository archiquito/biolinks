<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {

        // You can also create links for the users
        $this->call([
            UserSeeder::class,
            LinkSeeder::class,
        ]);
    }
}
