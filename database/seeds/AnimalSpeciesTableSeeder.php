<?php

use Illuminate\Database\Seeder;

class AnimalSpeciesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker\Factory::create();

        $animals = array(
            ['name' => 'Psy', 'icon' => 'dog-solid.svg'],
            ['name' => 'Koty', 'icon' => 'cat-solid.svg'],
            ['name' => 'Świnki morskie', 'icon' => 'hippo-solid.svg'],
            ['name' => 'Króliki', 'icon' => 'otter-solid.svg'],
            ['name' => 'Chomiki', 'icon' => 'hippo-solid.svg'],
            ['name' => 'Szczury', 'icon' => 'otter-solid.svg'],
            ['name' => 'Papugi', 'icon' => 'dove-solid.svg'],
            ['name' => 'Rybki', 'icon' => 'fish-solid.svg'],
        );


        foreach ($animals as $animal){
            DB::table('animal_species')->insert([
                'name' => $animal['name'],
                'icon' => $animal['icon'],
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
