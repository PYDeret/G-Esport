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
                'libelle' => 'event LOL',
                'description' => '<p>special reward for the winner 1pts open :D</p>',
                'slug' => 'reward',
                'created_at' => '2018-06-25 16:45:13',
                'updated_at' => '2018-06-25 16:45:13',
            ),
        ));
        
        
    }
}