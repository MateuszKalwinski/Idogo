<?php

use Illuminate\Database\Seeder;

class AgeDictionaryTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker\Factory::create();

        $age_dictionary = ['młody', 'dorosły', 'senior'];

        foreach ($age_dictionary as $age){
            DB::table('age_dictionary')->insert([
                'name' => $age,
                'created_at' => $faker->dateTime,
                'created_user_id' => 1,
                'edited_at' => null,
                'edited_user_id' => null,
                'deleted_at' => null,
                'deleted_user_id' => null,
            ]);
        }
    }
}
