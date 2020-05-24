<?php

use Illuminate\Database\Seeder;

class AnimalStatusTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker\Factory::create();

        $sizes = ['Szuka domu', 'Zaadoptowany', 'Odszedł za tęczowy most'];

        foreach ($sizes as $size){
            DB::table('animal_status')->insert([
                'name' => $size,
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
