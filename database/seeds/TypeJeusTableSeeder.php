<?php

use Illuminate\Database\Seeder;

class TypeJeusTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('type_jeus')->delete();
        
        \DB::table('type_jeus')->insert(array (
            0 => 
            array (
                'id' => 1,
                'libelle' => 'MOBA',
                'description' => '<p>test pour type de jeu</p>',
                'slug' => 'moba',
                'created_at' => '2018-06-25 16:43:29',
                'updated_at' => '2018-06-25 16:43:29',
            ),
        ));
        
        
    }
}