<?php

namespace App\Rules;

use Closure;
use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Support\Facades\DB;

class UniqueDocument implements ValidationRule
{
    /**
     * Run the validation rule.
     *
     * @param  \Closure(string): \Illuminate\Translation\PotentiallyTranslatedString  $fail
     */
    public function validate(string $attribute, mixed $value, Closure $fail): void
    {
        
           // Verifica si el documento existe en la tabla 'hijos'
        $existsInHijos = DB::table('hijos')->where('dni', $value)->exists();

        // Verifica si el documento existe en la tabla 'conyuges'
        $existsInConyuges = DB::table('conyuges')->where('documento', $value)->exists();

        // El documento no debe existir en ninguna de las dos tablas
        if ($existsInHijos || $existsInConyuges) {
            $fail('El documento ya existe.');
        }
    }

    

  }
