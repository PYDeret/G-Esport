<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');
        
        $this->call(VoyagerDatabaseSeeder::class);
        $this->call(UsersTableSeeder::class);
        $this->call(TournoisTableSeeder::class);
        $this->call(EquipesTableSeeder::class);
        $this->call(PermissionRoleTableSeeder::class);
        $this->call(ParticipantsTableSeeder::class);
        $this->call(TypeJeusTableSeeder::class);
        $this->call(JeusTableSeeder::class);
        //$this->call(ResultatsTableSeeder::class);
        $this->call(RecompensesTableSeeder::class);
        DB::statement('SET FOREIGN_KEY_CHECKS=1;');
        $this->call(EquipesUsersTableSeeder::class);
    }
}
