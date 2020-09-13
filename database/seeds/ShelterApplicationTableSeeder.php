<?php

use Illuminate\Database\Seeder;

class ShelterApplicationTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker\Factory::create();

        for($i=1;$i<=10;$i++)
        {
            DB::table('shelter_application')->insert([
                'name' => $faker->firstName,
                'surname' => $faker->lastName,
                'email' => $faker->email,
                'phone' => $faker->phoneNumber,
                'shelter_name' => $faker->unique()->word,
                'street' => $faker->streetAddress,
                'city' => $faker->city,
                'zip_code' => $faker->postcode,
                'nip' => $faker->randomNumber(),
                'regon' => $faker->randomNumber(),
                'krs' => null,
                'shelter_application_status_id' => 1,
                'confirmed_email' => false,
                'created_at' => $faker->dateTime,
                'edited_at' => null,
                'edited_user_id' => null,
                'deleted_at' => null,
                'deleted_user_id' => null
            ]);
        }
    }
}
