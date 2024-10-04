<?php

namespace App\Rules;

use Closure;
use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class UniqueDocument implements ValidationRule
{
     protected $conyugueId;

     protected $hijoId;

     protected $id;

    public function __construct($conyugueId = null,$hijoId= null,$id = null)
    {
        $this->conyugueId = $conyugueId;
        $this->hijoId = $hijoId;
        $this->id = $id;
    }

    public function validate(string $attribute, mixed $value, Closure $fail): void
    {
        // Verifica si el documento existe en la tabla 'hijos'
        // $existsInHijos = DB::table('hijos')->where('dni', $value)->exists();

            $queryH = DB::table('hijos')->where('dni', $value);

            // Log::alert("queryH->get()");
            // Log::alert($queryH->get());
            // Log::alert([
            //   "value" => $value,
            //   "id" => $this->hijoId
            // ]);
            // Log::alert("queryH->get()");

        // Si es una actualización, excluye el cónyuge actual
        if ($this->hijoId) {
          $queryH->where('id', '!=', $this->hijoId);
        }

        
        $existsInHijos= $queryH->exists();
        

        // Verifica si el documento existe en la tabla 'conyuges'
        $query = DB::table('conyuges')->where('documento', $value);

        // Si es una actualización, excluye el cónyuge actual
        if ($this->conyugueId) {
            $query->where('id', '!=', $this->conyugueId);
        }

        $existsInConyuges = $query->exists();

        // El documento no debe existir en ninguna de las dos tablas
        if ($existsInHijos || $existsInConyuges) {
            $fail('El documento ya existe.');
        }
        
    }
}