<?php


use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $faker = Faker\Factory::create();
        //$faker = Faker\Factory::create('pl_PL');

        for($i=1;$i<=30;$i++)
        {
            DB::table('users')->insert([
                'name' => $faker->firstName,
                'surname' => $faker->lastName,
                'email' => $faker->email,
                'password' => bcrypt('passw'),
                'created_at' => $faker->dateTime,
                'edited_ad' => null,
                'deleted_ad' => null,
            ]);
        }

        DB::table('users')->insert([
            'name' => 'Mateusz',
            'surname' => 'Kalwinski',
            'email' => 'Mateucz27@gmail.com',
            'password' => bcrypt('kalwinski'),
            'created_at' => $faker->dateTime,
            'edited_ad' => null,
            'deleted_ad' => null,
        ]);
    }
}
