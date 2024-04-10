<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RolSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $admin = Role::create(['name' => 'Admin']);
        $blogger = Role::create(['name' => 'Blogger']);

        Permission::create(['name' => 'admin.home.index'])->syncRoles([$admin, $blogger]);
        Permission::create(['name' => 'admin.categorias.index'])->syncRoles([$admin]);
        Permission::create(['name' => 'admin.categorias.create'])->syncRoles([$admin]);
        Permission::create(['name' => 'admin.categorias.edit'])->syncRoles([$admin]);
        Permission::create(['name' => 'admin.categorias.destroy'])->syncRoles([$admin]);

        Permission::create(['name' => 'admin.etiquetas.index'])->syncRoles([$admin]);
        Permission::create(['name' => 'admin.etiquetas.create'])->syncRoles([$admin]);
        Permission::create(['name' => 'admin.etiquetas.edit'])->syncRoles([$admin]);
        Permission::create(['name' => 'admin.etiquetas.destroy'])->syncRoles([$admin]);

        Permission::create(['name' => 'admin.posts.index'])->syncRoles([$admin, $blogger]);
        Permission::create(['name' => 'admin.posts.create'])->syncRoles([$admin, $blogger]);
        Permission::create(['name' => 'admin.posts.edit'])->syncRoles([$admin, $blogger]);
        Permission::create(['name' => 'admin.posts.destroy'])->syncRoles([$admin, $blogger]);

        Permission::create(['name' => 'admin.usuarios.index'])->syncRoles([$admin]);
        Permission::create(['name' => 'admin.usuarios.create'])->syncRoles([$admin]);
        Permission::create(['name' => 'admin.usuarios.edit'])->syncRoles([$admin]);
    }
}
