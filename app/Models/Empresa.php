<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Empresa
 * 
 * @property int $id
 * @property string $nombreEmpresa
 * @property string|null $descripcionEmpresa
 * @property Carbon|null $fechaRegistro
 * @property int|null $idResponsable
 * @property string $direccion
 * @property string $telefono
 * @property string $email
 * @property int $estado
 *
 * @package App\Models
 */
class Empresa extends Model
{
	protected $table = 'empresas';
	public $incrementing = false;
	public $timestamps = false;

	protected $casts = [
		'id' => 'int',
		'fechaRegistro' => 'datetime',
		'idResponsable' => 'int',
		'estado' => 'int'
	];

	protected $fillable = [
		'nombreEmpresa',
		'descripcionEmpresa',
		'fechaRegistro',
		'idResponsable',
		'direccion',
		'telefono',
		'email',
		'estado'
	];
}
