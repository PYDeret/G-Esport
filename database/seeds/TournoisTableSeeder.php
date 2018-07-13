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
                'DateDebut' => '2018-06-19',
                'DateFin' => '2018-06-19',
                'HeureDebut' => '12:00:00',
                'HeureFin' => '22:00:00',
                'slug' => 'grandvaltournament',
                'ResultatId' => 1,
                'JeuId' => 1,
                'EquipeWin_id' => 1,
                'created_at' => '2018-06-19 14:59:47',
                'updated_at' => '2018-06-19 14:59:47',
            ),
            1 => 
            array (
                'id' => 2,
                'libelle' => 'France-Belgique',
                'description' => '<p>Ce tournoi c la rapta , thauvin vs de bruyne</p>',
                'image' => 'tournois/July2018/VQZrt3SSQBFDW0DGOo7x.jpg',
                'DateDebut' => '2018-07-04',
                'DateFin' => '2018-07-06',
                'HeureDebut' => '12:00:00',
                'HeureFin' => '12:00:00',
                'slug' => 'francebel',
                'ResultatId' => 1,
                'JeuId' => 2,
                'EquipeWin_id' => 1,
                'created_at' => '2018-07-07 13:45:00',
                'updated_at' => '2018-07-07 13:47:51',
            ),
            2 => 
            array (
                'id' => 3,
                'libelle' => 'test',
                'description' => '<p>ntm</p>',
                'image' => 'tournois/July2018/ZoNJSAddthEdZhGxiXt1.jpg',
                'DateDebut' => '2018-07-07',
                'DateFin' => '2018-07-07',
                'HeureDebut' => '12:00:00',
                'HeureFin' => '13:00:00',
                'slug' => 'testtest',
                'ResultatId' => 1,
                'JeuId' => 1,
                'EquipeWin_id' => 1,
                'created_at' => '2018-07-07 14:28:10',
                'updated_at' => '2018-07-07 14:28:10',
            ),
            3 => 
            array (
                'id' => 4,
                'libelle' => 'thauvin',
                'description' => '<p>test thauvin pu la merde</p>',
                'image' => 'tournois/July2018/GkKxlkH4oY0nv2kYFkbT.jpg',
                'DateDebut' => '2018-07-12',
                'DateFin' => '2018-07-15',
                'HeureDebut' => '12:00:00',
                'HeureFin' => '12:00:00',
                'slug' => 'thauvin',
                'ResultatId' => 1,
                'JeuId' => 2,
                'EquipeWin_id' => 1,
                'created_at' => '2018-07-07 14:29:20',
                'updated_at' => '2018-07-07 14:29:20',
            ),
        ));
        
        
    }
}