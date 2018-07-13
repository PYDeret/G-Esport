<?php

use Illuminate\Database\Seeder;

class JeusTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('jeus')->delete();
        
        \DB::table('jeus')->insert(array (
            0 => 
            array (
                'id' => 1,
                'libelle' => 'League of Legends',
                'description' => "<p>League of Legends est un jeu compétitif en ligne bourré d'action, qui mélange l'intensité trépidante des jeux de stratégie en temps réel avec des éléments de jeu de rôle. Deux équipes de puissants champions, chacun avec un design et des compétences uniques, se heurtent de front sur de nombreux champs de bataille et dans des modes de jeu variés. Avec une liste de champions en expansion permanente, des mises à jour fréquentes et des événements compétitifs florissants, League of Legends offre des parties sans cesse renouvelées aux joueurs de tous niveaux.</p>",
                'slug' => 'leagueoflegends',
                'TypeJeuId' => 1,
                'created_at' => '2018-06-25 16:44:11',
                'updated_at' => '2018-06-25 16:44:11',
            ),
        ));
        
        
    }
}