<?php

use Illuminate\Database\Seeder;

class AvailableCharacteristicDictionaryTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $availableCharacteristicDictionary = array(
            ['species_id' => 1, 'characteristic_dictionary_id' => 1],
            ['species_id' => 1, 'characteristic_dictionary_id' => 2],
            ['species_id' => 1, 'characteristic_dictionary_id' => 3],
            ['species_id' => 1, 'characteristic_dictionary_id' => 4],
            ['species_id' => 1, 'characteristic_dictionary_id' => 5],
            ['species_id' => 2, 'characteristic_dictionary_id' => 6],
            ['species_id' => 2, 'characteristic_dictionary_id' => 7],
            ['species_id' => 2, 'characteristic_dictionary_id' => 8],
            ['species_id' => 2, 'characteristic_dictionary_id' => 1],
            ['species_id' => 2, 'characteristic_dictionary_id' => 2],
        );

        foreach ($availableCharacteristicDictionary as $item){
            DB::table('available_colors')->insert([
                'species_id' => $item['species_id'],
                'characteristic_dictionary_id' => $item['characteristic_dictionary_id'],
            ]);
        }
    }
}
