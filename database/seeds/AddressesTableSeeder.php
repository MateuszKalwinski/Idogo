<?php


use Illuminate\Database\Seeder;

class AddressesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $faker = Faker\Factory::create();


        for ($i = 1; $i <= 20; $i++)
        {

            DB::table('addresses')->insert([
                'addressable_type' => 'App\Shelter',
                'addressable_id' => $faker->numberBetween(1, 30),
                'city_id' => $faker->numberBetween(1,918),
                'number' => $faker->numberBetween(1,200),
                'street' => $faker->streetName,
                'lon' => $faker->randomFloat(5, 0,85),
                'lat' => $faker->randomFloat(5, 0, 180),
                'created_at' => $faker->dateTime,
                'created_user_id' => $faker->numberBetween(1,30),
                'edited_at' => null,
                'edited_user_id' => null,
                'deleted_at' => null,
                'deleted_user_id' => null
            ]);
        }

        for ($i = 1; $i <= 300; $i++)
        {

            DB::table('addresses')->insert([
                'addressable_type' => 'App\Animal',
                'addressable_id' => $i,
                'city_id' => $faker->numberBetween(1,918),
                'number' => $faker->numberBetween(1,200),
                'street' => $faker->streetName,
                'lon' => $faker->randomFloat(5, 0,85),
                'lat' => $faker->randomFloat(5, 0, 180),
                'created_at' => $faker->dateTime,
                'created_user_id' => $faker->numberBetween(1,30),
                'edited_at' => null,
                'edited_user_id' => null,
                'deleted_at' => null,
                'deleted_user_id' => null
            ]);
        }
    }
}
