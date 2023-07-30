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
        
        $this->withoutExceptionHandling();//laravel no captura el error y se muestra más detallado
        $response = $this->get(route('post.index'));

        $response->assertStatus(200);

      
    }

    public function test_correct_view()
    {
        $this->withoutExceptionHandling();//laravel no captura el error y se muestra más detallado
        $response = $this->get(route('post.index'));
        $response->assertViewIs('posts.index');//verifica si la vista es correcta

    }

    public function test_has_posts()
    {
        $this->withoutExceptionHandling();//laravel no captura el error y se muestra más detallado
        $response = $this->get(route('post.index'));
        $response->assertViewHas('posts');//valida si la vista tiene la variable
    }

    public function test_can_see_individual_post()
    {
        $this->withoutExceptionHandling();//laravel no captura el error y se muestra más detallado
        User::factory(5)->create();
        Categoria::factory(5)->create();
        $post = Post::factory()->create();

        $response = $this->get(route('post.show' , $post));
        $response->assertSee($post->nombre);//Valida si el nombre se muestra
    }
}
