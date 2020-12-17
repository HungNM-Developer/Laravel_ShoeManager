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
        \App\Models\Tag::factory(50)->create();
        // \App\Models\Tag_Order::factory(10)->create();
        \App\Models\Order::factory(10)->create();
        \App\Models\OrderTag::factory(50)->create();
        // ->each(function ($order){
        //     $ids_order = range(1, 10);
        //     shuffle($ids_order);//trộn
        //     $sliced = array_slice($ids_order, 1, 5);  
               
        //     $order->tags()->attach($sliced);
        // });
        // \App\Models\Tag_Order::factory(10)->create()->each(function ($tag__orders){
        //     $ids_tag_order = range(1, 10);
        //     shuffle($ids_tag_order);
        //     $sliceded = array_slice($ids_tag_order,1,5);
        //     $tag__orders->tags()->attach($sliceded);
        // });
        // \App\Models\Order_Details::factory(10)->create();
        \App\Models\Article::factory(10)->create()->each(function($article){
            $ids = range(1, 10);
            shuffle($ids);//trộn
            $sliced = array_slice($ids, 1, 10);
            $article->tags()->attach($sliced);
        });
    }
}
