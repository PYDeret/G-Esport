<?php

use Illuminate\Database\Seeder;

class EtapeTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('etape')->delete();
        
        \DB::table('etape')->insert(array (
            0 => 
            array (
                'id' => 1,
                'name' => "Premier tour",
            ),
            1 => 
            array (
                'id' => 2,
                'name' => "Deuxième tour",
            ),
            2 => 
            array (
                'id' => 3,
                'name' => "Troisième tour",
            ),
            3 => 
            array (
                'id' => 4,
                'name' => "Finale",
            )
        ));
        
    }
}