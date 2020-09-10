<?php

use Illuminate\Database\Seeder;

class RegulationsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $regulations = array(
            [
                'version' => 'wersja 2.0',
                'content' => '<p>Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis
                                egestas. Vestibulum tortor quam, feugiat vitae, ultricies eget, tempor sit amet, ante.
                                Donec eu libero sit amet quam egestas semper. Aenean ultricies mi vitae est. Mauris
                                placerat eleifend leo. Quisque sit amet est et sapien ullamcorper pharetra. Vestibulum
                                erat wisi, condimentum sed, commodo vitae, ornare sit amet, wisi. Aenean fermentum,
                                elit eget tincidunt condimentum, eros ipsum rutrum orci, sagittis tempus lacus enim ac
                                dui. Donec non enim in turpis pulvinar facilisis. Ut felis. Praesent dapibus, neque id
                                cursus faucibus, tortor neque egestas augue, eu vulputate magna eros eu erat. Aliquam erat
                                volutpat. Nam dui mi, tincidunt quis, accumsan porttitor, facilisis luctus, metus
                                </p>
                                <ul>
                                   <li>Lorem ipsum dolor sit amet, consectetuer adipiscing elit.</li>
                                   <li>Aliquam tincidunt mauris eu risus.</li>
                                   <li>Vestibulum auctor dapibus neque.</li>
                                </ul>
                                <p>Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis
                                 egestas. Vestibulum tortor quam, feugiat vitae, ultricies eget, tempor sit amet, ante.
                                 Donec eu libero sit amet quam egestas semper. Aenean ultricies mi vitae est. Mauris
                                  placerat eleifend leo.
                                 </p>
                                 <p>WERSJA REGULAMIN 2.0</p>',
                'active' => true,
            ],
            [
                'version' => 'wersja 1.0',
                'content' => '<p>Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis
                                egestas. Vestibulum tortor quam, feugiat vitae, ultricies eget, tempor sit amet, ante.
                                Donec eu libero sit amet quam egestas semper. Aenean ultricies mi vitae est. Mauris
                                placerat eleifend leo. Quisque sit amet est et sapien ullamcorper pharetra. Vestibulum
                                erat wisi, condimentum sed, commodo vitae, ornare sit amet, wisi. Aenean fermentum,
                                elit eget tincidunt condimentum, eros ipsum rutrum orci, sagittis tempus lacus enim ac
                                dui. Donec non enim in turpis pulvinar facilisis. Ut felis. Praesent dapibus, neque id
                                cursus faucibus, tortor neque egestas augue, eu vulputate magna eros eu erat. Aliquam erat
                                volutpat. Nam dui mi, tincidunt quis, accumsan porttitor, facilisis luctus, metus
                                </p>
                                <ul>
                                   <li>Lorem ipsum dolor sit amet, consectetuer adipiscing elit.</li>
                                   <li>Aliquam tincidunt mauris eu risus.</li>
                                   <li>Vestibulum auctor dapibus neque.</li>
                                </ul>
                                <p>Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis
                                 egestas. Vestibulum tortor quam, feugiat vitae, ultricies eget, tempor sit amet, ante.
                                 Donec eu libero sit amet quam egestas semper. Aenean ultricies mi vitae est. Mauris
                                  placerat eleifend leo.
                                 </p>

                                 <p>WERSJA REGULAMIN 1.0</p>',
                'active' => false,
            ],
        );

        foreach ($regulations as $regulation) {
            DB::table('regulations')->insert([
                'version' => $regulation['version'],
                'content' => $regulation['content'],
                'active' => $regulation['active'],
            ]);
        }
    }
}
