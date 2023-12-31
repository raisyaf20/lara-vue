<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Transaction;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

        \App\Models\Transaction::factory(10)->create();
        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

        // Transaction::factory()->create([
        //     "title" => "Shoping",
        //     "Amount" => 12300,
        //     "type" => "revenue"
        // ]);
        // Transaction::create([
        //     "title" => "Shoping",
        //     "Amount" => 12300,
        //     "type" => "revenue"
        // ]);
    }
}
