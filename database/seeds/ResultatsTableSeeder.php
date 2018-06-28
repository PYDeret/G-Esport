<?php

use Illuminate\Database\Seeder;

class ResultatsTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('resultats')->delete();
        
        \DB::table('resultats')->insert(array (
            0 => 
            array (
                'id' => 1,
                'libelle' => 'test result',
                'description' => '<p>ceci est un test&nbsp;</p>',
                'slug' => 'test-result',
                'created_at' => '2018-06-25 09:53:09',
                'updated_at' => '2018-06-25 09:53:09',
            ),
        ));
        
        
    }
}