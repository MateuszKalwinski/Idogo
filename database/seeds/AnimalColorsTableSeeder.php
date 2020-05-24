<?php

use Illuminate\Database\Seeder;

class AnimalColorsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $faker = Faker\Factory::create();

        $colors = array(
            ['name' => 'brązowy', 'class_name' => 'color-animal-brown'],
            ['name' => 'biały', 'class_name' => 'color-animal-white'],
            ['name' => 'czarny', 'class_name' => 'color-animal-black'],
            ['name' => 'rudy', 'class_name' => 'color-animal-rude'],
            ['name' => 'szary', 'class_name' => 'color-animal-grey'],
            ['name' => 'czerwony', 'class_name' => 'color-animal-red'],
            ['name' => 'czarno-biały', 'class_name' => 'color-animal-black-white'],
            ['name' => 'brązowo-biały', 'class_name' => 'color-animal-brown-white'],
            ['name' => 'szaro-biały', 'class_name' => 'color-animal-grey-white'],
            ['name' => 'rudo-biały', 'class_name' => 'color-animal-red-white'],
            ['name' => 'czarno-brązowy', 'class_name' => 'color-animal-black-brown'],
            ['name' => 'czarno-rudy', 'class_name' => 'color-animal-black-red'],
            ['name' => 'czarno-szary', 'class_name' => 'color-animal-black-grey'],
        );

        foreach ($colors as $color){
            DB::table('animal_colors')->insert([
                'name' => $color['name'],
                'class_name' => $color['class_name'],
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
