<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class ImageneFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'url' => 'images/'.$this->faker->image(storage_path('app/public/images') ,640 , 480, null, false), //Le paso como parámetros las medidas de las imgs
        ];
    }
}
