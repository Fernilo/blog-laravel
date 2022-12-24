<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class EtiquetaFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $nombre = $this->faker->unique()->word(20);
        return [
            'nombre' => $nombre,
            'slug' => Str::slug($nombre),
            'color' => $this->faker->randomElement(['red' , 'yellow' , 'green' , 'blue' , 'indigo' , 'purple' , 'pink' , 'brown' ,
                'orange' , 'gold' , 'cyan'])
        ];
    }
}
