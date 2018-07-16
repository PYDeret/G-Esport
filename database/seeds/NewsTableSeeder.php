<?php

use Illuminate\Database\Seeder;

class NewsTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('news')->delete();
        
        \DB::table('news')->insert(array (
            0 => 
            array (
                'id' => 1,
                'img' => 'news/July2018/Y2b9M6XPeOm6VlJFIRQz.jpg',
                'titre' => 'La bataille des Devs',
                'description' => '<p>Pour f&ecirc;ter la r&eacute;ussite de G-esport les d&eacute;veloppeurs qui ont particip&eacute;s &agrave; la cr&eacute;ation de celle-ci l\'inaugurons avec le premier tournoi.</p>',
                'slug' => 'bataille_dev',
                'created_at' => '2018-07-13 13:31:00',
                'updated_at' => '2018-07-13 13:32:04',
            ),
        ));
        
        
    }
}