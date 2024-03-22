<?php

namespace Database\Seeders;

use App\Models\Categoria;
use App\Models\Etiqueta;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Storage;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        Storage::deleteDirectory('images');//elimina el directorio para asegurarnos de que no repita la creacion de imagenes
        Storage::makeDirectory('images');//Crea una carpeta dentro de /storage

        $this->call(RolSeeder::class);
        $this->call(UserSeeder::class);

        Categoria::factory(4)->create();
        Etiqueta::factory(8)->create();
        //Post::factory(100)->create();
        $this->call(PostSeeder::class);
    }
}
