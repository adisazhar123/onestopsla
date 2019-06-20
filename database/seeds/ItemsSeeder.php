<?php

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use Illuminate\Support\Facades\DB;
use OneStopSla\Core\Domain\Models\Item;
use OneStopSla\Core\Domain\Models\Lend;
use OneStopSla\Core\Domain\Models\User;

class ItemsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create();

        $itemIds = array();

        for ($i = 1; $i <= 25; $i++)
        {
            $year = random_int(1995, 2019);
            $quantity = random_int(4, 17);

            $itemId = Item::create([
                'title' => $faker->company . ' ' . $year,
                'description' => $faker->realText(),
                'quantity' => $quantity,
                'category' => 'Vehicle'
            ])->id;

            $itemIds[] = $itemId;
        }

        for ($j=1; $j<=10; $j++)
        {
            DB::table('users')->insert([
                'name' => $faker->name,
                'email' => $faker->email,
                'password' => bcrypt('secret'),
                'nip' => $faker->bankAccountNumber,
                'role' => 'Employee'
            ]);
        }

        Lend::create([
            'users_id' => 1,
            'description' => $faker->realText(),
            'item_type' => 'Vehicle',
            'start_date_time' => \Carbon\Carbon::create('2019-06-15 04:28:49'),
            'end_date_time' => now(),
            'usage_type' => 'Extern',
            'controlled_by' => $faker->firstName(),
            'status' => 'Pending'
        ])->items()->attach([$itemIds[0], $itemIds[0], $itemIds[1]]);

        Lend::create([
            'users_id' => 2,
            'description' => $faker->realText(),
            'item_type' => 'Vehicle',
            'start_date_time' => \Carbon\Carbon::create('2019-06-15 04:28:49'),
            'end_date_time' => \Carbon\Carbon::create('2019-06-23 04:28:49'),
            'usage_type' => 'Extern',
            'controlled_by' => $faker->firstName(),
            'status' => 'Pending'
        ])->items()->attach([$itemIds[1], $itemIds[1], $itemIds[3]]);

        Lend::create([
            'users_id' => 3,
            'description' => $faker->realText(),
            'item_type' => 'Vehicle',
            'start_date_time' => \Carbon\Carbon::create('2019-06-18 04:28:49'),
            'end_date_time' => \Carbon\Carbon::create('2019-06-25 04:28:49'),
            'usage_type' => 'Extern',
            'controlled_by' => $faker->firstName(),
            'status' => 'Pending'
        ])->items()->attach([$itemIds[4], $itemIds[5]]);

        Lend::create([
            'users_id' => 5,
            'description' => $faker->realText(),
            'item_type' => 'Vehicle',
            'start_date_time' => \Carbon\Carbon::create('2019-06-18 04:28:49'),
            'end_date_time' => now(),
            'usage_type' => 'Extern',
            'controlled_by' => $faker->firstName(),
            'status' => 'Pending'
        ])->items()->attach([$itemIds[4], $itemIds[5]]);

    }
}
