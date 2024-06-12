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
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
        /* $this->run([
            CodyFighterSeeder::class,
        ]); */
        \App\Models\CodyFighter::create([
            'key' => "a5e0e6-f8a66d-92955f-5fbc6f",
            'mode' => 0,
        ]);
        \App\Models\CodyFighter::create([
            'key' => "a5e0e6-f8a66d-92955f-5fbc6f",
            'mode' => 1,
        ]);
        \App\Models\CodyFighter::create([
            'key' => "a5e0e6-f8a66d-92955f-5fbc6f",
            'mode' => 2,
        ]);
    }
}
