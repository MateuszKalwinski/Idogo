<?php

use Illuminate\Database\Seeder;

class AvailableFursTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $availableFurs = array(
            ['breed_id' => 1, 'fur_id' => 1],
            ['breed_id' => 1, 'fur_id' => 2],
            ['breed_id' => 1, 'fur_id' => 3],
            ['breed_id' => 1, 'fur_id' => 4],
            ['breed_id' => 2, 'fur_id' => 1],
            ['breed_id' => 2, 'fur_id' => 2],
            ['breed_id' => 2, 'fur_id' => 3],
            ['breed_id' => 2, 'fur_id' => 4],
            ['breed_id' => 3, 'fur_id' => 1],
            ['breed_id' => 3, 'fur_id' => 2],
        );

        foreach ($availableFurs as $availableFur){
            DB::table('available_furs')->insert([
                'breed_id' => $availableFur['breed_id'],
                'fur_id' => $availableFur['fur_id'],
            ]);
        }
    }
}
