<?php

use Illuminate\Database\Seeder;

class GlobalArticlesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker\Factory::create();

        for ($i = 1; $i <= 10; $i++) {

            DB::table('global_articles')->insert([
                'title' => $faker->text(20),
                'content' => $faker->text(1000),
                'user_id' =>1,
                'created_at' => $faker->dateTime,
                'edited_at' => null,
                'edited_user_id' => null,
                'deleted_at' => null,
                'deleted_user_id' => null,
            ]);
        }
    }
}
