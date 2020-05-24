<?php

use Illuminate\Database\Seeder;

class SheltersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker\Factory::create();

        for ($i = 1; $i <= 30; $i++)
        {

            DB::table('shelters')->insert([

                'name' => $faker->unique()->word,
                'description' => $faker->text(1000),
                'adoption_policy' => $faker->text(1000),
                'nip' => $faker->randomNumber(),
                'regon' => $faker->randomNumber(),
                'krs' => null,
                'user_id' => $faker->numberBetween(1,30),
                'promoted' => $faker->boolean(50),
                'recommended' => $faker->boolean(50),
                'created_at' => $faker->dateTime,
                'edited_at' => null,
                'edited_user_id' => null,
                'deleted_at' => null,
                'deleted_user_id' => null,
            ]);
        }
    }
}
