<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

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
}
