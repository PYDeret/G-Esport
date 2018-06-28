<?php

use Illuminate\Database\Seeder;

class JeusTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('jeus')->delete();
        
        \DB::table('jeus')->insert(array (
            0 => 
            array (
                'id' => 1,
                'libelle' => 'LOL',
                'description' => '<p>league of legend test</p>',
                'slug' => 'leagueoflegend',
                'TypeJeuId' => 1,
                'created_at' => '2018-06-25 16:44:11',
                'updated_at' => '2018-06-25 16:44:11',
            ),
        ));
        
        
    }
}