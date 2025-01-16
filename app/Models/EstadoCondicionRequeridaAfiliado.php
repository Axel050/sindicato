<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EstadoCondicionRequeridaAfiliado extends Model
{
    use HasFactory;

    protected $table = 'estados_condiciones_requeridas_afiliados';
    public $timestamps = true; // O false si no usas timestamps en esta tabla.

    protected $fillable = [
        'idCondicionReq',
        'idMiembro',
        'estado',
        'fechaRegistro',
        'idResponsable',
        'valor'
    ];

    /**
     * Consulta el estado de un miembro para una condición requerida.
     *
     * @param int $idMiembro
     * @param int $idCondicionRequerida
     * @return EstadoCondicionRequeridaAfiliado|null
     */

    public static function getEstado(int $idMiembro, int $idCondicionRequerida)
    {
        return self::where('idMiembro', $idMiembro)
            ->where('idCondicionReq', $idCondicionRequerida)
            ->first();
    }

    public function condicionReq(){
                return $this->belongsTo(CondicionesRequerida::class,"idCondicionReq");
    }

    public function user(){    
          return $this->belongsTo(User::class, 'idMiembro');             
      }


      public function condicion(){    
          return $this->belongsTo(CondicionesRequerida::class, 'idCondicionReq');   
      }
      
}