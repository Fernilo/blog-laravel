<?php

namespace Tests\Feature;

use App\Models\Categoria;
use App\Models\Post;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class ListPostTest extends TestCase
{
    use RefreshDatabase;
    /**
     * A basic feature test for posts.
     *
     * @return void
     */
    public function test_can_see_all_posts()
    {
        // User::create([
        //     'name' => "fernando prueba",
        //     'email' => 'fernan.alemercado@gmail.com',
        //     'password' => 123
        // ]);

        // $post = Post::create([
        //     'nombre' => "post de prueba",
        //     'usuario_id' => 15,
        //     'categoria_id' => 2
        // ]);

        $user = User::factory('App\User');
        $categoria = Categoria::factory('App\Categoria');
        $post = Post::factory('App\Post');
        
        $this->withoutExceptionHandling();
        $response = $this->get(route('post.index'));

        $response->assertStatus(200);

        $response->assertViewIs('posts.index');//verifica si la vista es correcta

        $response->assertViewHas('posts');//valida si la vista tiene la variable

        $response->assertSee($post->nombre);
    }
}
