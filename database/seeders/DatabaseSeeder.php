<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

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
        $faker = Faker::create('en_IN');
    	foreach (range(1,2) as $index) {
            DB::table('students')->insert([
                'name' => $faker->firstNameMale,
                'country' => 2,
                'state' => 14,
                'city' => 1,
                'email' => $faker->email,
                'phone' => $faker->phoneNumber,
                'password' => Hash::make($faker->firstNameMale)
            ]);
        }
    }
}
