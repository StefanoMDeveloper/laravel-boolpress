<?php

use Illuminate\Database\Seeder;
use Faker\Generator as Faker;
use Illuminate\Support\Str;
use App\Post; 

class PostsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker)
    {
        for($i = 0; $i < 10; $i++)
        {
            $post = new Post();
            $post->title = $faker->words(4,true);
            $post->content = $faker->text();
            $post->slug = Str::of($post->title)->slug("-"); 

            $post->save();
        }
    }
}