<?php

use Illuminate\Database\Seeder;

class ShelterApplicationStatusesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
       $shelterApplicationStatuses = [
           'Nowe zgłoszenie',
           'Weryfikacja mailowa',
           'Weryfikacja telefoniczna',
           'Weryfikacja osobista',
           'Zweryfikowano pozytywnie',
           'Zweryfikowano negatywnie',
           'Dodano',
           'Odrzucono'
       ];

        /* Lecture 10 */
        foreach ($shelterApplicationStatuses as $applicationStatus)
        {

            DB::table('shelter_application_statuses')->insert([

                'name' => $applicationStatus

            ]);
        }
    }
}
