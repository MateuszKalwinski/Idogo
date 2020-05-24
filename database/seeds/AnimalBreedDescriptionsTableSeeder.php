<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;

class AnimalBreedDescriptionsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker\Factory::create();

        for ($i=1; $i<=150 ;$i++ ){
            $text = null;
            $dateTime = Carbon::now('Europe/Warsaw');
            for ($k=0 ;$k<9; $k++ ) {
                $createList = $faker->boolean(50);
                $list = '';

                if ($createList === true) {
                    $list = '<ul>';
                    for ($j = 0; $j <= $faker->numberBetween(1, 4); $j++) {
                        $list .= '<li>' . $faker->word . '</li>';
                    }
                    $list .= '</ul>';

                }

                $text = '<p>' . $faker->text(650) . '</p>' . $list;

            }

            DB::table('animal_breed_descriptions')->insert([
                'breed_id' => $i,
                'nature' => $text,
                'skill' => $text,
                'raising' => $text,
                'perfect_owner' => $text,
                'health' => $text,
                'diet' => $text,
                'care' => $text,
                'history' => $text,
                'fact' => $text,
                'created_at' => $dateTime,
                'created_user_id' => 1,
                'edited_at' => null,
                'edited_user_id' => null,
                'deleted_at' => null,
                'deleted_user_id' => null,
            ]);
        }
    }
}
