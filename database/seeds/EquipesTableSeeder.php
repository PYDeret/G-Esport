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
                'libelle' => 'Équipe Paul',
                'description' => 'L\'équipe de Paul pour jouer à LOL bien sur',
                'slug' => 'equipe-paul',
                'userId' => 1,
                'created_at' => '2018-06-19 15:05:20',
                'updated_at' => '2018-06-19 15:05:20',
            ),
        ));

        \DB::table('equipes')->insert(array (
            0 => 
            array (
                'id' => 2,
                'libelle' => 'Équipe PY',
                'description' => 'L\'équipe de PY pour jouer à Fortnite bien sur',
                'slug' => 'equipe-py',
                'userId' => 2,
                'created_at' => '2018-06-19 15:05:20',
                'updated_at' => '2018-06-19 15:05:20',
            ),
        ));
        
        
    }
}