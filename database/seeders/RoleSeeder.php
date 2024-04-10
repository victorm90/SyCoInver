<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $role1 = Role::create(['name'=>'Admin']);
        $role2 = Role::create(['name'=>'Inversionista']);
        $role3 = Role::create(['name'=>'Comercial']);

        Permission::create(['name'=>'admin.home','descripcion'=>'Pagina Principal'])->syncRoles([$role1,$role2,$role3]);            
        
        Permission::create(['name'=>'admin.users.index','descripcion'=>'listado de usuario'])->syncRoles([$role1]);
        Permission::create(['name'=>'admin.users.create','descripcion'=>'Crear Nuevo usuario'])->syncRoles([$role1]);
        Permission::create(['name'=>'admin.users.edit','descripcion'=>'Asignar Rol a Usuario'])->syncRoles([$role1]);
        Permission::create(['name'=>'admin.users.destroy','descripcion'=>'Eliminar Usuario'])->syncRoles([$role1]);

        Permission::create(['name'=>'admin.permisos.index','descripcion'=>'Listado de Permisos'])->syncRoles([$role1]);
        Permission::create(['name'=>'admin.permisos.create','descripcion'=>'Crear Nuevo Permiso'])->syncRoles([$role1]);
        Permission::create(['name'=>'admin.permisos.edit','descripcion'=>'Editar Permiso'])->syncRoles([$role1]);
        Permission::create(['name'=>'admin.permisos.destroy','descripcion'=>'Eliminar Permiso'])->syncRoles([$role1]);

        Permission::create(['name'=>'admin.roles.index','descripcion'=>'Listado de Rol'])->syncRoles([$role1]);
        Permission::create(['name'=>'admin.roles.create','descripcion'=>'Crear Nuevo Rol'])->syncRoles([$role1]);
        Permission::create(['name'=>'admin.roles.edit','descripcion'=>'Asignar Permiso a Rol '])->syncRoles([$role1]);
        Permission::create(['name'=>'admin.roles.destroy','descripcion'=>'Eliminar Rol'])->syncRoles([$role1]);

        Permission::create(['name'=>'admin.provincias.index','descripcion'=>'Listado de Provincias'])->syncRoles([$role1,$role3]);
        Permission::create(['name'=>'admin.provincias.create','descripcion'=>'Crear Nuevo Provincias'])->syncRoles([$role1,$role3]);
        Permission::create(['name'=>'admin.provincias.edit','descripcion'=>'Editar Provincias '])->syncRoles([$role1,$role3]);
        Permission::create(['name'=>'admin.provincias.destroy','descripcion'=>'Eliminar Provincias'])->syncRoles([$role3]);

        Permission::create(['name'=>'admin.entidades.index','descripcion'=>'Listado de entidades'])->syncRoles([$role1,$role3]);
        Permission::create(['name'=>'admin.entidades.create','descripcion'=>'Crear Nuevo entidades'])->syncRoles([$role1,$role3]);
        Permission::create(['name'=>'admin.entidades.edit','descripcion'=>'Editar entidades '])->syncRoles([$role1,$role3]);
        Permission::create(['name'=>'admin.entidades.destroy','descripcion'=>'Eliminar entidades'])->syncRoles([$role1]);
        
        

        /* $role1->permissions()->attach(1); */


    }
}
