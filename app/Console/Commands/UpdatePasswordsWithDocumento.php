<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\User; // Asegúrate de importar el modelo User
use Illuminate\Support\Facades\Hash;

class UpdatePasswordsWithDocumento extends Command
{
    // El nombre y la descripción del comando
    protected $signature = 'users:update-passwords';
    protected $description = 'Actualiza las contraseñas de todos los usuarios basadas en el campo documento';

    public function __construct()
    {
        parent::__construct();
    }

    public function handle()
    {
        // Obtener todos los usuarios
        $users = User::all();

        // Iterar sobre cada usuario
        foreach ($users as $user) {
            // Verificar si el campo documento no está vacío
            if ($user->documento) {
                // Generar un nuevo hash de Bcrypt basado en el valor del documento
                $newPasswordHash = Hash::make($user->documento);

                // Actualizar el campo password
                $user->password = $newPasswordHash;
                $user->save();

                // Mostrar en consola que el usuario fue actualizado
                $this->info("Contraseña actualizada para el usuario con ID: {$user->id}");
            } else {
                $this->error("El usuario con ID: {$user->id} no tiene documento.");
            }
        }

        $this->info('Todas las contraseñas han sido actualizadas.');
    }
}
