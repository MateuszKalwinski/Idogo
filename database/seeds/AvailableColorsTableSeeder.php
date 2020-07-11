<?php

use Illuminate\Database\Seeder;

class AvailableColorsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $availableColors = array(
            ['breed_id' => 1, 'color_id' => 1],
            ['breed_id' => 1, 'color_id' => 2],
            ['breed_id' => 1, 'color_id' => 3],
            ['breed_id' => 1, 'color_id' => 4],
            ['breed_id' => 1, 'color_id' => 5],
            ['breed_id' => 2, 'color_id' => 6],
            ['breed_id' => 2, 'color_id' => 7],
            ['breed_id' => 2, 'color_id' => 8],
            ['breed_id' => 2, 'color_id' => 9],
            ['breed_id' => 2, 'color_id' => 10],
        );

        foreach ($availableColors as $availableColor){
            DB::table('available_colors')->insert([
                'breed_id' => $availableColor['breed_id'],
                'color_id' => $availableColor['color_id'],
            ]);
        }
    }
}
