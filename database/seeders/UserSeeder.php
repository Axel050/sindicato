<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        User::create([
       'name' => 'Test User',
        'email' => 'test@example.com',
        'password' => bcrypt('12345678'),
        "telefono" => "1188774455",
        "apellido"=>"apellidoUser",
        
      ])->assignRole("AdministradorPrincipal");

      

      User::create([
       'name' => 'Efecto Padel',
            'email' => 'efecto@example.com',
            'password' => bcrypt('1234'),
            "telefono" => "122877115",
              "apellido"=>"apellidoUser",
      ])->assignRole("Miembro");

      User::create([
       'name' => 'La fabrica',
            'email' => 'lafabrica@example.com',
            'password' => bcrypt('1234'),
            "telefono" => "1188885",
              "apellido"=>"apellidoUser3",
      ])->assignRole("UsuarioPendienteRevision");
    }


}
