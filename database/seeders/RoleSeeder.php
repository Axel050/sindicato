<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        
       Role::create(["name"=> "Administrador"]);
       Role::create(["name"=> "UsuarioPendienteRevision"]);
       Role::create(["name"=> "Miembro"]);
       Role::create(["name"=> "AdministradorPrincipal"]);
       Role::create(["name"=> "guest"]);
       

       Permission::create(["name"=> "dashboard-ver"]);
       Permission::create(["name"=> "dashboard-crear"]);
       Permission::create(["name"=> "dashboard-actualizar"]);
       Permission::create(["name"=> "dashboard-eliminar"]);

       Permission::create(["name"=> "usuarios-ver"]);
       Permission::create(["name"=> "usuarios-crear"]);
       Permission::create(["name"=> "usuarios-actualizar"]);
       Permission::create(["name"=> "usuarios-eliminar"]);
       
       Permission::create(["name"=> "miembros-ver"]);
       Permission::create(["name"=> "miembros-crear"]);
       Permission::create(["name"=> "miembros-actualizar"]);
       Permission::create(["name"=> "miembros-eliminar"]);

       Permission::create(["name"=> "beneficios-ver"]);
       Permission::create(["name"=> "beneficios-crear"]);
       Permission::create(["name"=> "beneficios-actualizar"]);
       Permission::create(["name"=> "beneficios-eliminar"]);

       Permission::create(["name"=> "empresas-ver"]);
       Permission::create(["name"=> "empresas-crear"]);
       Permission::create(["name"=> "empresas-actualizar"]);
       Permission::create(["name"=> "empresas-eliminar"]);

       Permission::create(["name"=> "gremios-ver"]);
       Permission::create(["name"=> "gremios-crear"]);
       Permission::create(["name"=> "gremios-actualizar"]);
       Permission::create(["name"=> "gremios-eliminar"]);

       Permission::create(["name"=> "sectores-ver"]);
       Permission::create(["name"=> "sectores-crear"]);
       Permission::create(["name"=> "sectores-actualizar"]);
       Permission::create(["name"=> "sectores-eliminar"]);

       Permission::create(["name"=> "condiciones-ver"]);
       Permission::create(["name"=> "condiciones-crear"]);
       Permission::create(["name"=> "condiciones-actualizar"]);
       Permission::create(["name"=> "condiciones-eliminar"]);

       
    }
}
