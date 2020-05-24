<?php

use Illuminate\Database\Seeder;

class CharacteristicDictionaryTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker\Factory::create();

        $characters_dictionary = [
            'Sterylizacja/Kastracja',
            'Szczepienia',
            'Przyjazny dzieciom',
            'Szkolony',
            'Uwielbia zabawę',
            'Uwielbia spacery',
            'Akceptuje psy',
            'Akceptuje koty',
        ];

        foreach ($characters_dictionary as $characters){
            DB::table('characteristic_dictionary')->insert([
                'name' => $characters,
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
