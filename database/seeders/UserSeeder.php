<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'name' => 'Fernando Alexis Mercado',
            'email' => 'fernan.alemercado@gmail.com',
            'password' => bcrypt('12345678')
        ])->assignRole('Admin');
        User::factory(9)->create();
    }
}
