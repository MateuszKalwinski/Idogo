<?php

use Illuminate\Database\Seeder;

class AnimalDictionaryTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $faker = Faker\Factory::create();


        $gender_start = 1;
        $species_array = [1,1,2,2,3,3,4,4,5,5,6,6,7,7];

        $animal_dictionary = array(
            ['gender_id' => 1, 'species_id' => 1, 'name' => 'Pies'],
            ['gender_id' => 2, 'species_id' => 1, 'name' => 'Suczka'],

            ['gender_id' => 1, 'species_id' => 2, 'name' => 'Kot'],
            ['gender_id' => 2, 'species_id' => 2, 'name' => 'Kotka'],

            ['gender_id' => 1, 'species_id' => 3, 'name' => 'Świnka morska'],
            ['gender_id' => 2, 'species_id' => 3, 'name' => 'Świnka morska'],

            ['gender_id' => 1, 'species_id' => 4, 'name' => 'Królik'],
            ['gender_id' => 2, 'species_id' => 4, 'name' => 'Królik'],

            ['gender_id' => 1, 'species_id' => 5, 'name' => 'Chomik'],
            ['gender_id' => 2, 'species_id' => 5, 'name' => 'Chomik'],

            ['gender_id' => 1, 'species_id' => 6, 'name' => 'Szczur'],
            ['gender_id' => 2, 'species_id' => 6, 'name' => 'Szczur'],

            ['gender_id' => 1, 'species_id' => 7, 'name' => 'Papuga'],
            ['gender_id' => 2, 'species_id' => 7, 'name' => 'Papuga'],

            ['gender_id' => 1, 'species_id' => 8, 'name' => 'Rybka'],
            ['gender_id' => 2, 'species_id' => 8, 'name' => 'Rybka'],
        );
        foreach ($animal_dictionary as $value){


            DB::table('animal_dictionary')->insert([
                'gender_id' => $value['gender_id'],
                'species_id' => $value['species_id'],
                'name' => $value['name'],
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
