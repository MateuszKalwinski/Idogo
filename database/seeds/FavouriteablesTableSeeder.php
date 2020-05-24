<?php

use Illuminate\Database\Seeder;

class FavouriteablesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker\Factory::create();

        for ($i = 1; $i <= 40; $i++) {

            DB::table('favouriteables')->insert([
                'favouriteable_type' => $faker->randomElement($array = array('App\Shelter', 'App\Animal')),
                'favouriteable_id' => $faker->numberBetween(1, 30),
                'user_id' => $faker->numberBetween(1, 30),
            ]);
        }
    }
}
