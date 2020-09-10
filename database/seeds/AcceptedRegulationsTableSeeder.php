<?php

use Illuminate\Database\Seeder;

class AcceptedRegulationsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker\Factory::create();

        for ($i = 1; $i <= 40; $i++) {

            DB::table('accepted_regulations')->insert([
                'acceptedregulationable_type' => $faker->randomElement($array = array('App\User', 'App\ShelterApplication')),
                'acceptedregulationable_id' => $faker->numberBetween(1, 30),
                'regulation_id' => $faker->numberBetween(1, 2),
            ]);
        }
    }
}
