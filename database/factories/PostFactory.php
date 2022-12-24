<?php

namespace Database\Factories;

use App\Models\Categoria;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class PostFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $nombre = $this->faker->unique()->sentence();
        return [
            'nombre' => $nombre,
            'slug' => Str::slug($nombre),
            'descripcion' => $this->faker->text(250),
            'cuerpo' => $this->faker->text(2000),
            'estado' => $this->faker->randomElement([1,2]),//1-Borrador , 2-Activo
            'categoria_id' => Categoria::all()->random()->id,//Selecciona un id de categoria al azar
            'usuario_id' => User::all()->random()->id
        ];
    }
}
