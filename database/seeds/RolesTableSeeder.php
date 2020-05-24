<?php


use Illuminate\Database\Seeder;

class RolesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        /* Lecture 11 */
        $faker = Faker\Factory::create();

        /* Lecture 11 */
        for ($i = 1; $i <= 3; $i++) {

            DB::table('roles')->insert([
                'name' => $faker->unique()->randomElement($array = array ('user','shelter','admin'))
            ]);
        }
    }
}