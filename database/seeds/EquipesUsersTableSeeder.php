<?php

use Illuminate\Database\Seeder;

class EquipesUsersTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('equipes_users')->delete();
        
        \DB::table('equipes_users')->insert(array (
            0 => 
            array (
                'id' => 1,
                'equipe_id' => 1,
                'user_id' => 1,
            ),
            1 => 
            array (
                'id' => 2,
                'equipe_id' => 2,
                'user_id' => 2,
            ),
            2 => 
            array (
                'id' => 3,
                'equipe_id' => 1,
                'user_id' => 3,
            ),
            3 => 
            array (
                'id' => 4,
                'equipe_id' => 2,
                'user_id' => 4,
            ),
        ));
        
        
    }
}