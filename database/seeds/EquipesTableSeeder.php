<?php

use Illuminate\Database\Seeder;

class EquipesTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('equipes')->delete();
        
        \DB::table('equipes')->insert(array (
            0 => 
            array (
                'id' => 1,
                'libelle' => 'Equipe Paul',
                'description' => '<p>Test &eacute;quipe Paul</p>',
                'slug' => 'equipe-paul',
                'ParticipantId' => 1,
                'created_at' => '2018-06-19 15:05:20',
                'updated_at' => '2018-06-19 15:05:20',
            ),
        ));
        
        
    }
}