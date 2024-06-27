<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class PersonaRol
 * 
 * @property int $id
 * @property int $idPersona
 * @property int $idRol
 * @property string $fechaRegistro
 * @property int $idResponsable
 *
 * @package App\Models
 */
class PersonaRol extends Model
{
	protected $table = 'persona_rol';
	public $incrementing = false;
	public $timestamps = false;

	protected $casts = [
		'id' => 'int',
		'idPersona' => 'int',
		'idRol' => 'int',
		'idResponsable' => 'int'
	];

	protected $fillable = [
		'id',
		'idPersona',
		'idRol',
		'fechaRegistro',
		'idResponsable'
	];
}
