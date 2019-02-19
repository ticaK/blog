<?php

use Illuminate\Database\Seeder;

class PostsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\Post::class,100)->create()
              ->each(function($post){
                  $user = App\User::inRandomOrder()->first();  //vraca prvog u bazi
                  $post->user_id = $user->id; //vraca njegov id
                  $post->save();

                
//moze i pomocu update ili ovako da dodijelimo atribute i napisemo save
              }); 
    }
}
