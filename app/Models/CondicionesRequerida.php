<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class CondicionesRequerida
 * 
 * @property int $id
 * @property string $nombreRequerimiento
 * @property Carbon|null $fechaRegistro
 * @property int|null $idResponsable
 * @property string|null $tipo
 *
 * @package App\Models
 */
class CondicionesRequerida extends Model
{
	protected $table = 'condiciones_requeridas';
	public $incrementing = false;
	public $timestamps = false;

	protected $casts = [
		'id' => 'int',
		'fechaRegistro' => 'datetime',
		'idResponsable' => 'int'
	];

	protected $fillable = [
		'nombreRequerimiento',
		'fechaRegistro',
		'idResponsable',
		'tipo'
	];


  public function estadoCondiciones()
{
    return $this->hasMany(EstadoCondicionesRequerida::class, 'idCondicionRequerida', 'id');
}

public function condicionRequerida()
{
    return $this->belongsTo(CondicionesRequerida::class, 'idCondicionRequerida', 'id');
}

public function beneficio()
{
    return $this->belongsTo(Beneficio::class, 'idBeneficio', 'id');
}
    

}
