<?php

use Illuminate\Database\Seeder;

class AnimalSizesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $faker = Faker\Factory::create();

        $sizes = ['mały', 'średni', 'duży'];

        foreach ($sizes as $size){
            DB::table('animal_sizes')->insert([
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
