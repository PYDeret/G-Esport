<?php

use Illuminate\Database\Seeder;

class RecompensesTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('recompenses')->delete();
        
        \DB::table('recompenses')->insert(array (
            0 => 
            array (
                'id' => 1,
                'libelle' => 'Tournoi LOL Numéro 2028',
                'description' => 'Tu gagnes 10 points OPEN, va prévenir Félicité !',
                'slug' => 'reward',
                'created_at' => '2018-06-25 16:45:13',
                'updated_at' => '2018-06-25 16:45:13',
            ),
        ));
        
        
    }
}