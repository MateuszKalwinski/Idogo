<?php

use Illuminate\Database\Seeder;

class AnimalCharacteristicTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $faker = Faker\Factory::create();

        for ($i =1; $i<=300; $i++){
            for ($j =1; $j<=8; $j++) {
                DB::table('animal_characteristic')->insert([
                    'animal_id' => $i,
                    'characteristic_dictionary_id' => $j,
                    'character_status' => $faker->boolean(50),
                ]);
            }
        }
    }
}
