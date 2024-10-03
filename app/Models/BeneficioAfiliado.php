<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Log;

/**
 * Class BeneficioAfiliado
 * 
 * @property int $id
 * @property int|null $idBeneficio
 * @property int|null $idAfiliado
 * @property Carbon|null $fechaRegistro
 * @property int|null $idResponsable
 * @property int|null $estado
 * @property string|null $comentario
 * @property string|null $fechaDesde
 * @property string|null $fechaHasta
 * @property string|null $reutilizable
 * @property int|null $cantUsos
 *
 * @package App\Models
 */
class BeneficioAfiliado extends Model
{
	protected $table = 'beneficio_afiliados';
	// public $incrementing = false;
	public $timestamps = false;

	protected $casts = [
		'id' => 'int',
		'idBeneficio' => 'int',
		'idAfiliado' => 'int',
		'fechaRegistro' => 'datetime',
		'idResponsable' => 'int',
		'estado' => 'int',
		'cantUsos' => 'int',
    'ultimo_uso' => 'datetime'
	];

	protected $fillable = [
		'idBeneficio',
		'idAfiliado',
		'fechaRegistro',
		'idResponsable',
		'estado',
		'comentario',
		'fechaDesde',
		'fechaHasta',
		'reutilizable',
		'cantUsos',
    'ultimo_uso'
	];


      public function beneficioUsos  ($idMiembro){
          return $this->hasMany(BeneficiosUsos::class, 'id_beneficio','idBeneficio')
                              ->where('id_miembro',$idMiembro);
      }

      public function beneficioCondiciones (){
          return $this->hasMany(BeneficioCondicion::class, 'idBeneficio');
      }



      public function beneficio (){
          return $this->belongsTo(Beneficio::class, 'idBeneficio', 'id');   
      }


      public function estadoCondicionesRequeridas (){
          return $this->hasMany(EstadoCondicionesRequerida::class, 'idBeneficio','idBeneficio')
                            ->where('idMiembro', $this->idAfiliado);;
      }


       public function afiliado()
    {
        return $this->belongsTo(User::class, 'idAfiliado');
    }

          public function canUse()
          {
              $beneficio = $this->beneficio;

              // Si no es reutilizable, verificar si ya se usó al menos una vez
              if (!$beneficio->reutilizable && $this->cantUsos > 0) {
                  return false;
              }

              // Si es reutilizable, verificar que la cantidad de usos no supere el límite
              if ($beneficio->reutilizable && $this->cantUsos >= $beneficio->cantUsos) {
                  return false;
              }

              return true;
          }


          public function estadoC($idMiembro,$idB){
  
            $total = EstadoCondicionesRequerida::where('idMiembro', $idMiembro)
                  ->where('idBeneficio', $idB)
                  ->count();
                                        
          
              $conEstado1 = EstadoCondicionesRequerida::where('idMiembro', $idMiembro)
                  ->where('idBeneficio', $idB)
                  ->where('estado', '1')
                  ->count();

                  Log::alert([
                    "total22222 " => $total,
                    "idMIentro " => $idMiembro,
                    "idBenn" => $idB ,
                    "estad1" => $conEstado1

                  ]);

              if($total <= 0){
                return false;
              }

              return $total === $conEstado1;

          }
}
