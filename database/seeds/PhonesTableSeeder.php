<?php

use Illuminate\Database\Seeder;

class PhonesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker\Factory::create();

        for ($i = 0; $i<20; $i++ ){
            DB::table('phones')->insert([

                'user_id' => $faker->numberBetween(1, 30),
                'phone' => $faker->phoneNumber,
                'created_at' => $faker->dateTime,
                'edited_at' => null,
                'edited_user_id' => null,
                'deleted_at' => null,
                'deleted_user_id' => null,
            ]);
        }
    }
}
