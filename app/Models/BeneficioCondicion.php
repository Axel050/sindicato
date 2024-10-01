<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Log;

/**
 * Class BeneficioCondicion
 * 
 * @property int $id
 * @property int $idBeneficio
 * @property int $idCondicion
 * @property string $descripcion
 * @property Carbon $fechaRegistro
 * @property int $idResponsable
 * @property int $estado
 *
 * @package App\Models
 */
class BeneficioCondicion extends Model
{
	protected $table = 'beneficio_condicion';	
	public $timestamps = false;

	protected $casts = [
		'id' => 'int',
		'idBeneficio' => 'int',
		'idCondicion' => 'int',
		'fechaRegistro' => 'datetime',
		'idResponsable' => 'int',
		'estado' => 'int'
	];

	protected $fillable = [
		'idBeneficio',
		'idCondicion',
		'descripcion',
		'fechaRegistro',
		'idResponsable',
		'estado'
	];


  public function estadoCondicionesRequeridaPre($id){
    return EstadoCondicionesRequerida::where('idBeneficio', $this->idBeneficio)
                                     ->where('idCondicionRequerida', $this->idCondicion)
                                     ->where('idMiembro', $id)
                                     ->first();

  }

  public function estadoCondicionesRequerida3()
{
  
    return $this->hasMany(EstadoCondicionesRequerida::class, 'idBeneficio', 'idBeneficio')
                ->where('idCondicionRequerida', $this->idCondicion)
                ;
  
}


  public function estadoCondicionRequerida($id)
  {
    return EstadoCondicionesRequerida::where('idBeneficio', $this->idBeneficio)
                                     ->where('idCondicionRequerida', $this->idCondicion)
                                     ->where('idMiembro', $id)
                                     ->first();
  
  }

  




      public function beneficio()
    {
        return $this->belongsTo(Beneficio::class, 'idBeneficio', 'id');
    }


      public function condicionReq()
    {
        return $this->belongsTo(CondicionesRequerida::class, 'idCondicion', 'id');
    }

      

    public function estadoCondicion()
{
    return $this->hasOne(EstadoCondicionesRequerida::class, 'idCondicionRequerida', 'idCondicion');
}



}
