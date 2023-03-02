<?php

namespace Database\Seeders;

use App\Models\Imagene;
use Illuminate\Database\Seeder;
use App\Models\Post;

class PostSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $posts = Post::factory(300)->create();

        foreach($posts as $post) {
            Imagene::factory(1)->create([
                'imageable_id' => $post->id,
                'imageable_type' => Post::class
            ]);
            $post->etiquetas()->attach([
                rand(1,4),
                rand(5,8)
            ]);//Agrega registros en la tabla
        }
    }
}
