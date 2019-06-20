<?php

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use OneStopSla\Core\Domain\Models\User;

class UsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create();

        for ($i=1; $i<=10; $i++)
        {
            User::create([
                'name' => $faker->name(),
                'email '=> $faker->safeEmail,
                'password' => bcrypt('secret'),
                'nip' => $faker->phoneNumber,
                'role' => 'Employee'
            ]);
        }
    }
}
