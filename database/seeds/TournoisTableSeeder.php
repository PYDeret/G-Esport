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
                'description' => '<p>Ceci est le tournoi du grand gourou Cyrille Grandval</p>',
                'image' => 'tournois/June2018/jkthXrBsKVhbrYeij49j.jpg',
                'DateDebut' => '2018-06-19',
                'DateFin' => '2018-06-19',
                'HeureDebut' => '12:00:00',
                'HeureFin' => '22:00:00',
                'slug' => 'grandvaltournament',
                'ResultatId' => 1,
                'JeuId' => 1,
                'EquipeWin_id' => null,
                'created_at' => '2018-06-19 14:59:47',
                'updated_at' => '2018-06-19 14:59:47',
            ),
            1 => 
            array (
                'id' => 2,
                'libelle' => 'Tournoi Fortnite pour montrer qui est le plus fort',
                'description' => '<p>Ce tournoi comporte la team twitch contre la team ESGI</p>',
                'image' => 'tournois/July2018/DYRdvTkq2H3cmhhJC7Pf.jpeg',
                'DateDebut' => '2018-07-04',
                'DateFin' => '2018-07-06',
                'HeureDebut' => '12:00:00',
                'HeureFin' => '12:00:00',
                'slug' => 'tournoi-fortnite-1',
                'ResultatId' => 1,
                'JeuId' => 2,
                'EquipeWin_id' => null,
                'created_at' => '2018-07-07 13:45:00',
                'updated_at' => '2018-07-07 13:47:51',
            ),
            2 => 
            array (
                'id' => 3,
                'libelle' => 'Tournoi projet annuel',
                'description' => '<p>Random slug pour passe le PA bien sûr</p>',
                'image' => 'tournois/July2018/RkIacdv1ct3BX1YuRZjM.jpg',
                'DateDebut' => '2018-07-07',
                'DateFin' => '2018-07-07',
                'HeureDebut' => '12:00:00',
                'HeureFin' => '13:00:00',
                'slug' => 'tournoi-pa',
                'ResultatId' => 1,
                'JeuId' => 1,
                'EquipeWin_id' => null,
                'created_at' => '2018-07-07 14:28:10',
                'updated_at' => '2018-07-07 14:28:10',
            ),
            3 => 
            array (
                'id' => 4,
                'libelle' => 'Tournoi Vacances',
                'description' => '<p>Voici le premier tournoi des vacances !</p>',
                'image' => 'tournois/July2018/KPvptcdzQ1Ln4PhcqWDD.jpg',
                'DateDebut' => '2018-07-12',
                'DateFin' => '2018-07-15',
                'HeureDebut' => '12:00:00',
                'HeureFin' => '12:00:00',
                'slug' => 'tournoi-vacances',
                'ResultatId' => 1,
                'JeuId' => 2,
                'EquipeWin_id' => null,
                'created_at' => '2018-07-07 14:29:20',
                'updated_at' => '2018-07-07 14:29:20',
            ),
        ));
        
        
    }
}