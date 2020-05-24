<?php

use Illuminate\Database\Seeder;

class OpenHoursTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {




        $faker = Faker\Factory::create();

        $open_hours = [

            /*
             * SCHRONISKO 1
             * */
            [
                'day_id' => 1,
                'object_id' => 1,
                'open_time' => '08:00',
                'close_time' => '16:00',
                'closed' => false,
            ],

            [
                'day_id' => 2,
                'object_id' => 1,
                'open_time' => '08:00',
                'close_time' => '16:00',
                'closed' => false,
            ],

            [
                'day_id' => 3,
                'object_id' => 1,
                'open_time' => '08:00',
                'close_time' => '16:00',
                'closed' => false,
            ],

            [
                'day_id' => 4,
                'object_id' => 1,
                'open_time' => '08:00',
                'close_time' => '16:00',
                'closed' => false,
            ],

            [
                'day_id' => 5,
                'object_id' => 1,
                'open_time' => '08:00',
                'close_time' => '16:00',
                'closed' => false,
            ],

            [
                'day_id' => 7,
                'object_id' => 1,
                'open_time' => '08:00',
                'close_time' => '16:00',
                'closed' => false,
            ],

            [
                'day_id' => 7,
                'object_id' => 1,
                'open_time' => null,
                'close_time' => null,
                'closed' => true,
            ],

            /*
             * SCHRONISKO 2
             * */
            [
                'day_id' => 1,
                'object_id' => 2,
                'open_time' => '08:00',
                'close_time' => '16:00',
                'closed' => false,
            ],

            [
                'day_id' => 2,
                'object_id' => 2,
                'open_time' => '08:00',
                'close_time' => '16:00',
                'closed' => false,
            ],

            [
                'day_id' => 3,
                'object_id' => 2,
                'open_time' => '08:00',
                'close_time' => '16:00',
                'closed' => false,
            ],

            [
                'day_id' => 4,
                'object_id' => 2,
                'open_time' => '08:00',
                'close_time' => '16:00',
                'closed' => false,
            ],

            [
                'day_id' => 5,
                'object_id' => 2,
                'open_time' => '08:00',
                'close_time' => '16:00',
                'closed' => false,
            ],

            [
                'day_id' => 7,
                'object_id' => 2,
                'open_time' => '08:00',
                'close_time' => '16:00',
                'closed' => false,
            ],

            [
                'day_id' => 7,
                'object_id' => 2,
                'open_time' => null,
                'close_time' => null,
                'closed' => true,
            ],

            /*
             * SCHRONISKO 3
             * */
            [
                'day_id' => 1,
                'object_id' => 3,
                'open_time' => '08:00',
                'close_time' => '16:00',
                'closed' => false,
            ],

            [
                'day_id' => 2,
                'object_id' => 3,
                'open_time' => '08:00',
                'close_time' => '16:00',
                'closed' => false,
            ],

            [
                'day_id' => 3,
                'object_id' => 3,
                'open_time' => '08:00',
                'close_time' => '16:00',
                'closed' => false,
            ],

            [
                'day_id' => 4,
                'object_id' => 3,
                'open_time' => '08:00',
                'close_time' => '16:00',
                'closed' => false,
            ],

            [
                'day_id' => 5,
                'object_id' => 3,
                'open_time' => '08:00',
                'close_time' => '16:00',
                'closed' => false,
            ],

            [
                'day_id' => 7,
                'object_id' => 3,
                'open_time' => '08:00',
                'close_time' => '16:00',
                'closed' => false,
            ],

            [
                'day_id' => 7,
                'object_id' => 3,
                'open_time' => null,
                'close_time' => null,
                'closed' => true,
            ],

            /*
             * SCHRONISKO 4
             * */
            [
                'day_id' => 1,
                'object_id' => 4,
                'open_time' => '08:00',
                'close_time' => '16:00',
                'closed' => false,
            ],

            [
                'day_id' => 2,
                'object_id' => 4,
                'open_time' => '08:00',
                'close_time' => '16:00',
                'closed' => false,
            ],

            [
                'day_id' => 3,
                'object_id' => 4,
                'open_time' => '08:00',
                'close_time' => '16:00',
                'closed' => false,
            ],

            [
                'day_id' => 4,
                'object_id' => 4,
                'open_time' => '08:00',
                'close_time' => '16:00',
                'closed' => false,
            ],

            [
                'day_id' => 5,
                'object_id' => 4,
                'open_time' => '08:00',
                'close_time' => '16:00',
                'closed' => false,
            ],

            [
                'day_id' => 7,
                'object_id' => 4,
                'open_time' => '08:00',
                'close_time' => '16:00',
                'closed' => false,
            ],

            [
                'day_id' => 7,
                'object_id' => 4,
                'open_time' => null,
                'close_time' => null,
                'closed' => true,
            ],

            /*
             * SCHRONISKO 5
             * */
            [
                'day_id' => 1,
                'object_id' => 5,
                'open_time' => '08:00',
                'close_time' => '16:00',
                'closed' => false,
            ],

            [
                'day_id' => 2,
                'object_id' => 5,
                'open_time' => '08:00',
                'close_time' => '16:00',
                'closed' => false,
            ],

            [
                'day_id' => 3,
                'object_id' => 5,
                'open_time' => '08:00',
                'close_time' => '16:00',
                'closed' => false,
            ],

            [
                'day_id' => 4,
                'object_id' => 5,
                'open_time' => '08:00',
                'close_time' => '16:00',
                'closed' => false,
            ],

            [
                'day_id' => 5,
                'object_id' => 5,
                'open_time' => '08:00',
                'close_time' => '16:00',
                'closed' => false,
            ],

            [
                'day_id' => 7,
                'object_id' => 5,
                'open_time' => '08:00',
                'close_time' => '16:00',
                'closed' => false,
            ],

            [
                'day_id' => 7,
                'object_id' => 5,
                'open_time' => null,
                'close_time' => null,
                'closed' => true,
            ],

            /*
             * SCHRONISKO 6
             * */
            [
                'day_id' => 1,
                'object_id' => 6,
                'open_time' => '08:00',
                'close_time' => '16:00',
                'closed' => false,
            ],

            [
                'day_id' => 2,
                'object_id' => 6,
                'open_time' => '08:00',
                'close_time' => '16:00',
                'closed' => false,
            ],

            [
                'day_id' => 3,
                'object_id' => 6,
                'open_time' => '08:00',
                'close_time' => '16:00',
                'closed' => false,
            ],

            [
                'day_id' => 4,
                'object_id' => 6,
                'open_time' => '08:00',
                'close_time' => '16:00',
                'closed' => false,
            ],

            [
                'day_id' => 5,
                'object_id' => 6,
                'open_time' => '08:00',
                'close_time' => '16:00',
                'closed' => false,
            ],

            [
                'day_id' => 7,
                'object_id' => 6,
                'open_time' => '08:00',
                'close_time' => '16:00',
                'closed' => false,
            ],

            [
                'day_id' => 7,
                'object_id' => 6,
                'open_time' => null,
                'close_time' => null,
                'closed' => true,
            ],

            /*
             * SCHRONISKO 7
             * */
            [
                'day_id' => 1,
                'object_id' => 7,
                'open_time' => '08:00',
                'close_time' => '16:00',
                'closed' => false,
            ],

            [
                'day_id' => 2,
                'object_id' => 7,
                'open_time' => '08:00',
                'close_time' => '16:00',
                'closed' => false,
            ],

            [
                'day_id' => 3,
                'object_id' => 7,
                'open_time' => '08:00',
                'close_time' => '16:00',
                'closed' => false,
            ],

            [
                'day_id' => 4,
                'object_id' => 7,
                'open_time' => '08:00',
                'close_time' => '16:00',
                'closed' => false,
            ],

            [
                'day_id' => 5,
                'object_id' => 7,
                'open_time' => '08:00',
                'close_time' => '16:00',
                'closed' => false,
            ],

            [
                'day_id' => 7,
                'object_id' => 7,
                'open_time' => '08:00',
                'close_time' => '16:00',
                'closed' => false,
            ],

            [
                'day_id' => 7,
                'object_id' => 7,
                'open_time' => null,
                'close_time' => null,
                'closed' => true,
            ],

            /*
             * SCHRONISKO 8
             * */
            [
                'day_id' => 1,
                'object_id' => 8,
                'open_time' => '08:00',
                'close_time' => '16:00',
                'closed' => false,
            ],

            [
                'day_id' => 2,
                'object_id' => 8,
                'open_time' => '08:00',
                'close_time' => '16:00',
                'closed' => false,
            ],

            [
                'day_id' => 3,
                'object_id' => 8,
                'open_time' => '08:00',
                'close_time' => '16:00',
                'closed' => false,
            ],

            [
                'day_id' => 4,
                'object_id' => 8,
                'open_time' => '08:00',
                'close_time' => '16:00',
                'closed' => false,
            ],

            [
                'day_id' => 5,
                'object_id' => 8,
                'open_time' => '08:00',
                'close_time' => '16:00',
                'closed' => false,
            ],

            [
                'day_id' => 7,
                'object_id' => 8,
                'open_time' => '08:00',
                'close_time' => '16:00',
                'closed' => false,
            ],

            [
                'day_id' => 7,
                'object_id' => 8,
                'open_time' => null,
                'close_time' => null,
                'closed' => true,
            ],

            /*
             * SCHRONISKO 9
             * */
            [
                'day_id' => 1,
                'object_id' => 9,
                'open_time' => '08:00',
                'close_time' => '16:00',
                'closed' => false,
            ],

            [
                'day_id' => 2,
                'object_id' => 9,
                'open_time' => '08:00',
                'close_time' => '16:00',
                'closed' => false,
            ],

            [
                'day_id' => 3,
                'object_id' => 9,
                'open_time' => '08:00',
                'close_time' => '16:00',
                'closed' => false,
            ],

            [
                'day_id' => 4,
                'object_id' => 9,
                'open_time' => '08:00',
                'close_time' => '16:00',
                'closed' => false,
            ],

            [
                'day_id' => 5,
                'object_id' => 9,
                'open_time' => '08:00',
                'close_time' => '16:00',
                'closed' => false,
            ],

            [
                'day_id' => 7,
                'object_id' => 9,
                'open_time' => '08:00',
                'close_time' => '16:00',
                'closed' => false,
            ],

            [
                'day_id' => 7,
                'object_id' => 9,
                'open_time' => null,
                'close_time' => null,
                'closed' => true,
            ],

            /*
             * SCHRONISKO 10
             * */
            [
                'day_id' => 1,
                'object_id' => 10,
                'open_time' => '08:00',
                'close_time' => '16:00',
                'closed' => false,
            ],

            [
                'day_id' => 2,
                'object_id' => 10,
                'open_time' => '08:00',
                'close_time' => '16:00',
                'closed' => false,
            ],

            [
                'day_id' => 3,
                'object_id' => 10,
                'open_time' => '08:00',
                'close_time' => '16:00',
                'closed' => false,
            ],

            [
                'day_id' => 4,
                'object_id' => 10,
                'open_time' => '08:00',
                'close_time' => '16:00',
                'closed' => false,
            ],

            [
                'day_id' => 5,
                'object_id' => 10,
                'open_time' => '08:00',
                'close_time' => '16:00',
                'closed' => false,
            ],

            [
                'day_id' => 7,
                'object_id' => 10,
                'open_time' => '08:00',
                'close_time' => '16:00',
                'closed' => false,
            ],

            [
                'day_id' => 7,
                'object_id' => 10,
                'open_time' => null,
                'close_time' => null,
                'closed' => true,
            ],
        ];

        foreach ($open_hours as $open_hour){
            DB::table('open_hours')->insert([
                'day_id' => $open_hour['day_id'],
                'openhoursable_type' => 'App\Shelter',
                'openhoursable_id' => $open_hour['object_id'],
                'open_time' => $open_hour['open_time'],
                'close_time' => $open_hour['close_time'],
                'closed' => $open_hour['closed'],
                'created_at' => $faker->dateTime,
                'created_user_id' => $faker->numberBetween(1,30),
                'edited_at' => null,
                'edited_user_id' => null,
                'deleted_at' => null,
                'deleted_user_id' => null,
            ]);
        }
    }
}
