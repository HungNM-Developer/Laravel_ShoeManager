<?php

namespace Database\Seeders;

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
        // \App\Models\User::factory(10)->create();
        \App\Models\User::factory(10)->create();
        \App\Models\Tag::factory(20)->create();
        \App\Models\Article::factory(10)->create()->each(function($article){
            $ids = range(1, 20);
            shuffle($ids);//trộn
            $sliced = array_slice($ids, 1, 10);
            $article->tags()->attach($sliced);
        });
    }
}
