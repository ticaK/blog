<?php

use Illuminate\Database\Seeder;

class UsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //ono sto sm u factoriju dobili sada u bazu stavljamo
        // factory() ovo je factory helper

        factory(App\User::class,20)->create(); //izgenerisi mi 20 korisnika i kreiraj ih u bazi
    }
}
