<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use App\Models\Customer;

class CustomerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create();

        foreach (range(1, 50) as $index) {
            Customer::create([
                'email' => $faker->unique()->safeEmail, 
                'password' => bcrypt('password'),
                'status' => $faker->randomElement(['active', 'inactive', 'banned']),
                'account_type' => $faker->randomElement(['basic', 'premium', 'enterprise']),
                'last_login' => $faker->dateTimeBetween('-1 year', 'now'),
                'created_at' => now(),
                'updated_at' => now(), 
            ]);
        }
    }
}
