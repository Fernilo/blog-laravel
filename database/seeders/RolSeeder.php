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

        Permission::create(['name' => 'admin.home.index', 'description' => 'Ver el dashboard'])->syncRoles([$admin, $blogger]);
        
        Permission::create(['name' => 'admin.categorias.index', 'description' => 'Ver listado de categorías'])->syncRoles([$admin, $blogger]);
        Permission::create(['name' => 'admin.categorias.create', 'description' => 'Crear categorías'])->syncRoles([$admin]);
        Permission::create(['name' => 'admin.categorias.edit', 'description' => 'Editar categorías'])->syncRoles([$admin]);
        Permission::create(['name' => 'admin.categorias.destroy', 'description' => 'Eliminar categorías'])->syncRoles([$admin]);

        Permission::create(['name' => 'admin.etiquetas.index', 'description' => 'Ver listado de etiquetas'])->syncRoles([$admin, $blogger]);
        Permission::create(['name' => 'admin.etiquetas.create', 'description' => 'Crear etiquetas'])->syncRoles([$admin]);
        Permission::create(['name' => 'admin.etiquetas.edit', 'description' => 'Editar etiquetas'])->syncRoles([$admin]);
        Permission::create(['name' => 'admin.etiquetas.destroy', 'description' => 'Eliminar etiquetas'])->syncRoles([$admin]);

        Permission::create(['name' => 'admin.posts.index', 'description' => 'Ver listado de posts'])->syncRoles([$admin, $blogger]);
        Permission::create(['name' => 'admin.posts.create', 'description' => 'Crear posts'])->syncRoles([$admin, $blogger]);
        Permission::create(['name' => 'admin.posts.edit', 'description' => 'Editar posts'])->syncRoles([$admin, $blogger]);
        Permission::create(['name' => 'admin.posts.destroy', 'description' => 'Eliminar posts'])->syncRoles([$admin, $blogger]);

        Permission::create(['name' => 'admin.usuarios.index', 'description' => 'Ver listado de usuarios'])->syncRoles([$admin]);
        Permission::create(['name' => 'admin.usuarios.create', 'description' => 'Crear usuarios'])->syncRoles([$admin]);
        Permission::create(['name' => 'admin.usuarios.edit', 'description' => 'Editar usuarios'])->syncRoles([$admin]);
        Permission::create(['name' => 'admin.usuarios.destroy', 'description' => 'Eliminar usuarios'])->syncRoles([$admin]);

        Permission::create(['name' => 'admin.roles.index', 'description' => 'Ver listado de roles'])->syncRoles([$admin]);
        Permission::create(['name' => 'admin.roles.create', 'description' => 'Crear roles'])->syncRoles([$admin]);
        Permission::create(['name' => 'admin.roles.edit', 'description' => 'Editar roles'])->syncRoles([$admin]);
        Permission::create(['name' => 'admin.roles.destroy', 'description' => 'Eliminar roles'])->syncRoles([$admin]);
    }
}
