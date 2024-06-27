<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class PersonaModificacion
 * 
 * @property int $id
 * @property string $idMiembro
 * @property string $datosMiembro
 * @property string $datosConyuge
 * @property string $datosHijos
 * @property int $idResponsable
 * @property string $fechaRegistro
 * @property string $estado
 *
 * @package App\Models
 */
class PersonaModificacion extends Model
{
	protected $table = 'persona_modificacion';
	public $incrementing = false;
	public $timestamps = false;

	protected $casts = [
		'id' => 'int',
		'idResponsable' => 'int'
	];

	protected $fillable = [
		'id',
		'idMiembro',
		'datosMiembro',
		'datosConyuge',
		'datosHijos',
		'idResponsable',
		'fechaRegistro',
		'estado'
	];
}
