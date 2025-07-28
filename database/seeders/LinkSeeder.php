<?php

namespace Database\Seeders;

use App\Models\Link;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class LinkSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $num = 0;
       User::all()
            ->each(function ($user) {
               Link::factory()->resetPosition()->count(5)->create([
                    'user_id' => $user->id,
                
                ]);
            });
    }
}
