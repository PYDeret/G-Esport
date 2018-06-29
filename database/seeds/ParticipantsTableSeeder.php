<?php

use Illuminate\Database\Seeder;

class ParticipantsTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('participants')->delete();
        
        \DB::table('participants')->insert(array (
            0 => 
            array (
                'id' => 1,
                'libelle' => 'Paul N',
                'description' => '<p>Je suis un admin qui test&nbsp;</p>',
                'slug' => 'participant_paul',
                'created_at' => '2018-06-25 16:47:11',
                'updated_at' => '2018-06-25 16:47:11',
            ),
        ));
        
        
    }
}