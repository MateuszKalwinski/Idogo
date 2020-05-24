<?php

use Illuminate\Database\Seeder;

class DaysDictionaryTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //days_dictionary

        $faker = Faker\Factory::create();

        $days = array(
            'poniedziałek',
            'wtorek',
            'środa',
            'czwartek',
            'piątek',
            'sobota',
            'niedziela'
        );

        foreach ($days as $day){
            DB::table('days_dictionary')->insert([
                'name' => $day,
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
