<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;

/**
 * Class EstadoCondicionesRequerida
 * 
 * @property int $id
 * @property string|null $idCondicionRequerida
 * @property string|null $idBeneficio
 * @property string|null $idMiembro
 * @property string|null $estado
 * @property string|null $observaciones
 * @property string|null $fechaRegistro
 * @property string|null $idResponsable
 *
 * @package App\Models
 */
class EstadoCondicionesRequerida extends Model
{
	protected $table = 'estado_condiciones_requeridas';
	public $incrementing = false;
	public $timestamps = false;

	protected $casts = [
		'id' => 'int'
	];

	protected $fillable = [
		'idCondicionRequerida',
		'idBeneficio',
		'idMiembro',
		'estado',
		'observaciones',
		'fechaRegistro',
		'idResponsable'
	];


  public function beneficio(){    
          return $this->belongsTo(Beneficio::class, 'idBeneficio');   
      }

  public function user(){    
          return $this->belongsTo(User::class, 'idMiembro');             
      }

  public function requerimiento(){    
          return $this->belongsTo(CondicionesRequerida::class, 'idCondicionRequerida');             
      }

  public function checkStatus($idB, $idM, $idR=null){                  
  
        $total = EstadoCondicionesRequerida::where('idMiembro', $idM)
              ->where('idBeneficio', $idB)
              ->count();
          
      
          $conEstado1 = EstadoCondicionesRequerida::where('idMiembro', $idM)
              ->where('idBeneficio', $idB)
              ->where('estado', '1')
              ->count();

          if($total <= 0){
            return false;
          }

          return $total === $conEstado1;
  
      }

  
}
