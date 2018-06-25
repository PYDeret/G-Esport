<?php

use Illuminate\Database\Seeder;

class TournoisTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('tournois')->delete();
        
        \DB::table('tournois')->insert(array (
            0 => 
            array (
                'id' => 1,
                'libelle' => 'Grandval tournament',
                'description' => '<p>Ceci est le tournoi du grand gourou Grandval</p>',
                'image' => 'tournois/June2018/jkthXrBsKVhbrYeij49j.jpg',
                'DateDebut' => '2018-06-19 00:00:00',
                'DateFin' => '2018-06-19 00:00:00',
                'HeureDebut' => '12:00:00',
                'HeureFin' => '22:00:00',
                'slug' => 'grandvaltournament',
                'ResultatId' => 1,
                'created_at' => '2018-06-19 14:59:47',
                'updated_at' => '2018-06-19 14:59:47',
            ),
        ));
        
        
    }
}