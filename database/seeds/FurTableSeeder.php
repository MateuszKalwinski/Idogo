<?php

use Illuminate\Database\Seeder;

class FurTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker\Factory::create();

        $fur_types = ['łysy', 'krótka', 'średnia', 'długa'];

        foreach ($fur_types as $fur_type){
            DB::table('fur')->insert([
                'name' => $fur_type,
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
