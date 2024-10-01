<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Beneficio
 * 
 * @property int $id
 * @property string $nombre
 * @property string|null $descripcion
 * @property Carbon|null $fechaCreacion
 * @property Carbon|null $fechaRegistro
 * @property int|null $idResponsable
 * @property string|null $fechaDesde
 * @property string|null $fechaHasta
 * @property string|null $estado
 * @property string $reutilizable
 * @property int $cantUsos
 * @property int $nroBeneficio
 * @property string $condiciones
 * @property string $bannerBeneficio
 *
 * @package App\Models
 */
class Beneficio extends Model
{
	protected $table = 'beneficios';
	public $timestamps = false;

	protected $casts = [
		'id' => 'int',
		'fechaCreacion' => 'datetime',
		'fechaRegistro' => 'datetime',
		'idResponsable' => 'int',
		'cantUsos' => 'int',
		'nroBeneficio' => 'int'
	];

	protected $fillable = [
		'nombre',
		'descripcion',
		'fechaCreacion',
		'fechaRegistro',
		'idResponsable',
		'fechaDesde',
		'fechaHasta',
		'estado',
		'reutilizable',
		'cantUsos',
		'nroBeneficio',
		'condiciones',
		'bannerBeneficio'
	];

  
     public function tieneCondicion($idCondicion)
    {
        return $this->beneficioCondiciones()->where('idCondicion', $idCondicion)->exists();
    }

public function beneficioCondiciones()
{
    return $this->hasMany(BeneficioCondicion::class, 'idBeneficio');
}  

public function beneficioCondicionesExist($id)
{
        $beneficios= $this->hasMany(BeneficioCondicion::class, 'idBeneficio');

        
          

    return $this->hasMany(BeneficioCondicion::class, 'idBeneficio');
}  




public function estadoC($idMiembro){
  
  $total = EstadoCondicionesRequerida::where('idMiembro', $idMiembro)
        ->where('idBeneficio', $this->id)
        ->count();
    
 
    $conEstado1 = EstadoCondicionesRequerida::where('idMiembro', $idMiembro)
        ->where('idBeneficio', $this->id)
        ->where('estado', '1')
        ->count();

    if($total <= 0){
      return false;
    }

    return $total === $conEstado1;

}

public function estadoCondicionesPorMiembro($idMiembro)
{
    return $this->hasManyThrough(
        EstadoCondicionesRequerida::class,
        BeneficioCondicion::class,
        'idBeneficio',        // Foreign key on BeneficioCondicion
        'idCondicionRequerida', // Foreign key on EstadoCondicionesRequerida
        'id',                  // Local key on Beneficio
        'idCondicion'          // Local key on BeneficioCondicion
    )->where('estado_condiciones_requeridas.idMiembro', $idMiembro);
}


public function beneficioUsos()
{
    return $this->hasMany(BeneficiosUsos::class, 'id_Beneficio');
}  

}
