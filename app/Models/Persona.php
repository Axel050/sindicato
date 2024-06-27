<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Persona
 * 
 * @property int $id
 * @property string|null $documento
 * @property string $nombres
 * @property string $apellidos
 * @property string|null $sexo
 * @property string|null $fNac
 * @property string $telefono
 * @property string|null $telefonoLaboral
 * @property string|null $direccion
 * @property string $email
 * @property string|null $user
 * @property string|null $password
 * @property int|null $idRol
 * @property int|null $idGremio
 * @property int|null $idEmpresa
 * @property int|null $idSector
 * @property string|null $legajo
 * @property string|null $hijos
 * @property string|null $conyugue
 * @property int|null $idCondicion
 * @property Carbon|null $fechaRegistro
 * @property int|null $idResponsable
 * @property int|null $estado
 * @property string|null $conyugueApellido
 * @property string|null $conyugueNombre
 * @property string|null $conyugueDni
 * @property string|null $conyugueSexo
 * @property string|null $conyugueFNac
 *
 * @package App\Models
 */
class Persona extends Model
{
	protected $table = 'persona';
	public $incrementing = false;
	public $timestamps = false;

	protected $casts = [
		'id' => 'int',
		'idRol' => 'int',
		'idGremio' => 'int',
		'idEmpresa' => 'int',
		'idSector' => 'int',
		'idCondicion' => 'int',
		'fechaRegistro' => 'datetime',
		'idResponsable' => 'int',
		'estado' => 'int'
	];

	protected $hidden = [
		'password'
	];

	protected $fillable = [
		'id',
		'documento',
		'nombres',
		'apellidos',
		'sexo',
		'fNac',
		'telefono',
		'telefonoLaboral',
		'direccion',
		'email',
		'user',
		'password',
		'idRol',
		'idGremio',
		'idEmpresa',
		'idSector',
		'legajo',
		'hijos',
		'conyugue',
		'idCondicion',
		'fechaRegistro',
		'idResponsable',
		'estado',
		'conyugueApellido',
		'conyugueNombre',
		'conyugueDni',
		'conyugueSexo',
		'conyugueFNac'
	];
}
