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
        $this->call(UsersSeeder::class); //ovdje moraju biti pobrojani svi seederi
        $this->call(PostsSeeder::class); //redosljed je bitan, mora prvo user, zbog stranog kljuca
        
    }
}
// DatabaseSeeder nije u space, pa ga uvodimo sa \DatabaseSeeder