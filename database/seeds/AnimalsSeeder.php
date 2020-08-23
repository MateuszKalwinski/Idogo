<?php

use Illuminate\Database\Seeder;

class AnimalsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker\Factory::create();

        for ($i = 1; $i <= 300; $i++) {

            $animal_id = $faker->numberBetween(1, 8);
            $gender_id = $faker->numberBetween(1, 2);

//SPECIES_ID 2 [1-231]
//SPECIES_ID 2 [232-305]
//SPECIES_ID 3 [306-323]
//SPECIES_ID 4 [324-374]
//SPECIES_ID 5 [375-379]
//SPECIES_ID 6 [380-382]
//SPECIES_ID 7 [383-400]
//SPECIES_ID 8 [401-410]

            switch ($animal_id) {
                case 1:
                    $min = 1;
                    $max = 231;
                    break;
                case 2:
                    $min = 232;
                    $max = 305;
                    break;
                case 3:
                    $min = 306;
                    $max = 323;
                    break;
                case 4:
                    $min = 324;
                    $max = 374;
                    break;
                case 5:
                    $min = 375;
                    $max = 379;
                    break;
                case 6:
                    $min = 380;
                    $max = 382;
                    break;
                case 7:
                    $min = 383;
                    $max = 400;
                    break;
                case 8:
                    $min = 401;
                    $max = 410;
                    break;
                default:
                    $min = 1;
                    $max = 2;
            }


            DB::table('animals')->insert([
                'title' => $faker->unique()->text(30),
                'name' => $faker->firstName,
                'age' => $faker->numberBetween(1,15),
                'price' => $faker->numberBetween(100, 600),
                'description' => $faker->text(1000),
                'animalable_type' => $faker->randomElement(['App\Shelter', 'App\User']),
                'animalable_id' => $faker->numberBetween(1,30),
                'species_id' => $animal_id,
                'color_id' => $faker->numberBetween(1,13),
                'fur_id' => $faker->numberBetween(1,4),
                'size_id' => $faker->numberBetween(1,3),
                'breed_id' =>$faker->numberBetween($min, $max),
                'breed_mix' => $faker->boolean(30),
                'animal_status_id' => $faker->numberBetween(1,3),
                'recommended' => $faker->boolean(20),
                'created_at' => $faker->dateTime,
                'created_user_id' => $faker->numberBetween(1,30),
                'edited_at' => null,
                'edited_user_id' => null,
                'deleted_at' => null,
                'deleted_user_id' => null,
            ]);

            if($animal_id == 1 && $gender_id == 1){
                $animal_dictionary_id = 1;
            }
            elseif ($animal_id == 1 && $gender_id == 2){
                $animal_dictionary_id = 2;
            }


            elseif ($animal_id == 2 && $gender_id == 1){
                $animal_dictionary_id = 3;
            }
            elseif ($animal_id == 2 && $gender_id == 2){
                $animal_dictionary_id = 4;
            }


            elseif ($animal_id == 3 && $gender_id == 1){
                $animal_dictionary_id = 5;
            }
            elseif ($animal_id == 3 && $gender_id == 2){
                $animal_dictionary_id = 6;
            }


            elseif ($animal_id == 4 && $gender_id == 1){
                $animal_dictionary_id = 7;
            }
            elseif ($animal_id == 4 && $gender_id == 2){
                $animal_dictionary_id = 8;
            }


            elseif ($animal_id == 5 && $gender_id == 1){
                $animal_dictionary_id = 9;
            }
            elseif ($animal_id == 5 && $gender_id == 2){
                $animal_dictionary_id = 10;
            }


            elseif ($animal_id == 6 && $gender_id == 1){
                $animal_dictionary_id = 11;
            }
            elseif ($animal_id == 6 && $gender_id == 2){
                $animal_dictionary_id = 12;
            }


            elseif ($animal_id == 7 && $gender_id == 1){
                $animal_dictionary_id = 13;
            }
            elseif ($animal_id == 7 && $gender_id == 2){
                $animal_dictionary_id = 14;
            }


            elseif ($animal_id == 8 && $gender_id == 1){
                $animal_dictionary_id = 15;
            }
            elseif ($animal_id == 8 && $gender_id == 2){
                $animal_dictionary_id = 16;
            }


            else{
                $animal_dictionary_id = 16;
            }


            DB::table('animal_dictionary_species')->insert([
                'animal_id' => $i,
                'animal_dictionary_id' => $animal_dictionary_id,
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
