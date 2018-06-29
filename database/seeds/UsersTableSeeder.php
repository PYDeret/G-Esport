<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('users')->delete();

        \DB::table('users')->insert(array (
            0 => 
            array (
                'id' => 1,
                'role_id' => 1,
                'name' => 'Admin',
                'email' => 'admin@admin.com',
                'password' => bcrypt('admin'),
                'remember_token' => str_random(60),
                'about' => "About admin, you can change me whenever you want in your profile",
                'created_at' => '2018-06-25 16:44:11',
                'updated_at' => '2018-06-25 16:44:11',
            ),
        ));

        \DB::table('users')->insert(array (
            0 => 
            array (
                'id' => 2,
                'role_id' => 2,
                'name' => 'User',
                'email' => 'user@user.com',
                'password' => bcrypt('user'),
                'remember_token' => str_random(60),
                'about' => "About user, you can change me whenever you want in your profile",
                'created_at' => '2018-06-25 16:44:11',
                'updated_at' => '2018-06-25 16:44:11',
            ),
        ));
        
        
        
    }
}