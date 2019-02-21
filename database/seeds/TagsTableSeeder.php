<?php

use Illuminate\Database\Seeder;

class TagsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $tags = ['fashion', 'Car Industry','Health','Sport','Politics'];

        foreach($tags as $tag){
            App\Tag::create([
                'name' => $tag
            ]);
        }

        App\Post::all()->each(function (App\Post $p) use ($tags) {
                $rndIds = App\Tag::inRandomOrder()->select('id')->take(3)->pluck('id');
                $p->tags()->attach($rndIds);//attach se koristi za presecnu tabelu, kada hocemo upis u nju
                //deatach brise iz tabele id koje smo proslijedili
        });
    }
}
