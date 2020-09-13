<?php


use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

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
                'remember_token' => Str::random(10),
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
            'remember_token' => Str::random(10),
            'created_at' => $faker->dateTime,
            'edited_ad' => null,
            'deleted_ad' => null,
        ]);
    }
}
