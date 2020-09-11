<?php

use Illuminate\Database\Seeder;

class ViolationReportsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker\Factory::create();

        for($i=1;$i<=10;$i++)
        {
            DB::table('violation_reports')->insert([
                'violationable_type' => $faker->randomElement(['App\Animal', 'App\Shelter']),
                'violationable_id' => $faker->numberBetween(1,30),
                'report_violation_reason' => 'Ogłoszenie nieaktualne',
                'report_violation_text' => $faker->text(1000),
                'user_id' => null,
                'ip_address' => $faker->ipv4
            ]);
        }
    }
}
